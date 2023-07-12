@extends('dashboard')
@section('admin_content')
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span>List Post</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Post</h5>
        <div class="table-responsive text-nowrap">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    <?php
                    $i = 1;
                    ?>
                    @foreach ($posts as $post) 
                    
                        <tr>
                            <td>{{$i++; }}</td>
                            <td style="width: 30%">{{$post->title}}</td>
                            <td>
                                {{$post->category_name}}
                            </td>
                            <td>
                                {{$post->user_name}}
                            </td>
                            <td>
                                <div>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xoá bài viết này không?')" class="btn btn-sm btn-danger" 
                                    href="">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection