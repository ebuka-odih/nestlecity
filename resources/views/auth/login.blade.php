
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Nestlecity Bank </title>
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- External Css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.css') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/main.css') }}">

    <!--My Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/mine.css') }}">

    <!--My Custom Css -->
    <a href="dashboard/international_transfer.html"></a>
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.min.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700%7COpen+Sans" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Expletus+Sans" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="images/logooo.png">
    <link rel="stylesheet" href="{{ asset('front/css/animations.css') }}">
    <link href="sweetalert-js/sweetalert.html" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="sweetalert-js/sweetalert.min.html"></script>
    <script type="text/javascript" src="sweetalert-js/sweetalert-2.html"></script>

    <style type="text/css">

        .navbar-flexo .navbar-collapse{
            background: white !important;
        }
        .navbar-flexo .navbar-collapse .navbar-nav li.dropdown::before{
            color: #336699 !important;
        }

    </style>
    <link href="{{ asset('front/dashboard/dash_style.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body style=" overflow-x: hidden;">

<body style=" overflow-x: hidden;">


<div class="container-fluid" style=" padding-right:0px; padding-left:0px;">

    @include('pages.layouts.header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center my_heading">
                <h3 style=" color:white;">Sign In</h3>
            </div>
        </div>
    </div>

    <!-- Image Content -->
    <div class="section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div>
                        <h6 class="accordion-title">Online Realtime Balances and Transactions</h6>
                        <p>Please type your email and enter your password.              </p>

                        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 10px;">
                                <div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">
								  	<i class="glyphicon glyphicon-user" style="color:#336699;"></i>								  </span>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Login ID" required aria-describedby="basic-addon1" id="ouser">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>


                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                                <div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">
								  	<i class="glyphicon glyphicon-asterisk" style="color:#336699;"></i>								  </span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required aria-describedby="basic-addon1" id="opass">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                                <button type="submit" name="submit" class="button button-4x covered_but text_white" style="background-color:#336699;">Login</button>
                            </div>
                        </form>


                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 5px;">
                            <a href="{{ route('register') }}" >New Here? Enroll</a>							</div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#336699;">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel" style="color:white;">Reset Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12" id="showData">
                                                Please enter your email below to reset password										</div>
                                            <div style="color:#336699; " class="col-md-12 col-sm-12" id="result">										</div>
                                            <div class="col-md-12 col-sm-12" id="showData">
                                                <div class="input-group">
											  <span class="input-group-addon" id="basic-addon1">
												<i class="glyphicon glyphicon-envelope" style="color:#336699;"></i>											  </span>
                                                    <input type="email" id="re_email" required name="email" class="form-control" placeholder="Enter Email Address" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onClick="sendMail()">Send Mail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Footer -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright">
                        <p> <a href="#">Nestlecity Bank Bank </a> © 2021. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="privacy text-right">
                        <ul>

                            <li><a href="risk-disclosure.php">Risk Disclosure </a> | <a href="terms-and-conditions.php">Terms & Conditions </a> | <a href="privacy-policy.php">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/assets/js/visible.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<!--<script src="js/mine.js"></script>-->
<script src="{{ asset('front/js/wow.min.js') }}"></script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

</body>
</html>
</body>
</html>
