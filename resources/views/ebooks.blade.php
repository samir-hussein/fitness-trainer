@extends('layouts.main')

@section('style')
    <style>
        .card-mb {
            margin-bottom: 5% !important;
        }

        .all-cards {
            padding: 5%;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="section-tittle text-center mb-0 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h2>الكتب الالكترونية</h2>
            </div>
        </div>
    </div>
    <div class="uk-child-width-1-3@m all-cards" uk-grid dir="rtl">
        @isset($books)
            @foreach ($books as $book)
                <div class="m-auto card-mb">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="/images/{{ $book->img }}"
                                style="height: 350px;object-fit:contain;width:100%;background-color:rgb(35, 35, 35);padding:1%"
                                alt="ahmed saeid fitness books">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title text-right" dir="rtl">{{ $book->title }}</h3>
                            <p dir="rtl" class="text-right">{{ $book->desc }}</p>
                        </div>
                        <div class="uk-card-footer d-flex justify-content-around align-items-center p-2">
                            <h4 class="m-0 font-weight-bold" dir="rtl">{{ $book->price }} جنيه مصرى</h4>
                            <button class="btn"><a href="{{ route('book.buy', ['book' => $book->id]) }}"
                                    style="color: white">اشترى الان</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
