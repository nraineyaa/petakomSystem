@extends('layout.master')


<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script src="{{ asset('frontend') }}/js/dataTables.bootstrap4.js"></script>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [
                [0, "asc"]
            ],
            "language": {
                search: '<i class="fa fa-search" aria-hidden="true"></i>',
                searchPlaceholder: 'Search user details'
            }
        });


        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'display': 'inline-block',
            'font-size': '15px',
            'font-weight': '400'
        });
    });
</script>

@section('content')

<center>
    <h2><strong>List of User</strong></h2>
</center>

<section class="p-5">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>Position</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr id="1">

                            <td>Aleeya</td>
                            <td>Eyaa</td>
                            <td>Entah</td>
                            <td>0199922222</td>
                            <td>eyaa@gmail.com</td>
                            <td>
                                <div class="btn-group" style="float: right;">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteItem(this)" data-id="" data-name="">Delete</button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="1">

                            <td>Aleeya</td>
                            <td>Eyaa</td>
                            <td>Entah</td>
                            <td>0199922222</td>
                            <td>eyaa@gmail.com</td>
                            <td>
                                <div class="btn-group" style="float: right;">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteItem(this)" data-id="" data-name="">Delete</button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="1">

                            <td>Aleeya</td>
                            <td>Eyaa</td>
                            <td>Entah</td>
                            <td>0199922222</td>
                            <td>eyaa@gmail.com</td>
                            <td>
                                <div class="btn-group" style="float: right;">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteItem(this)" data-id="" data-name="">Delete</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        let name = e.getAttribute('data-name');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            html: "Name: " + name + "<br> You won't be able to revert this!",
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'DELETE',
                        url: '' + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.success) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Technician account has been deleted.',
                                    "success"
                                );

                                $("#row" + id).remove(); // you can add name div to remove
                            }


                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // );
            }
        });

    }
</script>


<!-- Page level plugin JavaScript-->
<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>

@endsection