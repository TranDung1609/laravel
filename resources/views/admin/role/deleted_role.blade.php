@extends('dashboard')
@section('admin_content')
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Role</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Role Deleted</h5>
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
                                        <a onclick="return confirm('Bạn có muốn khôi phục role này không?')" class="btn btn-sm btn-danger" 
                                        href="{{ route('role.rollback', $role->id) }}">
                                            <i class="bx bx-trash me-1"></i> Rollback</a>
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