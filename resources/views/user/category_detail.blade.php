@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <nav style="margin-top: 10px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home.index') }}">TRANG CHỦ</a>
                    </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h3>TIN NÓNG</h3>
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
                    <hr style="margin-top: 30px;">
                    <h3>TIÊU ĐIỂM</h3>
                    @foreach ($focus as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="" alt="">
                            <h6>
                                {{ $item->title }}
                            </h6>
                        </a>
                        <hr style="margin-top: 0px">
                    @endforeach
                </div>
                <div class="col-sm-9">
                    @foreach ($postCategory as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="180px" alt="">
                                <div style="margin-left: 20px;">
                                    <h4>
                                        {{ $item->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <hr style="margin-top: 30px;">
            <h3>TIN MỚI NHẤT</h3>
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
        </div>
    </div>
@endsection
