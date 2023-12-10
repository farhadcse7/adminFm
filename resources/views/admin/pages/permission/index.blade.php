@extends('admin.layouts.master')
@section('page_title', 'Permission Index')

@push('admin_style')
<link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    .current{
        color: #fff !important;
        background-color: #696cff !important;
    }
</style>
@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h5 class="card-header">Permission Index / List Page</h5>
                <a href="{{ route('permission.create') }}" class="btn btn-primary me-4">Add New</a>
            </div>

            <div class="table-responsive text-nowrap p-3">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Updated</th>
                            <th>Module Name</th>
                            <th>Permission Name</th>
                            <th>Permission Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($permissions as $permission)
                        <tr>
                            <td><strong>{{ $permissions->firstItem() + $loop->index }}</strong></td>
                            <td>{{ $permission->updated_at->format('d-M-Y') }}</td>
                            <td>{{ $permission->module->module_name }}</td>
                            <td>{{ $permission->permission_name }}</td>
                            <td>{{ $permission->permission_slug }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('permission.edit', $permission->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>

                                        <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item show_confirm" href="">
                                                <i class="bx bx-trash me-1"></i>
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="my-4">
            {{ $permissions->links() }}
        </div> --}}
    </div>
</div>
@endsection

@push('admin_script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#myTable').DataTable();

    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');

        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    });

});
</script>
@endpush
