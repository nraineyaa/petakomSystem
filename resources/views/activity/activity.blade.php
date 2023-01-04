@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        {{-- <img src="{{ asset('image/burger.png') }}" alt="burger"> --}}
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">Below show the list of activities available for current semester</p>
        </div>

        <div class="mx-auto mt-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Organizer</th>
                        <th scope="col">Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider align-middle">
                    <tr>
                        <th scope="row">1</th>
                        <td>Gotong Royong FK</td>
                        <td>Afiq</td>
                        <td><a class="btn btn-success" href="/showactivity">View</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Gotong Royong FK</td>
                        <td>Afiq</td>
                        <td><button class="btn btn-success">View</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Gotong Royong FK</td>
                        <td>Afiq</td>
                        <td><button class="btn btn-success">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection