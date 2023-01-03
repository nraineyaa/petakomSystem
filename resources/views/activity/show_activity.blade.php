@extends('layout.master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="text-center">
            <span class="display-2 fw-semibold ">Gotong Royong FK</span>

            <div class="row justify-content-md-center fs-5 mt-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Time
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    8.30 a.m -12 p.m
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
                    12 Dec 2022
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
                    Fakulti Komputer
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
                    Afiq
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
                    To allow students and FK community work together clearn the campus.
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
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est nisi, sapiente blanditiis et odio iusto omnis! Animi voluptatem libero, rem odio quo, quam facere culpa vel ex placeat, natus ea.
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection