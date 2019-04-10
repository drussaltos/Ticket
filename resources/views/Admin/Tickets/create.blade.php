@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить тикет
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
        'action' => 'Admin\TicketController@store',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Тема</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Файл</label>
              <input type="file" id="exampleInputFile" name="file">
              <p class="help-block">Какое-нибудь уведомление..</p>
            </div>

            <div class="form-group">
              <label>Назначение</label>
              {{Form::select('responsible_id',
              	$users,
              	null,
              	['class' => 'form-control select2', 'placeholder'=>'Выберите ответственного'])
              }}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{old('content')}}</textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection