<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <!-- <link rel="icon" type="image/png" href="/> -->

<link rel="stylesheet" type="text/css" href="theme/login/js/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="theme/login/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="theme/login/animate.css">

<link rel="stylesheet" type="text/css" href="theme/login/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="theme/login/select2.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">



 <link rel="stylesheet" type="text/css" href="theme/login/util.css">
<link rel="stylesheet" type="text/css" href="theme/login/main.css">
<script src="https://kit.fontawesome.com/b396177323.js" crossorigin="anonymous"></script>
</head>
<body class="login">
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<div class="login100-pic js-tilt" data-tilt>
  <img  src="theme/login/anaslogo3.png" alt="IMG" style=" width: 100%;
  height: auto; position: RELATIVE;
   top: 0;
   LEFT: 0;
   
   " >
   
   

</div>

<script type="text/javascript">
    function validateForm() {
        var x = document.forms["myForm"]["username"].value;
        if (x == "") {
            alert("Username must be filled out");
            return false;
        }
        var y = document.forms["myForm"]["password"].value;
        if (y == "") {
            alert("Password must be filled out");
            return false;
        }
    }
</script>






   <form method="get" action="login1"   class="login100-form validate-form" onsubmit="return validateForm()" >
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    

<span class="login100-form-title">
Admin Login
</span>

<div class="wrap-input100 validate-input" data-validate="Username is required">

<input class="input100" name="username"   placeholder="User Name" >
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-user" aria-hidden="true"></i>
</span>
</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">

<input class="input100" type="password" name="password"  placeholder="Password" >
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock" aria-hidden="true"></i>
</span>
</div>
<div  class="container-login100-form-btn">
<button  class="login100-form-btn" type="submit">
Login
</button>
</div>

<div class="text-center p-t-136">
<a class="txt2" href="#">

</a>
</div>
</form>
</div>
</div>
</div>

<script src="theme/login/jquery-3.2.1.min.js"></script>

<script src="theme/login/js/popper.js"></script>
<script src="theme/login/js/bootstrap.min.js"></script>

<script src="theme/login/js/select2.min.js"></script>

<script src="theme/login/js/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

<script async src="theme/login/js/23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script src="theme/login/js/main.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>


</body>
</html>
