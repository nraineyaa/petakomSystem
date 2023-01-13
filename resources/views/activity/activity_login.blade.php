@extends('layouts.app')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">Let's create more activity for the community of FK.</p>
        </div>

        <a href="{{ route('activity.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new activity</a>

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card mx-auto p-3">
            <div class="card-body">
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Activity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($activity) > 0)
                            @foreach ($activity as $activities)
                            <tr>
                                <td>{{ $activities->id }}</td>
                                <td>{{ $activities->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($activities->date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($activities->status == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $activities->status }}
                                    </div>
                                    @elseif ($activities->status == "Approved")
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $activities->status }}
                                    </div>
                                    @elseif ($activities->propose)
                                    <div class="badge bg-warning text-wrap text-dark" style="width: 6rem;">
                                        Pending
                                    </div>
                                    @else
                                    <div class="badge bg-primary text-wrap text-light" style="width: 6rem;">
                                        None
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('activity.show', $activities->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>
                                   
                                    @if ($activities->propose)
                                    <a href="{{ route('activity.edit', $activities->id) }}"
                                        class="text-decoration-none btn btn-warning disabled">Edit activity</a>
                                    <a href="{{ route('propose.activity', $activities->id) }}"
                                        class="text-decoration-none btn btn-primary disabled" >Propose</a>
                                    @else
                                    <a href="{{ route('activity.edit', $activities->id) }}"
                                        class="text-decoration-none btn btn-warning">Edit activity</a>
                                    <a href="{{ route('propose.activity', $activities->id) }}"
                                        class="text-decoration-none btn btn-primary" >Propose</a>
                                    @endif
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $activities->id }}">Delete</a>
                                </td>
                                @include('activity.delete')
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Available</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</section>

@endsection