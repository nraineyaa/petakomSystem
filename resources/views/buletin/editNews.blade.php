@extends('layouts.app')
@section('content')

<title>Edit</title>

<div class="container">
<div style="border-color:white;font-weight:bold;" class="card">
  <div class="card-header">Edit News
     <a href="{{ url('petakom/bulletin') }}" class="btn btn-sm btn-danger float-end">Back</a>
  </div>
  <div style="border-color:white;" class="card-body">
      
      <form action="/petakom/bulletin/{{$bulletin->id}}/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <input type="hidden" name="id" id="id" value="{{$bulletin->id}}" id="id" />
        <p class="hidden">Author Details</p>
        <label><b>Author Name</b></label></br>
        <input type="text" name="author_name" id="author_name" class="form-control" value="{{$bulletin->author_name}}"><br><br>

        <p class="hidden">News Details</p>
        <label><b>News Title</b></label></br>
        <input type="text" name="news_title" id="news_title" class="form-control" value="{{$bulletin->news_title}}"><br>

        <label><b>Description</b></label></br>
        <textarea name="news_description" id="news_description" class="form-control" cols=139  rows=15>{{$bulletin->news_description}}"</textarea><br>

        <label><b>Current Image</b></label></br>
        <img src="{{ asset('uploads/newsImage/' .$bulletin->news_image) }}" width="30%"><br>
        <label><b>Change Image</b></label></br>
        <input type="file" name="news_image" id="news_image" class="custom-file-input" value="{{$bulletin->news_image}}"><br><br>

        <label><b>Edited By</b></label></br>
        <input type="text" name="updateBy" id="updateBy" class="form-control" value="{{ Auth::user()->name }}" readonly><br><br>

        <input type="submit" value="Update" style="width: 100%;" class="btn btn-success"><br>
    </form>
  
  </div>
</div>
</div>
@stop