@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                    <center><input type="search" id="gsearch" name="gsearch" style="width:70%">
                        <input type="submit">
                    </center>
                </div>

            </div><br>
            <center>
                <h2><strong>ELECTION INFO FOR COORDINATOR</strong></h2>
            </center>
            <center>
                <h4>Faculty of Computing</h4>
            </center><br>
            <div class="card">
                <div class="card-header">{{ __('Candidate Information') }}</div>
                <div class="card-body">

                    @foreach($election as $key=>$data)
                    <center>
                        <table style="width:80%">
                            <br>
                            
                            <tr>
                                <th>Student ID:</th>
                                <td>{{ $data->student_ID }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $data->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Current Semester:</th>
                                <td>{{ $data->crt_semester }}</td>
                            </tr>
                            <tr>
                                <th>Current Result:</th>
                                <td>{{ $data->crt_result }}</td>
                            </tr>
                            <tr>
                                <th>Previous Activities:</th>
                                <td>{{ $data->prv_activities }}</td>
                            </tr>
                            <tr>
                                <th>Manifesto:</th>
                                <td>{{ $data->manifesto }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ $data->status }}</td>
                            </tr>
                        </table>
                    </center><br>
                    @endforeach
                </div>


            </div>

        </div>
    </div>
</div>
</div>
@endsection