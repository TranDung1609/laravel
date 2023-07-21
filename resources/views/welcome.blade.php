<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('../login/style.css') }}">
    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="menu">
        <nav class="navbar navbar-expand-lg bg-info" data-bs-theme="info">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home.index') }}">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a style="margin-left: 0px" class="nav-link active" aria-current="page"
                                   href="{{ route('category.show', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                    <?php
                    if (!isset(auth()->user()->name)){

                        ?>
                    <button style="margin-left: 10px;" class="btn btn-outline-dark open-modal-btn"
                            data-bs-toggle="modal" data-bs-target="#login">Login
                    </button>
                        <?php
                    }else{

                        ?>
                    <form action="{{ route('logout.user') }}" method="POST">
                        @csrf
                        <button style="margin-left: 10px;"
                                class="btn btn-outline-dark open-modal-btn">Logout
                        </button>
                    </form>
                    <span style="margin-left: 10px;" class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                        <?php
                    }

                    ?>

                    {{-- <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ auth()->User()->name }}</span>

                    </div> --}}

                </div>
            </div>
        </nav>
    </div>
    <!-- The Modal -->
    <div>
        <div class="modal" id="login">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button style="margin-left: 150px;" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#register">Register
                        </button>
                        <button style="margin-left: 10px;" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#login">Login
                        </button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4>Login</h4>
                        <div class="row">
                            <form role="form" action="{{ route('login.user') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="Enter your email"/>
                                        </div>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                           for="basic-default-phone">PassWord</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" class="form-control" name="password"
                                               aria-describedby="password" placeholder="Password"/>
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                    <div><a href="#mail" data-bs-toggle="modal">Forgot password ?</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="register">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button style="margin-left: 150px;" class="btn btn-primary">Register</button>
                        <button style="margin-left: 10px;" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#login">Login
                        </button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4>Register</h4>
                        <div class="row">
                            <form role="form" action="{{ route('register.user') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" value="3" id="name" name="role_id"
                                       placeholder="Enter your name" autofocus hidden=""/>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter your name" autofocus/>
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" id="email"
                                                   name="email" placeholder="Enter your email"/>
                                        </div>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                           for="basic-default-phone">PassWord</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" class="form-control"
                                               name="password" aria-describedby="password" placeholder="Password"/>
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="mail">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button style="margin-left: 150px;" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#register">Register
                        </button>
                        <button style="margin-left: 10px;" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#login">Login
                        </button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4>Forgot Password ?</h4>
                        <div class="row">
                            <form role="form" action="{{route('send.mail')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="Enter your email"/>
                                        </div>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
            <?php
            //  var_dump(auth()->user());
            ?>
        @if(session('message'))
            <div class="alert alert-{{session('type')}}">
                {{session('message')}}
            </div>
        @else
            @error('message')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        @endif
        @yield('content')

    </div>
    <hr>
    <div class="footer" style="margin-top: 20px;">
        <div class="info_logo text-center">
            <a href="" class="">
                <img src="{{ asset('../public/assets/img/avatars/logo.png') }}" height="55px" alt="">
            </a>
        </div>
        <div class="row">
            <div class="left_info_footer col-sm-6">
                <p>
                    Giấy phép: Số 15/GP-TTĐT của Bộ Thông tin - Truyền thông ngày 29/01/2010 và GP số 56/GP-STTTT
                    của Sở Thông tin và Truyền thông TP. Hồ Chí Minh cấp ngày 03/09/2021.
                    <br>
                    Chịu trách nhiệm nội dung: TS. Võ Danh Hải.
                    <br>
                    Cấm sao chép dưới mọi hình thức nếu không có sự chấp thuận bằng văn bản.
                    <br>
                    Vận hành và phát triển bởi Công ty Cổ phần Yêu Thể Thao.
                </p>
            </div>
            <div class="right_info_footer col-sm-6">
                <p>
                        <span>
                            <i class="fa fa-map-marker " aria-hidden="true"></i>
                            <strong>Địa chỉ:</strong>
                            02 Đinh Tiên Hoàng, P.Đa Kao, Q.1, TP.HCM.
                        </span>
                </p>
                <p>
                        <span>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <strong>Điện thoại:</strong> +84 97 218 96 65
                        </span>
                    <span>
                            <i class="fa fa-fax" aria-hidden="true"></i>
                            <strong>Tax:</strong> 09874563211
                        </span>
                </p>
                <p>
                        <span>
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <strong>Quảng cáo:</strong> 0123654789
                        </span>
                    <span>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <strong>Liên hệ quảng cáo:</strong>
                            quangcao@bongda.com.vn
                        </span>
                </p>
            </div>

        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="{{ asset('../login/app.js') }}"></script>


</body>

</html>
