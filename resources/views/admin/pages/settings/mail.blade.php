@extends('admin.layouts.master')
@section('page_title', 'Mail Setting')

@push('admin_style')

@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Mail Setting Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.mail.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="mail_mailer">Mail Mailer</label>
                        <input type="text" name="mail_mailer" value="{{ setting('mail_mailer') }}" class="form-control @error('mail_mailer') is-invalid @enderror"  id="mail_mailer" placeholder="Mail Mailer">
                        @error('mail_mailer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_host">Mail Host</label>
                        <input type="text" name="mail_host" value="{{ setting('mail_host') }}" class="form-control @error('mail_host') is-invalid @enderror"  id="mail_host" placeholder="Mail Host">
                        @error('mail_host')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_port">Mail PORT</label>
                        <input type="text" name="mail_port" value="{{ setting('mail_port') }}" class="form-control @error('mail_port') is-invalid @enderror"  id="mail_port" placeholder="Mail PORT Number">
                        @error('mail_port')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_username">Mail UserName</label>
                        <input type="text" name="mail_username" value="{{ setting('mail_username') }}" class="form-control @error('mail_username') is-invalid @enderror"  id="mail_username" placeholder="Mail UserName">
                        @error('mail_username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_password">Mail Password</label>
                        <input type="text" name="mail_password" value="{{ setting('mail_password') }}" class="form-control @error('mail_password') is-invalid @enderror"  id="mail_password" placeholder="Mail Password">
                        @error('mail_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_encryption">Mail Encryption</label>
                        <input type="text" name="mail_encryption" value="{{ setting('mail_encryption') }}"  class="form-control @error('mail_encryption') is-invalid @enderror"  id="mail_encryption" placeholder="Mail Encryption">
                        @error('mail_encryption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_from_address">Mail From Address</label>
                        <input type="text" name="mail_from_address" value="{{ setting('mail_from_address') }}"  class="form-control @error('mail_from_address') is-invalid @enderror"  id="mail_from_address" placeholder="Mail From Address">
                        @error('mail_from_address')
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
