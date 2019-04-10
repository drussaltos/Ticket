<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Auth;

class Ticket extends Model
{
    protected $fillable = ['title', 'content'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public static function add($fields)
    {
        $ticket = new static;
        $ticket->fill($fields);
        $ticket->author_id = 1;
        $ticket->save();

        return $ticket;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        if($this->file != null)
        {
            Storage::delete($this->file);
        }

    }

    public function uploadFile($file)
    {
        if($file == null) { return; }

        $this->remove();
        $filename = $file->store('uploads');
        $this->file = $filename;
        $this->save();
    }

    public function setResponsible($id)
    {
        if ($id == null) { return; }

        $this->responsible_id = $id;
        $this->save();

        //$user = User::find($id);
        //$this->user()->save($user);
    }

    public function getAuthor()
    {
        return $this->author();
    }

    public function getResponsible()
    {
        return $this->responsible() != null ? $this->responsible() : null;
    }

    public function getFile()
    {
        return 'http://' . $_SERVER['HTTP_HOST']  . '/' . $this->file;
    }
}

