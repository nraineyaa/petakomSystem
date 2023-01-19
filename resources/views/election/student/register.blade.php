@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                    <center><input type="search" id="gsearh" name="gsearch" style="width:70%">
                        <input type="submit">
                    </center>
                </div>

            </div><br>
            <center>
                <h2><strong>ELECTION REGISTRATION</strong></h2>
            </center><br>
            @if(! $election)
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <table style="width:80%">
                                <br>
                                <tr>
                                    <th>Profile Image:</th>
                                    <td><input type="file" id="myFile" name="profile_img"></td>
                                </tr>
                                <tr>
                                    <th>Student ID:</th>
                                    <td><input type="text" id="name" name="student_ID" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td><input type="text" id="year" name="full_name" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Current Semester:</th>
                                    <td><input type="text" id="address" name="crt_semester" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Current Result:</th>
                                    <td><input type="text" id="phone" name="crt_result" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Previous Activities:</th>
                                    <td><input type="text" id="phone" name="prv_activities" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Manifesto:</th>
                                    <td style="width:70%"><textarea id="w3review" name="manifesto" rows="4" cols="50"></textarea></td>
                                </tr>
                            </table>
                        </center><br>
                        <center><input type="submit" style="width:70%; background-color:forestgreen; color:aliceblue"></center><br> <!--registration-->
                        <center><button style="width:70%; background-color:firebrick; color:aliceblue">Cancel</button></center>
                    </form> <!--Go to dashboard.Student-->
                </div>
            </div>
            @elseif($election)
            <div class="card">

                <div class="card">
                <div class="card-header">{{ __('Registered') }}</div>
                <div class="card-body">


                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Year</th>
                                <th scope="col"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider align-middle">

                        @foreach($election_data as $key=>$data)
                            <tr id="row{{ $data->id }}">
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->full_name }}</td>
                                <td>{{ $data->crt_semester }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-success" href="/hosdInfo">View Details</a>
                                    <a class="btn btn-success" href="{{ route('election.student.updateReg', $data->id) }}">Update</a>
                                    <a class="btn btn-success" href="{{ route('destroy', $data->id) }}">Delete</a>
                                </td> 
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>


                

            </div>


                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection