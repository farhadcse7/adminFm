@extends('admin.layouts.master')
@section('page_title', 'Profile Update')

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Profile Update Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('postupdate.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="profile-image">User Profile Image Upload</label>
                        <input type="file" class="dropify @error('user_image') is-invalid @enderror" name="user_image" data-default-file="{{ asset('uploads/profile_images') }}/{{ $authuser->user_image }}" />
                        @error('user_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">User Name</label>
                        <input type="text" name="name" value="{{ $authuser->name }}" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="enter a user name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullemail">User Email</label>
                        <input type="text" name="email" value="{{ $authuser->email }}" class="form-control @error('email') is-invalid @enderror" id="basic-default-fullemail" placeholder="enter a user email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.dropify').dropify({
    messages: {
        'default': 'Upload profile image',
    }
});
</script>
@endpush
