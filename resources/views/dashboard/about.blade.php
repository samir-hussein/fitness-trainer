@extends('dashboard.layouts.main')


@section('content')
    <div class="row m-auto">
        <div class="col-12 col-md-10 m-auto mb-5">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">About Me</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="form" method="post" action="{{ route('dashboard.about.submit') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="bx bx-phone"></i></span>
                                    <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                        aria-describedby="basic-icon-default-phone2" name="phone"
                                        value="{{ $phone }}">
                                </div>
                                @error('phone')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="email" id="basic-icon-default-email" class="form-control"
                                        aria-describedby="basic-icon-default-email2" name="email"
                                        value="{{ $email }}">
                                </div>
                                @error('email')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                                <textarea dir="auto" class="form-control" id="exampleFormControlTextarea1" rows="3" name="body">{{ $body }}</textarea>
                            </div>
                            <div class="mb-3">
                                <img style="height:auto;max-height: 300px;width:auto; max-width:100%"
                                    src="/images/{{ $img }}" alt="" id="img">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Add new image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                                @error('image')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <video style="height:auto;max-height: 300px;width:auto; max-width:100%"
                                    src="/videos/{{ $video }}" controls></video>
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label">Add new video</label>
                                <input class="form-control" type="file" id="video" name="vid">
                                @error('vid')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img style="height:auto;max-height: 300px;width:auto; max-width:100%"
                                    src="/images/{{ $poster }}" alt="" id="poster_img">
                            </div>
                            <div class="mb-3">
                                <label for="poster" class="form-label">Add poster for video</label>
                                <input class="form-control" type="file" id="poster" name="poster">
                                @error('poster')
                                    <p style="color: red">* {{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Change</button>
                        </form>
                    </div>
                </div>
            </div>
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

        $("#formFile").change(function() {
            readURL(this, 'img');
        });

        $("#poster").change(function() {
            readURL(this, 'poster_img');
        });
    </script>
@endsection
