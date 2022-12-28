@extends('layout/master_activity')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">Let's create more activity for the community of FK.</p>
        </div>

        <a href="{{ route('activity.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">+ Create new activity</a>

        <div class="card mx-auto p-3">
            <div class="card-body">
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Activity</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            <tr>
                                <td>1</td>
                                <td>Gotong Royong FK</td>
                                <td>12 Dec 2022</td>
                                <td class="px-5">
                                    {{-- <form action="{{ route('patient.destroy', $patient->id) }}" method="POST"> --}}
                                        {{-- @csrf
                                        @method('DELETE') --}}
                                        <a href="#" class="text-decoration-none btn btn-outline-success">View</a>
                                        <a href="{{ route('activity.edit') }}" class="text-decoration-none btn btn-warning">Edit profile</a>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        {{--
                                    </form> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection