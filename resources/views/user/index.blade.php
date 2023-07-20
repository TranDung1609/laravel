@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-9" style="margin-top: 30px;">
                    @if(isset($world))
                        <a class="nav-link active" href="{{ route('post.show', $world->id) }}">
                            <img src="{{ asset('/posts/' . "$world->image") }}" width="100%" height="300px" alt="">
                            <h2>{{ $world->title }}</h2>
                        </a>
                    @endif
                    <hr>
                    <div class="row">
                        <h4>CHUYỂN NHƯỢNG</h4>
                        @if(isset($transfer))
                            @foreach ($transfer as $item)
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
                </div>
                <div style="margin-top: 10px;" class="col-sm-3">
                    <hr>
                    <h4>TIN HÓT</h4>
                    @if(isset($hot))
                        <a class="nav-link active" href="{{ route('post.show', $hot->id) }}">
                            <img src="{{ asset('/posts/' . "$hot->image") }}" width="100%" height="100px" alt="">
                            {{ $hot->title }}
                        </a>
                        <hr style="margin-top: 0px">

                        @foreach ($hots as $item)
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                {{ $item->title }}
                            </a>
                            <hr style="margin-top: 0px">
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>BÓNG ĐÁ QUỐC TẾ</h4>
                @if(isset($world))
                    <div class="col-sm-8">
                        <a class="nav-link active" href="{{ route('post.show', $world->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$world->image") }}" width="250px" height="150px"
                                     alt="">
                                <div style="margin-left: 20px;">
                                    <h4>
                                        {{ $world->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <hr>
                        @foreach ($titlesWorld as $item)
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
                @endif
            </div>
            <hr>
            <div class="row">
                <h4>BÓNG ĐÁ VIỆT NAM</h4>
                @if(isset($vietnam))
                    <div class="col-sm-8">
                        <a class="nav-link active" href="{{ route('post.show', $vietnam->id) }}">
                            <div class="d-flex">
                                <img src="{{ asset('/posts/' . "$vietnam->image") }}" width="250px" height="150px"
                                     alt="">
                                <div style="margin-left: 20px;">
                                    <h4>{{ $vietnam->title }}</h4>
                                </div>
                            </div>
                        </a>
                        <hr>
                        @foreach ($titlesVietnam as $item)
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                            <hr>
                        @endforeach
                    </div>
                    <div class="col-sm-4">
                        @foreach ($vietnams as $item)
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
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>Ô TÔ - XE MÁY</h4>
                    @if(isset($car))
                        <a class="nav-link active" href="{{ route('post.show', $car->id) }}">
                            <img src="{{ asset('/posts/' . "$car->image") }}" width="100%" height="200px" alt="">
                            <h4>{{ $car->title }}</h4>
                        </a>
                        <hr>
                        @foreach ($cars as $item)
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
                    @endif
                </div>
                <div class="col">
                    <h4>NHÂN VẬT - SỰ KIỆN</h4>
                    @if(isset($person))
                        <a class="nav-link active" href="{{ route('post.show', $person->id) }}">
                            <img src="{{ asset('/posts/' . "$person->image") }}" width="100%" height="200px" alt="">
                            <h4>{{ $person->title }}</h4>
                        </a>
                        <hr>
                        @foreach ($people as $item)
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
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="margin-top: 20px;">
            <hr>
            <h4>TIN MỚI NHẤT</h4>
            @if(isset($new))
                <a class="nav-link active" href="{{ route('post.show', $new->id) }}">
                    <img src="{{ asset('/posts/' . "$new->image") }}" width="100%" alt="">
                    <h5>{{ $new->title }}</h5>
                </a>
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
            @endif
            <hr>
            <h4>TIÊU ĐIỂM</h4>
            <div class="row">
                @if(isset($focus))
                    @foreach ($focus as $item)
                        <div class="col-sm-6">
                            <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px" alt="">
                                {{ $item->title }}
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
