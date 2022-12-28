@extends('layout.master_activity')


@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="card mx-auto" style="max-width: 50rem;">
            <div class="card-body">
                <div class="d-flex gap-3">
                    <div class="card d-none d-md-block w-50">
                        <div class="card-body">
                            <span class="display-3 fw-semibold">Edit <br> Activity.</span>
                        </div>
                    </div>
                    <div class="card-text w-75">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Organizer name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Activity name</label>
                        </div>
                        <div class="d-sm-flex flex-lg-column gap-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Time</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Activity description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Activity objective</label>
                        </div>
                        <button class="btn btn-primary w-100 p-2 fs-5">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection