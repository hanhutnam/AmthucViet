@extends('page.layout')

@section('function')

@endsection

@section('content')

<div class="contact1"> 
	@if (session('success'))
    <div class="alert alert-success " role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container-contact1">

        <div class="contact1-pic js-tilt" data-tilt>
            <img src="image/img-01.png" alt="IMG">
        </div>

        <form class="contact1-form" action="{{route('page.postcontact')}}" method="post">
			@csrf
            <span class="contact1-form-title">
                Liên hệ
            </span>

            <div class="wrap-input1"  >
                <input class="input1" type="text" name="name" placeholder="Tên của bạn">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" >
                <input class="input1" type="text" name="email" placeholder="Email">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1" >
                <input class="input1" type="text" name="sub" placeholder="Tiêu đề">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1" >
                <textarea class="input1" type="text" name="content" placeholder="Nội dung"></textarea>
                <span class="shadow-input1"></span>
            </div>

            <div class="container-contact1-form-btn">
                <button type="submit"class="contact1-form-btn"  >
                    <span>
                        Gửi
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
$('.js-tilt').tilt({
    scale: 1.1
})
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
<script src="js/main.js"></script>

<script>
$("div.alert").delay(2000).slideUp();
</script>
@endsection