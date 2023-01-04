@extends('layouts.app')
@section('content')
<title>Show</title>

<div class="container">
<div style="border-color:white;" class="card">
  <div style="border-color:white;font-weight:bold;" class="card-header">News
    <a href="{{ url('user/bulletin') }}" class="btn btn-sm btn-danger float-end">Back</a>
  </div>
  <div class="card-body">
        <p class="card-text">{{ $bulletin->news_title }}</p>
        <p class="card-text">By <span style="text-transform:uppercase;font-weight:bold;">{{ $bulletin->author_name }}</span> - {{ $bulletin->created_at->format('d/m/Y') }}</p>
        <hr>
        <p style="margin-top:150px;" class="center"><img src="{{ asset('uploads/newsImage/' .$bulletin->news_image) }}" width="40%"></p>
        <br>
        <p>{!! $bulletin->news_description !!}</p>
        <hr>
        <p><span style="color:blue;">Edited by {{ $bulletin->updateBy }} on {{ $bulletin->updated_at->format('d/m/Y') }}</span></p>
  </div>
      
    </hr>
  
  </div>
</div>
</div>
@endsection