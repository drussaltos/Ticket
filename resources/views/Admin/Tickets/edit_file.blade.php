@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить тиккет
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([

		'route'	=>	['admin.update_file', $ticket->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Прикрепит файл</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputFile">Файл</label>
              <a href="{{$ticket->getFile()}}">{{$ticket->file}}</a>
              <input type="file" id="exampleInputFile" name="file">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
        </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
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