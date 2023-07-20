@extends('dashboard')
@section('admin_content')
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Role</h4>
    <x-auth-session-status class="mb-4" :status="session('message')" />
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Role</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tbody class="table-border-bottom-0">
                    <?php
                    $i=1;
                    foreach($roles as $role){
                    ?>
                            <tr>
                                <td>{{$i++; }}</td>
                                <td>{{$role->name}} </td>
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-primary" href="{{ route('role.edit', $role->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a onclick="return confirm('Bạn có muốn xoá role này không?')" class="btn btn-sm btn-danger" 
                                        href="{{ route('role.delete', $role->id) }}">
                                            <i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                            </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection