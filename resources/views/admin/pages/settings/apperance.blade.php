@extends('admin.layouts.master')
@section('page_title', 'Apperance Setting')

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Apperance Setting Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.apperance.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="bg_color">Background Color</label>
                        <input type="text" name="bg_color" value="{{ setting('bg_color') }}" class="form-control @error('bg_color') is-invalid @enderror" id="bg_color" placeholder="Background Color">
                        @error('bg_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="logo_image">Upload Logo</label>
                        <input type="file" class="dropify @error('logo_image') is-invalid @enderror" id="logo_image" name="logo_image" data-default-file="{{ setting('logo_image') !=null ? Storage::url(setting('logo_image')):'' }}"/>
                        @error('logo_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="favicon_image">Upload Favicon (Size: 33 X 33)</label>
                        <input type="file" class="dropify @error('favicon_image') is-invalid @enderror" id="favicon_image" name="favicon_image" data-default-file="{{ setting('favicon_image') !=null ? Storage::url(setting('favicon_image')):'' }}" />
                        @error('favicon_image')
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
        'default': 'Upload Logo Image',
    }
});
</script>
@endpush
