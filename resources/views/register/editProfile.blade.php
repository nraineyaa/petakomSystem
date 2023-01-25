@extends('layout.master')

@section('content')
<!-- Default Light Table -->
<title>Petakom | My Profile </title>
<link rel="shortcut icon" href="bootstrap1/assets/images/logo/logo.png">

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-md-8">
            <div class="card card-small mb-3 pt-0">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="bootstrap1/assets/images/logo/pp.png"" alt=" User Avatar" width="110" height="110">
                    </div>
                    <h4 class="mb-0">{{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</h4>
                    <span class="text-muted d-block mb-2">{{ Auth::user()->category }}</span>
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2" data-toggle="modal" data-target="#modalProfile">
                        <i class="material-icons mr-1"></i>Change Profile</button>
                </div>

            </div>
        </div>


        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action=" " enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <b for="name">First Name</b>
                                            <input type="text" class="form-control" id="Fname" name="Fname" value="{{auth()->user()->Fname}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <b for="name">Last Name</b>
                                            <input type="text" class="form-control" id="Lname" name="Lname" value="{{auth()->user()->Lname}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <b for="feEmailAddress">Email</b>
                                            <input type="email" name="email" readonly class="form-control-plaintext" id="feEmailAddress"  value="{{auth()->user()->email}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <b for="feEmailAddress">Phone Number</b>
                                            <input type="text" name="phoneNum" class="form-control" id="phoneNum"  value="{{auth()->user()->phoneNum}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <b for="address">Address</b>
                                            <input type="address" name="address" class="form-control" id="address"value="{{auth()->user()->address}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <b for="category">Category</b>
                                            <input type="category" name="category" readonly class="form-control-plaintext" id="category"value="{{auth()->user()->category}}">
                                        </div>
                                    </div>

                                    <br>
                                    <div style="float: right;"> 
                                    <button type="submit" class="btn btn-primary btn-md"">Update Account</button>
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
<!-- End Default Light Table -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<!-- Modal Change profile-->
<div class="modal fade" id="modalProfile" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Profile Image</h4>
            </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data" action="" onsubmit="upload()">
                    @csrf

                    <div class="form-group row">


                        <div class="col-md-12">
                            <input type="file" class="form-control" name="avatar" id="avatarFile" aria-describedby="fileHelp" required>
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">
                        Upload
                    </button>


                </form>
            </div>
        </div>
    </div>

</div>


<script>
    function upload() {

        let timerInterval
        Swal.fire({
            title: 'Updating...',
            showConfirmButton: false,
            html: 'Please wait while system updating your profile picture.',
            timerProgressBar: true,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()

            }
        })



    }
</script>
@endsection