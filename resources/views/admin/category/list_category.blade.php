@extends('dashboard')
@section('admin_content')
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Category</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Category</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tbody class="table-border-bottom-0">
                    <?php
                    $i=1;
                    foreach($cate as $category){
                    ?>
                            <tr>
                                <td>{{$i++; }}</td>
                                <td>{{$category->name}} </td>
                                <td><?php
                                    if ($category->status == 1) {
                                        echo "Ẩn";
                                    } elseif($category->status == 2) {
                                        echo "Hiển thị";
                                    }else{
                                        echo "";
                                    }
                                    ?></td>
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-primary" href="{{ route('category.edit', $category->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a onclick="return confirm('Bạn có muốn xoá category này không?')" class="btn btn-sm btn-danger" 
                                        href="{{ route('category.delete', $category->id) }}">
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