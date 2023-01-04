@extends('layouts.app')
@section('content')

<title>Doc2Us | Add News</title>


<div class="container">
<div style="border-color:white;" class="card">
  <div style="border-color:white;font-weight:bold;" class="card-header">News Management
  <a href="{{ url('petakom/bulletin') }}" class="btn btn-sm btn-danger float-end">Back</a>
  </div>
  <div class="card-body">
      
      <form action="/petakom/bulletin/store" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <p class="hidden">Author Details</p>
        <label><b>Author Name</b></label></br>
        <input type="text" name="author_name" id="author_name" class="form-control" value="{{ Auth::user()->name }}"><br><br>

        <p class="hidden">News Details</p>
        <label><b>News Title</b></label><br>
        <input type="text" name="news_title" id="news_title" class="form-control"><br>
        
        <label><b>Description</b></label></br>
        <textarea type="text" name="news_description" id="news_description" class="form-control"></textarea><br>

        <label><b>Upload Image</b></label></br>
        <input type="file" name="news_image" id="news_image" class="custom-file-input"><br><br>

        <input type="submit" value="Save" style="width: 100%;" class="btn btn-success"><br>
    </form>
  
  </div>
  </div>
  </div>
@stop