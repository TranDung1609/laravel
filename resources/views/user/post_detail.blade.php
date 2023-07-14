@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <nav style="margin-top: 10px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home.index') }}">TRANG CHỦ</a>
                    </li>
                    @foreach ($posts as $post)
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $post->category->name }}
                        </li>
                    @endforeach

                </ol>
            </nav>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h3>TIN NÓNG</h3>
                    @foreach ($hot as $item)
                        <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                            <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px" alt="">
                            <h6>
                                {{ $item->title }}
                            </h6>
                        </a>
                    @endforeach
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
                    @foreach ($posts as $post)
                        <h2>{{ $post->title }}</h2>
                        <div class="time_comment" style="text-align: right;">
                            <span>{{ $post->updated_at }}</span>
                        </div>


                        <p>{!! $post->content !!} </p>

                        <div style="text-align: right;">
                            <strong>Tác giả:</strong>
                            {{ $post->user->name }}
                        </div>
                    @endforeach
                    <?php var_dump($post->id); ?>
                    <hr>

                    <h4>Ý KIẾN CỦA BẠN</h4>
                    <?php
                        if(!isset(auth()->user()->name)){
                    ?>
                    <div class="comment">
                        <!-- <textarea name="comment" id="" cols="100%" rows="3" placeholder="Ý kiến của bạn"></textarea> -->
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input class="form-control" type="comment" placeholder="Ý kiến của bạn">
                        <br>
                        <button onclick="return confirm('Vui lòng đăng nhập để bình luận!')" class="btn btn-outline-primary"
                            type="submit">Gửi</button>
                    </div>
                    <?php }else{ ?>
                    <div class="comment">
                        <form action="{{ route('send.comment') }}" method="POST">
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

                    <br>
                    <h4>TẤT CẢ Ý KIẾN</h4>
                    <div class="content-comment">
                        @foreach ($comments as $item)
                            <p>
                                <span class="txt-name">
                                    <a class="nav-link nickname" >
                                        <b>{{ $item->user->name }} : </b> {{ $item->comment }}
                                    </a>
                                </span>
                            </p>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <h2>BÀI VIẾT CÙNG CHUYÊN MỤC</h2>
                        @foreach ($postCategory as $item)
                            <div class="col-sm-4">
                                <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                                    <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" height="100px"
                                        alt="">
                                    <h6>{{ $item->title }}</h6>

                                </a>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{-- <div class="row">
                            <div class="col-sm-6">
                                <a class="nav-link active" href="">
                                    Điên rồ Premier League 2023/24
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    NÓNG! Vụ Rabiot đến Man Utd xem như ngã ngũ
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Canh bạc 12 triệu euro của Juve
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Olympique Marseille - Mục tiêu tại Ligue 1 và Champions League 2023 - 2024
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Sau Timber, người ‘Hà Lan bay’ khiến M.U - Arsenal phải đối đầu
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a class="nav-link active" href="">
                                    Hé lộ mức lương khủng vượt Quang Hải của Filip Nguyễn ở CAHN
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Newcastle tranh tiền vệ cực chất với Arsenal
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Caicedo chơi hay là cái tát cho Man Utd
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Inter Miami ấn định ngày ra mắt Messi và Busquets
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Ben Jacobs: Quỷ đỏ cân nhắc bán Sancho
                                </a>
                            </div>
                        </div> --}}
                    {{-- <hr>
                        <div class="row">
                            <h2>BÀI VIẾT TRƯỚC ĐÓ</h2>
                            <div class="col-sm-4">
                                <a class="nav-link active" href="">
                                    <img src="images/img36.jpg" width="100%" height="100px" alt="">
                                    <h6>"Tình thế của Man United giống như một quân cờ domino"</h6>

                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a class="nav-link active" href="">
                                    <img src="images/img37.jpg" width="100%" alt="">
                                    <h6>Barcelona thâu tóm 'món hời' trên TTCN</h6>

                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a class="nav-link active" href="">
                                    <img src="images/img38.jpg" width="100%" alt="">
                                    <h6>Paul Brown: Nếu Arsenal có Rice, cậu ta sẽ trở thành người thừa</h6>

                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="nav-link active" href="">
                                    Neymar hưởng lợi khi Mbappe rời PSG
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Ibra phá vỡ im lặng về bom tấn Premier League
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Man Utd chốt mức lương khủng cho Andre Onana
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    "Thật đáng sợ. Tôi thực sự nghĩ rằng tôi sẽ chết"
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    "Rice sẽ cập bến Arsenal"
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a class="nav-link active" href="">
                                    Tottenham chuẩn bị đề nghị đầu tiên mua Maddison
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Declan Rice có quyết định về việc gia nhập Arsenal hay Man City
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Arsenal đồng ý thỏa thuận cá nhân với Jurrien Timber
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    Hoàn tất kiểm tra y tế, tân binh lần đầu lộ diện với áo đấu Arsenal
                                </a>
                                <hr>
                                <a class="nav-link active" href="">
                                    CHÍNH THỨC! CLB Premier League chiêu mộ ngọc quý Hàn Quốc
                                </a>
                            </div>
                        </div> --}}
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <hr style="margin-top: 30px;">
            <h3>TIN MỚI NHẤT</h3>
            @foreach ($new as $item)
                <a class="nav-link active" href="{{ route('post.show', $item->id) }}">
                    <img src="{{ asset('/posts/' . "$item->image") }}" width="100%" alt="">
                    <h6>
                        {{ $item->title }}
                    </h6>
                </a>
            @endforeach
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
