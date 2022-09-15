@extends('dashboard.layouts.main')

@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto card pb-3 pt-3">
            <div class="alert alert-success alert-dismissible d-none del-msg" role="alert">
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Books Clients</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Book Name</th>
                            <th>Book Price</th>
                            <th>Bill Image</th>
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
                    "url": '/dashboard/books-clients/read',
                },
                'columns': [{
                        'data': 'name'
                    },
                    {
                        'data': 'phone'
                    },
                    {
                        'data': 'book_name'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <td>${data.book_price} EGP</td>
                            `;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <img src="/images/${data.bill}" width="200" height="200">
                            `;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            let done_button = '';
                            if (data.status == 'new') {
                                done_button =
                                    `<button class='d-block mb-2 btn btn-success btn-sm w-100 done' data-id="${data.id}">Done</button>`;
                            }
                            return `
                            ${done_button}
                            <button class='d-block w-100 btn btn-danger btn-sm delete' data-id="${data.id}">DELETE</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '/dashboard/books-clients/' + id,
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

            $(document).on('click', '.done', function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '/dashboard/books-clients/' + id + '/handle',
                    method: 'post',
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
