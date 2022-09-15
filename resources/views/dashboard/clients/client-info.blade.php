@extends('dashboard.layouts.main')

@section('style')
    <style>
        label {
            text-align: right
        }
    </style>
@endsection

@section('content')
    <div class="col-12 col-md-10 m-auto">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Client information</h5>
                <button class="btn btn-dark btn-large pdf">Export PDF</button>
            </div>
            @if (session('success'))
                <div class="w-75 m-auto alert alert-success alert-dismissible text-right" dir="rtl" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body" dir="rtl">
                <form action="{{ route('dashboard.clients.handle', ['client' => $client->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label text-right" for="basic-default-fullname">الاسم ثلاثى</label>
                            <input type="text" class="form-control" id="name" disabled value="{{ $client->name }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-fullname">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" disabled value="{{ $client->phone }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">العمر</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->age }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">الجنس</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->gender }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">الطول (سم)</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->height }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">الوزن (كجم)</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->weight }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">وقت النوم</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->sleep }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">وقت الاستيقاظ من النوم</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->wake_up }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">وقت الذهاب الى العمل</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->go_work }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">وقت العودة الى المنزل</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->go_home }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">الوقت المفضل للذهاب للتمرين</label>
                            <input type="text" class="form-control" id="basic-default-company" disabled
                                value="{{ $client->training_at }}">
                        </div>
                        <div class="d-inline-block" style="width: calc(98% / 2)">
                            <label class="form-label" for="basic-default-company">الخدمة المختارة</label>
                            <select class="form-control" name="service" style="direction:rtl !important" dir="rtl">
                                @isset($services)
                                    @foreach ($services as $service)
                                        <option {{ "$client->service" == "$service->name" ? 'selected' : '' }}
                                            class="text-right" value="{{ $service->name }}">{{ $service->name }} -
                                            {{ $service->price }} جنيه مصرى
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">ما وهو هدف هذا البرنامج؟ (هدف واقعي في فترة
                            الثلاث شهور القادمة)</label>
                        <textarea id="basic-default-message" class="form-control" disabled>{{ $client->goal }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">هل تريد إستخدام المكملات في هذا البرنامج؟ هل
                            لديك حد مادي (أو مشاكل مادية) حتى أخصص برنامج بإستخدم أهم مكملات فقط؟</label>
                        <textarea id="basic-default-message" class="form-control" disabled>{{ $client->supplement }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">هل تشارك في أي رياضات أخرى؟
                        </label>
                        <textarea id="basic-default-message" class="form-control" disabled>{{ $client->another_sport }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">هل لديك اصابات أو أي حساسية من أي
                            أكل؟</label>
                        <textarea id="basic-default-message" class="form-control" disabled>{{ $client->problems }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">صور للعميل من الامام و من الخلف.</label>
                        <div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#fullscreenModal">
                                        <img style="width: 100%" src="/images/{{ $client->front_body }}" alt="">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="fullscreenModal" tabindex="-1" style="display: none;"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="/images/{{ $client->front_body }}" alt=""
                                                        style="height: 100%" class="d-block m-auto">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#model2">
                                        <img style="width: 100%" src="/images/{{ $client->back_body }}" alt="">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="model2" tabindex="-1" style="display: none;"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="/images/{{ $client->back_body }}" alt=""
                                                        style="height: 100%" class="d-block m-auto">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">صورة المبلغ الذى تم تحويله.</label>
                        <div class="d-flex">
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#bill">
                                        <img style="width: 100%" src="/images/{{ $client->bill }}" alt="">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="bill" tabindex="-1" style="display: none;"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="/images/{{ $client->bill }}" alt=""
                                                        style="height: 100%" class="d-block m-auto">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-5 row">
                            <label for="html5-date-input" class="form-label fs-6">* اذا كان اختيار العميل برنامج متابعة
                                يجب اختيار تاريخ بداية المتابعة.</label>
                            <div>
                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}"
                                    id="html5-date-input" name="start">
                            </div>
                            @error('start')
                                <p style="color: red">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" name="follow" value="yes">بدء
                            المتابعة</button>
                        <button type="submit" class="btn btn-secondary" name="sell" value="yes">بيع
                            برنامج</button>
                        <button type="button" class="btn btn-danger delete" data-id="{{ $client->id }}"><a
                                href="javascript:;" style="color: white">حذف</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/html2pdf.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '/dashboard/clients/' + id,
                    method: 'delete',
                    success: function(response) {
                        if (response.success) {
                            history.back();
                        }
                    }
                });
            });

            $('.pdf').click(function() {
                var content = $(".card-body").html();

                var opt = {
                    margin: 1,
                    filename: $('#name').val() + ' - ' + $("#phone").val() + '.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canavas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                }

                html2pdf().set(opt).from(content).save();
            });
        });
    </script>
@endsection
