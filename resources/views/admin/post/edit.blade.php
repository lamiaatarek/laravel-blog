@extends('admin.layout.master')
@section('head')
 <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
 @endsection
   
@section('content')
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Create new post
           
          </h1>
         
        </section>
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Titles</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">post title</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                      <label for="subtitle">subtitle</label>
                      <input type="text" class="form-control" id="subtitle" placeholder="Enter Sub-Title" name="subtitle" value="{{$post->subtitle}}">
                    </div>
                    <div class="form-group">
                      <label for="slug">slug</label>
                      <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug" value="{{$post->slug}}">
                    </div>

                    <div class="form-group">
                      <label for="image">File input</label>
                      <input type="file" id="image" name="image">
                    
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="status" value="1" @if ($post->status ==1)
                         {{'checked'}}
                        @endif> publish
                      </label>
                    </div>
                  
                  </div>
                  <div class="form-group">
                    <label>Select Tag</label>
                   
                    <select class="form-control select2" style="width: 100%;" name="tags[]">
                     @foreach($tags as $tag)
                      <option value="{{$tag->id}}"
                        @foreach ($post->tags as $posttag)
                          @if ($posttag->id ==$tag->id)
                            selected 
                          @endif
                        @endforeach


                      >{{$tag->title}}</option>
                      @endforeach
                    </select>
                    
                  </div>
                   <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control select2" style="width: 100%;" name="categories[]">
                     @foreach($categories as $category)
                      <option value="{{$category->id}}"
                         @foreach ($post->categories as $postcategory)
                          @if ($postcategory->id ==$category->id)
                            selected 
                          @endif
                        @endforeach

                      >{{$category->title}}</option>
                        @endforeach
                    </select>
                  </div>
                  


         

        <!-- Main content -->
               <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Post Here
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$post->body}}</textarea>
               </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href="{{ route('post.index') }}" class="btn btn-warning">BACK</a>
          </div> 
       
        <!-- /.box -->
</form> 
                  </div>
                  </div>
                  </div></section></div>

     
 @include('admin.includes.messages')


@endsection
 @section('footer')
   <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
 <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
 @endsection