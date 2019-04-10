<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id')->all();
        return view('admin.tickets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'file' =>  'nullable'
        ]);

        $ticket = Ticket::add($request->all());
        $ticket->uploadFile($request->file('file'));
        $ticket->setResponsible($request->get('responsible_id'));

        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $responsibles = User::pluck('name', 'id')->all();

        return view('admin.tickets.edit', compact(
            'ticket',
            'responsibles'
        ));
    }

    public function editFile($id)
    {
        $ticket = Ticket::find($id);
        return view('admin.tickets.edit_file', compact('ticket'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'file' =>  'nullable'
        ]);

        $ticket = Ticket::find($id);
        $ticket->edit($request->all());
        $ticket->uploadFile($request->file('file'));
        $ticket->setResponsible($request->get('responsible_id'));

        return redirect()->route('admin.index');
    }

    public function updateFile(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->uploadFile($request->file('file'));

        return redirect()->route('admin.index');
    }



    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('admin.index');
    }


}
