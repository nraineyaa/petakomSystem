@extends('layouts.app')
@section('content')
<title>Show</title>

<div class="container">
<div style="border-color:white;" class="card">
  <div style="border-color:white;font-weight:bold;" class="card-header">News
    <a href="{{ url('petakom/bulletin') }}" class="btn btn-sm btn-danger float-end">Back</a>
  </div>
  <div class="card-body">
        <h1><b>{{ $bulletin->news_title }}</b></h1>
        <p>By <span style="text-transform:uppercase;font-weight:bold;">{{ $bulletin->author_name }}</span> - <span style="color:#4169E1;font-weight:bold;">{{ $bulletin->created_at->format('d/m/Y') }}</span></p>
        <hr>
        <p style="margin-top:150px;" class="center"><img src="{{ asset('uploads/newsImage/' .$bulletin->news_image) }}" width="30%"></p><br><br>
        <p style="margin-top:450px;">{!! $bulletin->news_description !!}</p><br>
        <hr>
        <p><span style="color:blue;">Edited by {{ $bulletin->updateBy }} on {{ $bulletin->updated_at->format('d/m/Y') }}</span></p>
  </div>
      
   
  
  </div>
</div>
</div>
@endsection