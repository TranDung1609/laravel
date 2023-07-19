@extends('dashboard')
@section('admin_content')
    <div class="main-content">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit User</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                            <form role="form" action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $role->name }}"
                                            name="name" id="basic-default-name" placeholder="Tên" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-desc">Role</label>
                                    <div class="col-sm-10">
                                        <select name="permission_id[]" class="js-example-basic-multiple form-control"
                                            multiple="multiple">
                                            @foreach ($permissions as $permission)
                                                <option {{ $role->permissions->contains('id', $permission->id)  ? 'selected' : '' }}
                                                    value="{{ $permission->id }}">{{ $permission->code }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
