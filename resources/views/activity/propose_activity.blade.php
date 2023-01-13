@extends('layouts.app')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">Amazing activites that are available for this semester !</p>
        </div>

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
                            @if (count($propose) > 0)
                            @foreach ($propose as $proposed)
                            <tr>
                                <td>{{ $proposed->activity->id }}</td>
                                <td>{{ $proposed->activity->name }}</td>
                                <td>{{ $proposed->activity->date }}</td>
                                <td>
                                    <a href="{{ route('activity.show', $proposed->activity->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>
                                </td>
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