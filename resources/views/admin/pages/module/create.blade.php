@extends('admin.layouts.master')
@section('page_title', 'Module Create')

@push('admin_style')
@endpush


@section('admin_content')
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Module Create Form</h5>
                    <small class="text-muted float-end">
                        <a href="{{ route('module.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back'></i> Back to Module List</a>
                    </small>
                </div>
                <div class="card-body">
                    <form action="{{ route('module.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Module Name</label>
                            <input type="text" name="module_name" class="form-control" id="basic-default-fullname" placeholder="enter a module name">
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
