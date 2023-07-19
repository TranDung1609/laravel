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
                        @foreach ($users as $user)
                            <form role="form" action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $user->name }}"
                                            name="name" id="basic-default-name" placeholder="Tên" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" value="{{ $user->email }}"
                                                name="email" class="form-control" placeholder="abc@gmail.com" />
                                        </div>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">PassWord</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" value="{{ $user->password }}"
                                            name="password" id="basic-default-name" placeholder="Mật khẩu" readonly />
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-desc">Vai trò</label>
                                    <div class="col-sm-10">
                                        <select name="role_id[]" lass="js-example-basic-multiple form-control"
                                        multiple="multiple">
                                            @foreach ($roles as $role)
                                                <option {{ $user->role_id == $role->id ? 'selected' : '' }}
                                                    value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-desc">Role</label>
                                    <div class="col-sm-10">
                                        <select name="role_id[]" class="js-example-basic-multiple form-control"
                                            multiple="multiple">
    
                                            @foreach ($roles as $role)
                                                <option {{ $user->roles->contains('id', $role->id)  ? 'selected' : '' }}
                                                    value="{{ $role->id }}">{{ $role->name }}</option>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
