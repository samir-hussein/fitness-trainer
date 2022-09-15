@extends('layouts.main')

@section('style')
    <style>
        .result-img {
            height: 100%;
            object-fit: contain;
            background: radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%);
            transition: 1.5s transform;
            border-radius: 20px;
        }

        .result-img:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    <div class="row p-5">
        <div class="col-xl-12">
            <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h2>النتائج</h2>
            </div>
        </div>
        @isset($results)
            @foreach ($results as $result)
                <div class="col-12 col-md-4 mb-5">
                    <img class="result-img uk-box-shadow-medium" src="/images/{{ $result->img }}"
                        alt="ahmed saeid fitness results">
                </div>
            @endforeach
        @endisset
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $results->links() }}
            </div>
        </div>
    </div>
@endsection
