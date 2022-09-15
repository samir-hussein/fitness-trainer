@extends('dashboard.layouts.main')

@section('style')
    <style>
        td {
            white-space: break-spaces;
            text-align: right;
        }
    </style>
@endsection

@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Services for sale</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('dashboard.services.submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Service Name</label>
                            <input dir="auto" type="text" class="form-control" id="basic-default-fullname"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <p style="color: red">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Price</label>
                            <input type="text" class="form-control" id="basic-default-company" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <p style="color: red">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Description</label>
                            <textarea dir="auto" id="basic-default-message" class="form-control" name="desc">{{ old('desc') }}</textarea>
                            @error('desc')
                                <p style="color: red">* {{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10 m-auto card pb-3 pt-3">
            <div class="alert alert-success alert-dismissible d-none del-msg" role="alert">
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Services for sale</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
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
                    "url": '/dashboard/services/read',
                },
                'columns': [{
                        'data': 'name'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<td>${data.price} EGP</td>`;
                        }
                    },
                    {
                        'data': 'desc'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class='d-block btn btn-danger btn-sm delete' data-id="${data.id}">DELETE</button>`;
                        }
                    }
                ]
            });

            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '/dashboard/services/' + id,
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
