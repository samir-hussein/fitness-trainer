@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-10 m-auto mb-5">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Youtube</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="form" method="post" action="{{ route('dashboard.youtube.submit') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Video Title</label>
                                <input dir="auto" type="text" class="form-control" id="basic-default-fullname"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Video Link</label>
                                <input dir="auto" type="text" class="form-control" id="basic-default-fullname"
                                    name="link" value="{{ old('link') }}">
                                @error('link')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 m-auto card pb-3 pt-3">
            <div class="alert alert-success alert-dismissible d-none del-msg" role="alert">
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Youtube</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Video</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show">
                        <tr>
                            <td class='text-center'>No data available in table</td>
                            <td class='text-center'></td>
                            <td class='text-center'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                searching: false
            });
        });

        $('#form').submit(function() {
            getdata();
        });

        function getdata() {
            $.ajax({
                url: '/dashboard/youtube/read',
                method: 'get',
                success: function(data) {
                    let videos = data.data;
                    let row = '';
                    videos.forEach((video) => {
                        row += `
                        <tr>
                            <td>
                                <iframe src="${video.embed}" allowfullscreen frameborder="0" style="width: 100%; height:100%">
                                </iframe>
                            </td>
                            <td>${video.title}</td>
                            <td><button class='d-block btn btn-danger btn-md delete' data-id="${video.id}">DELETE</button></td>
                        </tr>
                    `;
                    });
                    if (row == '') {
                        row = `<tr>
                            <td class='text-center'>No data available in table</td>
                            <td class='text-center'></td>
                            <td class='text-center'></td>
                        </tr>`;
                    }
                    $('#show').html(row);
                }
            });
        }
        getdata();

        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $.ajax({
                url: '/dashboard/youtube/' + id,
                method: 'delete',
                success: function(response) {
                    if (response.success) {
                        $('.del-msg').removeClass('d-none');
                        $('.del-msg').html(response.success);
                        getdata();
                    }
                }
            });
        });
    </script>
@endsection
