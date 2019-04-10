@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('admin.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Автор</th>
                  <th>Тема</th>
                  <th>Файл</th>
                  <th>Описание</th>
                  <th>Ответственный</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                  <td>{{$ticket->id}}</td>
                  <td>{{$ticket->getAuthor['name']}}</td>
                  <td>{{$ticket->title}}</td>
                  <td><a href="{{$ticket->getFile()}}">Прикреплённый файл</a></td>
                  <td>{{$ticket->content}}</td>
                  <td>{{$ticket->getResponsible['name']}}</td>
                  <td>
                  @if(Auth::user()->is_admin)
                      <a href="{{route('admin.edit', $ticket->id)}}" class="fa fa-pencil"></a>

                      {{Form::open(['route'=>['admin.destroy', $ticket->id], 'method'=>'delete'])}}
                      <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                         <i class="fa fa-remove"></i>
                       </button>
                      {{Form::close()}}
                  @else
                       <a href="{{route('admin.edit_file', $ticket->id)}}" class="fa fa-pencil"></a>
                  @endif
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection