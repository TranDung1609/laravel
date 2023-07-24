@extends('dashboard')
@section('admin_content')
    <div class="main-content">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Comment</h4>
        <x-auth-session-status class="mb-4" :status="session('message')"/>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Comment</h5>
            <div class="">
                <table id="table_id" class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $i = 1;
                    foreach ($comments as $comment){
                        ?>
                    <tr>
                        <td>{{$i++ }}</td>
                        <td>{{$comment->user->name}} </td>
                        <td style="width: 30%">{{$comment->post->title}}</td>
                        <td style="width: 30%">{{$comment->comment}}</td>
                        <td>
                            <div>
                                <a onclick="return confirm('Bạn có muốn rollback category này không?')"
                                   class="btn btn-sm btn-danger"
                                   href="{{ route('comment.rollback', $comment->id) }}">
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
