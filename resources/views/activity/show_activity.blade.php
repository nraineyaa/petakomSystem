@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="text-center">
            <span class="display-2 fw-semibold ">{{ $activity->name }}</span>

            <div class="row justify-content-md-center fs-5 mt-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Time
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ \Carbon\Carbon::createFromFormat('H:i:s',$activity->time)->format('h:i A')}}
                    {{-- {{ $activity->time }} --}}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Date
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ \Carbon\Carbon::parse($activity->date)->format('j F, Y') }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Venue
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->venue }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Organizer
                </div>
                <div class="col-md-auto text-start ">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->organizer_name }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Objective
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->objective }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Description
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->description }}
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection