@extends('dashboard.layouts.main')

@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto card pb-3 pt-3">
            <div class="alert alert-success alert-dismissible d-none del-msg" role="alert">
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">New Clients</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($clients)
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->gender }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->service }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><a
                                                href="{{ route('dashboard.clients.info', ['client' => $client->id]) }}"
                                                style="color: white">SHOW</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection
