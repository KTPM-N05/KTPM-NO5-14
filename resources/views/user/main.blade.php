<!DOCTYPE html>
<html lang="vi">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro - Mẫu Giao Diện Thương Mại Điện Tử HTML</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partials.headerlogin')

    <!-- Thêm section content vào đây -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card" style="margin: 20px 0; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <div class="card-header" style="background: #cec3c4; color: white; padding: 15px;">
                            <h4>Thông tin cá nhân</h4>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label>Họ và tên</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                                </div>

                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                                </div>



                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label>Mật khẩu mới (để trống nếu không muốn thay đổi)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <button type="submit" class="primary-btn" style="background: #D10024; color: white; border: none; padding: 10px 20px; border-radius: 4px;">
                                    Cập nhật thông tin
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- footer --}}
    @include('partials.footerlogin')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
</body>

</html>
