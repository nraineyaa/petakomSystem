@extends('layout.master')
@section('content')

<title>Petakom | Register User </title>
<link rel="shortcut icon" href="bootstrap1/assets/images/logo/logo.png" type="image/svg" />

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('registerUser') }} " enctype="multipart/form-data" method="POST" id="formNew" onsubmit="upload()">
                                        @csrf
                                        <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <br>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="icNumber">Phone Number</label>
                                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="position">User Type</label>
                                                <select class="form-select" name="userType" id="userType">
                                                    <option value="student">Student</option>
                                                    <option value="lect">Lecturer</option>
                                                    <option value="committee">Committee</option>
                                                    <option value="hosd">HOSD</option>
                                                    <option value="dean">Dean</option>
                                                    <option value="coordinator">Coordinator</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="icNumber">Address</label>
                                                <input type="text" class="form-control" id="icNumber" name="icNumber" placeholder="Address" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function upload() {

        let timerInterval
        Swal.fire({
            title: 'Registering...',
            showConfirmButton: false,
            html: 'Please wait while system register the technician and send the account information via email',
            timerProgressBar: true,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()

            }
        })



    }
</script>


@endsection