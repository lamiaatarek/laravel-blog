@extends('admin.layout.master')
@section('head')
 <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
       <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                  <a href="{{route('post.create') }}" class="btn btn-primary ">ADD NEW</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Post No</th>
                        <th>Post title</th>
                        <th>Post subtitle</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$post->title}}</td>
                           <td>{{$post->subtitle}}</td>
                        <td>{{$post->slug}}</td>
                        <td> <a href="{{ route('post.edit',$post->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td>
                               {!! Form::open(['action'=>['Admin\postcontroller@destroy',$post->id],'method'=>'post','class'=>'pull-center'])
                             !!}
                         {{Form::hidden('_method','DELETE')}}
                         {{Form::submit('delete', ['class' => 'btn btn-dafault'])}}
                        {!! Form::close() !!}

                        </td>
                      </tr>
                    @endforeach
                     
                 
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</section></div>
@endsection
@section('footer')
 <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
     <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endsection
