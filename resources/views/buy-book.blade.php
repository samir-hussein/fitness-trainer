@extends('layouts.main')

@section('style')
    <style>
        form {
            background-color: white;
            padding: 5%;
        }
    </style>
@endsection

@section('content')
    <div class="row" style="padding: 5%" dir="rtl">
        <div class="col-12 col-md-4 mb-5">
            <div class="m-auto card-mb uk-box-shadow-medium">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <form action="{{ route('book.buy.submit', ['book' => $book->id]) }}" method="post"
                class="uk-form-stacked uk-box-shadow-medium" enctype="multipart/form-data">
                @if (session('success'))
                    <div class="alert text-right alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <div>
                    <h2 class="text-right">استمارة شراء كتاب الكترونى</h2>
                    <p class="text-right">قم بملئ البيانات و ارفاق صورة المبلغ المطلوب تحويله و سوف يتم ارسال الكتاب لك عن
                        طريق الواتساب فى
                        خلال 48 ساعة.</p>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label text-right font-weight-bold" for="name">الاسم ثلاثى</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="name" type="text" dir="auto" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <p style="color: red; text-align:right">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label text-right font-weight-bold" for="phone">رقم الواتساب</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="phone" type="text" dir="auto" name="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <p style="color: red; text-align:right">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label float-right fa-1 text-right font-weight-bold" for="form-stacked-text">برجاء
                        تحميل صورة
                        المبلغ الذى تم
                        تحويله</label>
                    <div uk-form-custom="target: true" class="d-block">
                        <input type="file" id="bill-inp" name="bill_img">
                        <input class="uk-input uk-form-width-large w-100" type="text" placeholder="اختر صورة" disabled>
                    </div>
                    @error('bill_img')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                    <img class="mt-2" src="" alt="" style="height: 300px" id="bill-img">
                </div>
                <div>
                    <button class="btn">ارسال البيانات</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#' + id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#bill-inp").change(function() {
            readURL(this, 'bill-img');
        });
    </script>
@endsection
