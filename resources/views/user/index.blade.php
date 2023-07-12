@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-9" style="margin-top: 30px;">
                    @foreach ($world as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="300px" alt="">
                            <h2>{{ $item->title }}</h2>
                        </a>
                    @endforeach
                    <hr>
                    <div class="row">
                        <h4>CHUYỂN NHƯỢNG</h4>
                        @foreach ($transfer as $item)
                        <div class="col-sm-4">
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px" alt="">
                                <h6>{{ $item->title }}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div style="margin-top: 10px;" class="col-sm-3">
                    <hr>
                    <h4>TIN HÓT</h4>
                    @foreach ($hot as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px" alt="">
                        {{ $item->title }}
                    </a>
                    <hr style="margin-top: 0px">
                    @endforeach
                    @foreach ($hots as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        {{ $item->title }}
                    </a>
                    <hr style="margin-top: 0px">
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>BÓNG ĐÁ QUỐC TẾ</h4>
                <div class="col-sm-8">
                    @foreach ($world as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="250px" height="150px"
                                    alt="">
                                <div style="margin-left: 20px;">
                                    <h4>
                                        {{ $item->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <hr>
                    @foreach ($titleWorld as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                        <hr>
                    @endforeach
                </div>
                <div class="col-sm-4">
                    @foreach ($worlds as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="70px" height="50px"
                                    alt="">
                                <div style="margin-left: 10px;">
                                    <p>{{ $item->title }}</p>
                                </div>
                            </div>
                        </a>
                        <hr style="margin-top: 0px">
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>BÓNG ĐÁ VIỆT NAM</h4>
                <div class="col-sm-8">
                    @foreach ($vietnam as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="250px" height="150px" alt="">
                                <div style="margin-left: 20px;">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <hr>
                    @foreach ($titleVietnam as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                    <hr>
                    @endforeach
                </div>
                <div class="col-sm-4">
                    @foreach ($vietnams as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <div class="d-flex">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="70px" height="50px" alt="">
                            <div style="margin-left: 10px;">
                                <p>{{ $item->title }}</p>
                            </div>
                        </div>
                    </a>
                    <hr style="margin-top: 0px">
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>Ô TÔ - XE MÁY</h4>
                    @foreach ($car as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="200px" alt="">
                        <h4>{{ $item->title }}</h4>
                    </a>
                    <hr>
                    @endforeach
                    @foreach ($cars as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <div class="d-flex">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="70px" height="50px" alt="">
                            <div style="margin-left: 10px;">
                                <p>{{ $item->title }}</p>
                            </div>
                        </div>
                    </a>
                    <hr style="margin-top: 0px">
                    @endforeach
                </div>
                <div class="col">
                    <h4>NHÂN VẬT - SỰ KIỆN</h4>
                    @foreach ($person as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="200px" alt="">
                        <h4>{{ $item->title }}</h4>
                    </a>
                    <hr>
                    @endforeach
                    @foreach ($people as $item)
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <div class="d-flex">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="70px" height="50px" alt="">
                            <div style="margin-left: 10px;">
                                <p>{{ $item->title }}</p>
                            </div>
                        </div>
                    </a>
                    <hr style="margin-top: 0px">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top: 20px;">
            <hr>
            <h4>TIN MỚI NHẤT</h4>
            @foreach ($new as $item)
                <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                    <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" alt="">
                    <h5>{{ $item->title }}</h5>
                </a>
            @endforeach

            <div class="row">
                @foreach ($news as $item)
                    <div class="col-sm-6 ">
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px"
                                alt="">
                            {{ $item->title }}
                        </a>
                    </div>
                @endforeach
            </div>
            
            <hr>
            <h4>TIÊU ĐIỂM</h4>
            <div class="row">
                @foreach ($focus as $item)
                <div class="col-sm-6">
                    <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                        <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px" alt="">
                        {{ $item->title }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
