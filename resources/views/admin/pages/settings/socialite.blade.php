@extends('admin.layouts.master')
@section('page_title', 'Socialite Setting')

@push('admin_style')

@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Socialite Setting Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.socialite.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="git_client_id">GITHUB Client ID</label>
                        <input type="text" name="git_client_id" value="{{ setting('git_client_id') }}" class="form-control @error('git_client_id') is-invalid @enderror"  id="git_client_id" placeholder="GITHUB Client ID">
                        @error('git_client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="git_client_secret">GITHUB Client Secret</label>
                        <input type="text" name="git_client_secret" value="{{ setting('git_client_secret') }}" class="form-control @error('git_client_secret') is-invalid @enderror"  id="git_client_secret" placeholder="GITHUB Client Secret">
                        @error('git_client_secret')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="git_client_redirect">GITHUB Client Redirect URL</label>
                        <input type="text" name="git_client_redirect" value="{{ setting('git_client_redirect') }}" class="form-control @error('git_client_redirect') is-invalid @enderror"  id="git_client_redirect" placeholder="GITHUB Client Redirect URL">
                        @error('git_client_redirect')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="google_client_id">Google Client ID</label>
                        <input type="text" name="google_client_id" value="{{ setting('google_client_id') }}" class="form-control @error('google_client_id') is-invalid @enderror"  id="google_client_id" placeholder="Google Client ID">
                        @error('google_client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="google_client_secret">Google Client Secret</label>
                        <input type="text" name="google_client_secret" value="{{ setting('google_client_secret') }}" class="form-control @error('google_client_secret') is-invalid @enderror"  id="google_client_secret" placeholder="Google Client Secret">
                        @error('google_client_secret')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="google_client_redirect">Google Client Redirect URL</label>
                        <input type="text" name="google_client_redirect" value="{{ setting('google_client_redirect') }}" class="form-control @error('google_client_redirect') is-invalid @enderror"  id="google_client_redirect" placeholder="Google Client Redirect URL">
                        @error('google_client_redirect')
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

@endpush
