@extends('layouts.main')

@section('style')
    <style>
        label {
            font-size: 20px !important;
        }

        .btn-send {
            padding: 0.5% 2%;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 900;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-12 col-md-10 m-auto p-3 uk-border-rounded uk-box-shadow-medium" style="background-color: white"
            dir="rtl">
            <h2 class="text-center">استمارة شراء / اشتراك</h2>
            <h5 class="text-right">يتم الدفع عن طريق فودافون كاش على الرقم ( 01011796422 ) او عن طريق اتصالات كاش على الرقم (
                01143471660 ) ثم تقوم
                بملئ هذة الاستمارة و ارفاق صورة رسالة تحويل المبلغ و سوف يتم التواصل معك فى خلال 48 ساعة</h5>
            <h6 class="text-right mt-0">* يجب ادخال جميع البيانات المطلوبة</h6>
            @if (session('success'))
                <div class="alert text-right alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-right" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="uk-grid-small" uk-grid action="{{ route('buy.form.submit') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">الاسم ثلاثى</label>
                    <div class="uk-width-1-1">
                        <input class="uk-input" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">عمرك</label>
                    <div>
                        <input class="uk-input" type="text" name="age" value="{{ old('age') }}">
                    </div>
                    @error('age')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">الجنس</label>
                    <div>
                        <select class="w-100" id="form-stacked-text" name="gender">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>انثى</option>
                        </select>
                    </div>
                    @error('gender')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">طولك (سم)</label>
                    <div>
                        <input class="uk-input" type="text" name="height" value="{{ old('height') }}">
                    </div>
                    @error('height')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">وزنك (كجم)</label>
                    <div>
                        <input class="uk-input" type="text" name="weight" value="{{ old('weight') }}">
                    </div>
                    @error('weight')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1" for="form-stacked-text">وقت النوم</label>
                    <div>
                        <input class="uk-input" type="text" name="sleep" value="{{ old('sleep') }}">
                    </div>
                    @error('sleep')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">وقت الاستيقاظ من
                        النوم</label>
                    <div>
                        <input class="uk-input" type="text" name="wake_up" value="{{ old('wake_up') }}">
                    </div>
                    @error('wake_up')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">الوقت الذي تذهب من
                        المنزل إلى
                        الشغل</label>
                    <div>
                        <input class="uk-input" type="text" name="go_work" value="{{ old('go_work') }}">
                    </div>
                    @error('go_work')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">الوقت الذي تذهب من
                        الشغل الى
                        المنزل (إنتهاء
                        العمل)</label>
                    <div>
                        <input class="uk-input" type="text" name="go_home" value="{{ old('go_home') }}">
                    </div>
                    @error('go_home')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">رقم هاتف للتواصل عن
                        طريق
                        الواتساب</label>
                    <div>
                        <input class="uk-input" type="text" name="phone" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">الوقت المفضل للذهاب
                        للتمرين</label>
                    <div>
                        <input class="uk-input" type="text" name="training_at" value="{{ old('training_at') }}">
                    </div>
                    @error('training_at')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">ما وهو هدف هذا
                        البرنامج؟ (هدف
                        واقعي في فترة الثلاث شهور القادمة)</label>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" rows="2" name="goal">{{ old('goal') }}</textarea>
                    </div>
                    @error('goal')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">هل تريد إستخدام
                        المكملات في هذا
                        البرنامج؟ هل لديك حد مادي (أو مشاكل مادية) حتى أخصص برنامج بإستخدم أهم مكملات فقط؟</label>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" rows="2" name="supplement">{{ old('supplement') }}</textarea>
                    </div>
                    @error('supplement')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">هل تشارك في أي رياضات
                        أخرى؟</label>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" rows="2" name="another_sport">{{ old('another_sport') }}</textarea>
                    </div>
                    @error('another_sport')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">هل لديك اصابات أو أي
                        حساسية من أي
                        أكل؟</label>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" rows="2" name="problems">{{ old('problems') }}</textarea>
                    </div>
                    @error('problems')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">برجاء تحميل صورة
                        لجسمك
                        من
                        الامام</label>
                    <div uk-form-custom="target: true" class="d-block">
                        <input type="file" id="front-body-inp" name="front_img">
                        <input class="uk-input uk-form-width-large w-100" type="text" placeholder="اختر صورة"
                            disabled>
                    </div>
                    @error('front_img')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                    <img class="mt-2" src="" alt="" style="height: 300px" id="front-body-img">
                </div>
                <div class="uk-margin uk-width-1-2@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">برجاء تحميل صورة
                        لجسمك من
                        الخلف</label>
                    <div uk-form-custom="target: true" class="d-block">
                        <input type="file" id="back-body-inp" name="back_img">
                        <input class="uk-input uk-form-width-large w-100" type="text" placeholder="اختر صورة"
                            disabled>
                    </div>
                    @error('back_img')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                    <img class="mt-2" src="" alt="" style="height: 300px" id="back-body-img">
                </div>
                <div class="uk-margin uk-width-1-1@s">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">برجاء اختيار الخدمة
                        التى
                        تريدها</label>
                    <div>
                        <select class="w-100" id="form-stacked-text" name="service" style="direction:rtl !important"
                            dir="rtl">
                            @isset($services)
                                @foreach ($services as $service)
                                    <option {{ old('service') == "$service->name" ? 'selected' : '' }}
                                        {{ $selected_service == "$service->name" ? 'selected' : '' }} class="text-right"
                                        value="{{ $service->name }}">{{ $service->name }} -
                                        {{ $service->price }} جنيه مصرى
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    @error('service')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                </div>
                <div class="uk-margin uk-width-1-1">
                    <label class="uk-form-label float-right fa-1 text-right" for="form-stacked-text">برجاء تحميل صورة
                        المبلغ الذى تم
                        تحويله</label>
                    <div uk-form-custom="target: true" class="d-block">
                        <input type="file" id="bill-inp" name="bill_img">
                        <input class="uk-input uk-form-width-large w-100" type="text" placeholder="اختر صورة"
                            disabled>
                    </div>
                    @error('bill_img')
                        <p style="color: red; text-align:right">* {{ $message }}</p>
                    @enderror
                    <img class="mt-2" src="" alt="" style="height: 300px" id="bill-img">
                </div>

                <button type="submit" class="btn-send uk-box-shadow-medium">ارسل البيانات</button>
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

        $("#front-body-inp").change(function() {
            readURL(this, 'front-body-img');
        });

        $("#back-body-inp").change(function() {
            readURL(this, 'back-body-img');
        });

        $("#bill-inp").change(function() {
            readURL(this, 'bill-img');
        });
    </script>
@endsection
