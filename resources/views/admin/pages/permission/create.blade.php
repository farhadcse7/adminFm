@extends('admin.layouts.master')
@section('page_title', 'Permission Create')

@push('admin_style')
@endpush


@section('admin_content')
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Permission Create Form</h5>
                    <small class="text-muted float-end">
                        <a href="{{ route('permission.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back'></i> Back to Permission List</a>
                    </small>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Module Selection</label>
                            <select name="module_id" id="" class="form-select @error('module_id') is-invalid @enderror">
                                <option value="">Select a Module</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->module_name }}</option>
                                @endforeach
                            </select>
                            @error('module_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Permission Name</label>
                            <input type="text" name="permission_name" class="form-control @error('permission_name') is-invalid @enderror" id="basic-default-fullname" placeholder="enter a permission name">
                            @error('permission_name')
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
