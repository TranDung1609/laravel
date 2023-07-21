@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <nav style="margin-top: 10px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home.index') }}">TRANG
                            CHỦ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $post->category->name }}
                    </li>
                </ol>
            </nav>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h3>TIN NÓNG</h3>
                    @if(isset($hot))
                        <a class="nav-link active" href="{{ route('post.show', $hot->id) }}">
                            <img src="{{ asset('/posts/' . "$hot->image") }}" width="100%" height="100px" alt="">
                            <h6>
                                {{ $hot->title }}
                            </h6>
                        </a>
                        @foreach ($hots as $item)
                            <hr style="margin-top: 0px">
                            <h6>
                                <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                    {{ $item->title }}
                                </a>
                            </h6>
                        @endforeach
                    @endif
                    <hr style="margin-top: 30px;">
                    <h3>TIÊU ĐIỂM</h3>
                    @if(isset($focus))
                        @foreach ($focus as $item)
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="" alt="">
                                <h6>
                                    {{ $item->title }}
                                </h6>
                            </a>
                            <hr style="margin-top: 0px">
                        @endforeach
                    @endif
                </div>

                <div class="col-sm-9">

                    <h2>{{ $post->title }}</h2>
                    <div class="time_comment" style="text-align: right;">
                        <span>{{ $post->updated_at }}</span>
                    </div>


                    <p>{!! $post->content !!} </p>

                    <div style="text-align: right;">
                        <strong>Tác giả:</strong>
                        {{ $post->user->name }}
                    </div>


                    <hr>

                    <h4>Ý KIẾN CỦA BẠN</h4>
                    @can('create-comment')
                            <?php
                        if (!isset(auth()->user()->name)){
                            ?>
                        <div class="comment">
                            <!-- <textarea name="comment" id="" cols="100%" rows="3" placeholder="Ý kiến của bạn"></textarea> -->
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input class="form-control" type="comment" placeholder="Ý kiến của bạn">
                            <br>
                            <button onclick="return confirm('Vui lòng đăng nhập để bình luận!')"
                                    class="btn btn-outline-primary"
                                    type="submit">Gửi
                            </button>
                        </div>
                        <?php }else{ ?>
                        <div class="comment">
                            <form action="{{route('send.comment')}}" method="POST">
                                @csrf
                                <!-- <textarea name="comment" id="" cols="100%" rows="3" placeholder="Ý kiến của bạn"></textarea> -->
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input class="form-control" name="comment" type="comment" placeholder="Ý kiến của bạn">
                                @error('comment')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <br>
                                <button class="btn btn-outline-primary" type="submit">Gửi</button>
                            </form>
                        </div>
                            <?php } ?>
                    @endcan
                    <br>
                    <h4>TẤT CẢ Ý KIẾN</h4>
                    <div class="content-comment">
                        @foreach ($comments as $item)
                            <div class="comment">
                                <p>
                                <span class="txt-name">
                                    <a class="nav-link nickname">
                                        <b>{{ $item->user->name }} : </b> {{ $item->comment }}
                                    </a>
                                    @can('delete-comment',$item)
                                        <a onclick="return confirm('Bạn có muốn xoá category này không?')"
                                           class="btn btn-sm btn-danger"
                                           href="{{ route('comment.delete', $item->id) }}">
                                            <i class="bx bx-trash me-1"></i> Delete</a>
                                    @endcan
                                </span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <hr>
                    {{--                     Your comment form --}}
                    <form id="comment-form">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="user_name" value="{{ auth()->user()->name}}">
                        <input class="form-control" name="comment" placeholder="Ý kiến của bạn">
                        <br>
                        <button class="btn btn-outline-primary" type="submit">Submit Comment</button>
                    </form>

                    {{--                     Display existing comments --}}
                    <div id="comments-container">
                        @foreach($comments as $comment)
                            <div class="comment">
                                    <span class="txt-name">
                                        <a class="nav-link nickname">
                                            <b>{{ $comment->user->name }} : </b> {{ $comment->comment }}
                                        </a>
                                        @can('delete-comment',$item)
                                            <a onclick="return confirm('Bạn có muốn xoá category này không?')"
                                               class="btn btn-sm btn-danger"
                                               href="{{ route('comment.delete', $comment->id) }}">
                                            <i class="bx bx-trash me-1"></i> Delete</a>
                                        @endcan
                                    </span>
                            </div>
                        @endforeach
                    </div>

                    <hr>
                    <div class="row">
                        <h2>BÀI VIẾT CÙNG CHUYÊN MỤC</h2>
                        @if(isset($postCategory))
                            @foreach ($postCategory as $item)
                                <div class="col-sm-4">
                                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                        <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px"
                                             alt="">
                                        <h6>{{ $item->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <hr style="margin-top: 30px;">
            <h3>TIN MỚI NHẤT</h3>
            @if(isset($new))
                <a class="nav-link active" href="{{ route('post.show', $new->id) }}">
                    <img src="{{ asset('/posts/' . "$new->image") }}" width="100%" alt="">
                    <h6>
                        {{ $new->title }}
                    </h6>
                </a>
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-sm-6 ">
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="80px"
                                     alt="">
                                {{ $item->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#comment-form').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('send.comment') }}',
                    data: formData,
                    success: function (data) {
                        $('#comments-container').append(
                             '<div class="comment"> ' +
                            '<b>' + data.comment.user_name + ': </b>' + data.comment.comment +
                           ' </div>'
                        );
                        $('#comment-form')[0].reset();
                    },
                    error: function (data) {
                        alert('Error adding comment.');
                    }
                });
            });
        });
    </script>
@endsection
