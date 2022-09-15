@extends('dashboard.layouts.main')

@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto card pb-3 pt-3">
            <div class="alert alert-success alert-dismissible d-none del-msg" role="alert">
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Current Clients</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "ajax": {
                    "url": '/dashboard/future-clients/read',
                },
                'columns': [{
                        'data': 'name'
                    },
                    {
                        'data': 'gender'
                    },
                    {
                        'data': 'phone'
                    },
                    {
                        'data': 'service'
                    },
                    {
                        'data': 'start'
                    },
                    {
                        'data': 'end'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                            <button class='d-block mb-2 btn btn-info btn-sm w-100'><a style="color: white" href='/dashboard/clients-info/${data.id}'>SHOW</a></button>
                            <button class='d-block w-100 btn btn-danger btn-sm delete' data-id="${data.id}">DELETE</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '/dashboard/clients/' + id,
                    method: 'delete',
                    success: function(response) {
                        if (response.success) {
                            $('.del-msg').removeClass('d-none');
                            $('.del-msg').html(response.success);
                            table.ajax.reload();
                        }
                    }
                });
            });

            $('#form').submit(function() {
                table.ajax.reload();
            });
        });
    </script>
@endsection
