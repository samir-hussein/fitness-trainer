@extends('dashboard.layouts.main')

@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div>
                                    <i class='bx bxs-user bx-tada bx-lg' style='color:#696cff'></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">TOTAL VISITS</span>
                            <h3 class="card-title mb-2">{{ $total }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class='bx bxs-user bx-tada bx-lg' style='color:#696cff'></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">TODAY VISITS | {{ date('d-m-Y') }}</span>
                            <h3 class="card-title mb-2">{{ $today }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10 m-auto card p-4">
            <div>
                <div class="divider divider-info">
                    <div class="divider-text">
                        <h4 class="mb-0">Countries Visits</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-striped datatables-basic border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Visits</th>
                        </tr>
                    </thead>
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{ $country->country }}</td>
                            <td>{{ $country->visits }}</td>
                        </tr>
                    @endforeach
                    <tbody>
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
                "order": [
                    [1, 'desc'],
                ]
            });
        });
    </script>
@endsection
