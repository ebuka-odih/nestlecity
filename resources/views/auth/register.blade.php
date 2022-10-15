<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Nestlecity Bank </title>
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


<div class="container-fluid" style=" padding-right:0px; padding-left:0px;">

    @include('pages.layouts.header')
    <div class="container-fluid">
        <div  class="row">
            <div class="col-md-12 text-center my_heading">
                <h3 style=" color:white;">Registration</h3>
            </div>
        </div>
    </div>

    <!-- Image Content -->
    <div class="section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div>
                        <h6 class="accordion-title">Internet Banking Sign-Up</h6>
                        Kindly provide the required details below to receive your Internet Banking login details via Email.
                        <br>
                        <span style="color:#FF0000;"></span>
                        <div class="col-xs-12 col-sm-12 col-lg-12" style="margin-top: 10px;">
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" >
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

                                <div class="col-xs-12 col-sm-12 col-lg-12" style="margin-top: 10px;">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">First Name</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-user" style="color:#2196F3;"></i>                                      </span>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Last Name</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-user" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" value="" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Nationality</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-globe" style="color:#2196F3;"></i>
                                          </span>
                                        <select  name="country" id="nationality" style="border:#D3CACA solid 1px; border-radius:0px;"  class="form-control">
                                            <option value="" disabled selected>--Select Country--</option>
                                            <option style="font-family: Montserrat, sans-serif;">Afghanistan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Albania</option>
                                            <option style="font-family: Montserrat, sans-serif;">Algeria</option>
                                            <option style="font-family: Montserrat, sans-serif;">American Samoa</option>
                                            <option style="font-family: Montserrat, sans-serif;">Andorra</option>
                                            <option style="font-family: Montserrat, sans-serif;">Angola</option>
                                            <option style="font-family: Montserrat, sans-serif;">Anguilla</option>
                                            <option style="font-family: Montserrat, sans-serif;">Antarctica</option>
                                            <option style="font-family: Montserrat, sans-serif;">Antigua and Barbuda</option>
                                            <option style="font-family: Montserrat, sans-serif;">Argentina</option>
                                            <option style="font-family: Montserrat, sans-serif;">Armenia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Aruba</option>
                                            <option style="font-family: Montserrat, sans-serif;">Australia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Austria</option>
                                            <option style="font-family: Montserrat, sans-serif;">Azerbaijan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bahamas</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bahrain</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bangladesh</option>
                                            <option style="font-family: Montserrat, sans-serif;">Barbados</option>
                                            <option style="font-family: Montserrat, sans-serif;">Belarus</option>
                                            <option style="font-family: Montserrat, sans-serif;">Belgium</option>
                                            <option style="font-family: Montserrat, sans-serif;">Belize</option>
                                            <option style="font-family: Montserrat, sans-serif;">Benin</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bermuda</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bhutan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bolivia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bosnia and Herzegowina</option>
                                            <option style="font-family: Montserrat, sans-serif;">Botswana</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bouvet Island</option>
                                            <option style="font-family: Montserrat, sans-serif;">Brazil</option>
                                            <option style="font-family: Montserrat, sans-serif;">British Indian Ocean Territory</option>
                                            <option style="font-family: Montserrat, sans-serif;">Brunei Darussalam</option>
                                            <option style="font-family: Montserrat, sans-serif;">Bulgaria</option>
                                            <option style="font-family: Montserrat, sans-serif;">Burkina Faso</option>
                                            <option style="font-family: Montserrat, sans-serif;">Burundi</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cambodia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cameroon</option>
                                            <option style="font-family: Montserrat, sans-serif;">Canada</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cape Verde</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cayman Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Central African Republic</option>
                                            <option style="font-family: Montserrat, sans-serif;">Chad</option>
                                            <option style="font-family: Montserrat, sans-serif;">Chile</option>
                                            <option style="font-family: Montserrat, sans-serif;">China</option>
                                            <option style="font-family: Montserrat, sans-serif;">Christmas Island</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cocos (Keeling) Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Colombia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Comoros</option>
                                            <option style="font-family: Montserrat, sans-serif;">Congo</option>
                                            <option style="font-family: Montserrat, sans-serif;">Congo, the Democratic Republic of the</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cook Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Costa Rica</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cote d'Ivoire</option>
                                            <option style="font-family: Montserrat, sans-serif;">Croatia (Hrvatska)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cuba</option>
                                            <option style="font-family: Montserrat, sans-serif;">Cyprus</option>
                                            <option style="font-family: Montserrat, sans-serif;">Czech Republic</option>
                                            <option style="font-family: Montserrat, sans-serif;">Denmark</option>
                                            <option style="font-family: Montserrat, sans-serif;">Djibouti</option>
                                            <option style="font-family: Montserrat, sans-serif;">Dominica</option>
                                            <option style="font-family: Montserrat, sans-serif;">Dominican Republic</option>
                                            <option style="font-family: Montserrat, sans-serif;">East Timor</option>
                                            <option style="font-family: Montserrat, sans-serif;">Ecuador</option>
                                            <option style="font-family: Montserrat, sans-serif;">Egypt</option>
                                            <option style="font-family: Montserrat, sans-serif;">El Salvador</option>
                                            <option style="font-family: Montserrat, sans-serif;">Equatorial Guinea</option>
                                            <option style="font-family: Montserrat, sans-serif;">Eritrea</option>
                                            <option style="font-family: Montserrat, sans-serif;">Estonia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Ethiopia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Falkland Islands (Malvinas)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Faroe Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Fiji</option>
                                            <option style="font-family: Montserrat, sans-serif;">Finland</option>
                                            <option style="font-family: Montserrat, sans-serif;">France</option>
                                            <option style="font-family: Montserrat, sans-serif;">France, Metropolitan</option>
                                            <option style="font-family: Montserrat, sans-serif;">French Guiana</option>
                                            <option style="font-family: Montserrat, sans-serif;">French Polynesia</option>
                                            <option style="font-family: Montserrat, sans-serif;">French Southern Territories</option>
                                            <option style="font-family: Montserrat, sans-serif;">Gabon</option>
                                            <option style="font-family: Montserrat, sans-serif;">Gambia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Georgia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Germany</option>
                                            <option style="font-family: Montserrat, sans-serif;">Ghana</option>
                                            <option style="font-family: Montserrat, sans-serif;">Gibraltar</option>
                                            <option style="font-family: Montserrat, sans-serif;">Greece</option>
                                            <option style="font-family: Montserrat, sans-serif;">Greenland</option>
                                            <option style="font-family: Montserrat, sans-serif;">Grenada</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guadeloupe</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guam</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guatemala</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guinea</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guinea-Bissau</option>
                                            <option style="font-family: Montserrat, sans-serif;">Guyana</option>
                                            <option style="font-family: Montserrat, sans-serif;">Haiti</option>
                                            <option style="font-family: Montserrat, sans-serif;">Heard and Mc Donald Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Holy See (Vatican City State)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Honduras</option>
                                            <option style="font-family: Montserrat, sans-serif;">Hong Kong</option>
                                            <option style="font-family: Montserrat, sans-serif;">Hungary</option>
                                            <option style="font-family: Montserrat, sans-serif;">Iceland</option>
                                            <option style="font-family: Montserrat, sans-serif;">India</option>
                                            <option style="font-family: Montserrat, sans-serif;">Indonesia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Iran (Islamic Republic of)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Iraq</option>
                                            <option style="font-family: Montserrat, sans-serif;">Ireland</option>
                                            <option style="font-family: Montserrat, sans-serif;">Israel</option>
                                            <option style="font-family: Montserrat, sans-serif;">Italy</option>
                                            <option style="font-family: Montserrat, sans-serif;">Jamaica</option>
                                            <option style="font-family: Montserrat, sans-serif;">Japan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Jordan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Kazakhstan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Kenya</option>
                                            <option style="font-family: Montserrat, sans-serif;">Kiribati</option>
                                            <option style="font-family: Montserrat, sans-serif;">Korea, Democratic People's Republic of</option>
                                            <option style="font-family: Montserrat, sans-serif;">Korea, Republic of</option>
                                            <option style="font-family: Montserrat, sans-serif;">Kuwait</option>
                                            <option style="font-family: Montserrat, sans-serif;">Kyrgyzstan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Lao People's Democratic Republic</option>
                                            <option style="font-family: Montserrat, sans-serif;">Latvia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Lebanon</option>
                                            <option style="font-family: Montserrat, sans-serif;">Lesotho</option>
                                            <option style="font-family: Montserrat, sans-serif;">Liberia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Libyan Arab Jamahiriya</option>
                                            <option style="font-family: Montserrat, sans-serif;">Liechtenstein</option>
                                            <option style="font-family: Montserrat, sans-serif;">Lithuania</option>
                                            <option style="font-family: Montserrat, sans-serif;">Luxembourg</option>
                                            <option style="font-family: Montserrat, sans-serif;">Macau</option>
                                            <option style="font-family: Montserrat, sans-serif;">Macedonia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Madagascar</option>
                                            <option style="font-family: Montserrat, sans-serif;">Malawi</option>
                                            <option style="font-family: Montserrat, sans-serif;">Malaysia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Maldives</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mali</option>
                                            <option style="font-family: Montserrat, sans-serif;">Malta</option>
                                            <option style="font-family: Montserrat, sans-serif;">Marshall Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Martinique</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mauritania</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mauritius</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mayotte</option>

                                            <option style="font-family: Montserrat, sans-serif;">Micronesia, Federated States of</option>
                                            <option style="font-family: Montserrat, sans-serif;">Moldova, Republic of</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mexico</option><option style="font-family: Montserrat, sans-serif;">Monaco</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mongolia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Montserrat</option>
                                            <option style="font-family: Montserrat, sans-serif;">Morocco</option>
                                            <option style="font-family: Montserrat, sans-serif;">Mozambique</option>
                                            <option style="font-family: Montserrat, sans-serif;">Myanmar</option>
                                            <option style="font-family: Montserrat, sans-serif;">Namibia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Nauru</option>
                                            <option style="font-family: Montserrat, sans-serif;">Nepal</option>
                                            <option style="font-family: Montserrat, sans-serif;">Netherlands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Netherlands Antilles</option>
                                            <option style="font-family: Montserrat, sans-serif;">New Caledonia</option>
                                            <option style="font-family: Montserrat, sans-serif;">New Zealand</option>
                                            <option style="font-family: Montserrat, sans-serif;">Nicaragua</option>
                                            <option style="font-family: Montserrat, sans-serif;">Niger</option>
                                            <option style="font-family: Montserrat, sans-serif;">Nigeria</option>
                                            <option style="font-family: Montserrat, sans-serif;">Niue</option>
                                            <option style="font-family: Montserrat, sans-serif;">Norfolk Island</option>
                                            <option style="font-family: Montserrat, sans-serif;">Northern Mariana Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Norway</option>
                                            <option style="font-family: Montserrat, sans-serif;">Oman</option>
                                            <option style="font-family: Montserrat, sans-serif;">Pakistan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Palau</option>
                                            <option style="font-family: Montserrat, sans-serif;">Panama</option>
                                            <option style="font-family: Montserrat, sans-serif;">Papua New Guinea</option>
                                            <option style="font-family: Montserrat, sans-serif;">Paraguay</option>
                                            <option style="font-family: Montserrat, sans-serif;">Peru</option>
                                            <option style="font-family: Montserrat, sans-serif;">Philippines</option>
                                            <option style="font-family: Montserrat, sans-serif;">Pitcairn</option>
                                            <option style="font-family: Montserrat, sans-serif;">Poland</option>
                                            <option style="font-family: Montserrat, sans-serif;">Portugal</option>
                                            <option style="font-family: Montserrat, sans-serif;">Puerto Rico</option>
                                            <option style="font-family: Montserrat, sans-serif;">Qatar</option>
                                            <option style="font-family: Montserrat, sans-serif;">Reunion</option>
                                            <option style="font-family: Montserrat, sans-serif;">Romania</option>
                                            <option style="font-family: Montserrat, sans-serif;">Russian Federation</option>
                                            <option style="font-family: Montserrat, sans-serif;">Rwanda</option>
                                            <option style="font-family: Montserrat, sans-serif;">Saint Kitts and Nevis</option>
                                            <option style="font-family: Montserrat, sans-serif;">Saint LUCIA</option>
                                            <option style="font-family: Montserrat, sans-serif;">Saint Vincent and the Grenadines</option>
                                            <option style="font-family: Montserrat, sans-serif;">Samoa</option>
                                            <option style="font-family: Montserrat, sans-serif;">San Marino</option>
                                            <option style="font-family: Montserrat, sans-serif;">Sao Tome and Principe</option>
                                            <option style="font-family: Montserrat, sans-serif;">Saudi Arabia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Senegal</option>
                                            <option style="font-family: Montserrat, sans-serif;">Seychelles</option>
                                            <option style="font-family: Montserrat, sans-serif;">Sierra Leone</option>
                                            <option style="font-family: Montserrat, sans-serif;">Singapore</option>
                                            <option style="font-family: Montserrat, sans-serif;">Slovakia (Slovak Republic)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Slovenia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Solomon Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Somalia</option>
                                            <option style="font-family: Montserrat, sans-serif;">South Africa</option>
                                            <option style="font-family: Montserrat, sans-serif;">South Georgia and the South Sandwich Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Spain</option>
                                            <option style="font-family: Montserrat, sans-serif;">Sri Lanka</option>
                                            <option style="font-family: Montserrat, sans-serif;">St. Helena</option>
                                            <option style="font-family: Montserrat, sans-serif;">St. Pierre and Miquelon</option>
                                            <option style="font-family: Montserrat, sans-serif;">Sudan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Suriname</option>
                                            <option style="font-family: Montserrat, sans-serif;">Svalbard and Jan Mayen Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Swaziland</option>
                                            <option style="font-family: Montserrat, sans-serif;">Sweden</option>
                                            <option style="font-family: Montserrat, sans-serif;">Switzerland</option>
                                            <option style="font-family: Montserrat, sans-serif;">Syrian Arab Republic</option>
                                            <option style="font-family: Montserrat, sans-serif;">Taiwan, Province of China</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tajikistan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tanzania, United Republic of</option>
                                            <option style="font-family: Montserrat, sans-serif;">Thailand</option>
                                            <option style="font-family: Montserrat, sans-serif;">Togo</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tokelau</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tonga</option>
                                            <option style="font-family: Montserrat, sans-serif;">Trinidad and Tobago</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tunisia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Turkey</option>
                                            <option style="font-family: Montserrat, sans-serif;">Turkmenistan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Turks and Caicos Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Tuvalu</option>
                                            <option style="font-family: Montserrat, sans-serif;">Uganda</option>
                                            <option style="font-family: Montserrat, sans-serif;">Ukraine</option>
                                            <option style="font-family: Montserrat, sans-serif;">United Arab Emirates</option>
                                            <option style="font-family: Montserrat, sans-serif;">United Kingdom</option>
                                            <option style="font-family: Montserrat, sans-serif;">United States</option>
                                            <option style="font-family: Montserrat, sans-serif;">United States Minor Outlying Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Uruguay</option>
                                            <option style="font-family: Montserrat, sans-serif;">Uzbekistan</option>
                                            <option style="font-family: Montserrat, sans-serif;">Vanuatu</option>
                                            <option style="font-family: Montserrat, sans-serif;">Venezuela</option>
                                            <option style="font-family: Montserrat, sans-serif;">Viet Nam</option>
                                            <option style="font-family: Montserrat, sans-serif;">Virgin Islands (British)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Virgin Islands (U.S.)</option>
                                            <option style="font-family: Montserrat, sans-serif;">Wallis and Futuna Islands</option>
                                            <option style="font-family: Montserrat, sans-serif;">Western Sahara</option>
                                            <option style="font-family: Montserrat, sans-serif;">Yemen</option>
                                            <option style="font-family: Montserrat, sans-serif;">Yugoslavia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Zambia</option>
                                            <option style="font-family: Montserrat, sans-serif;">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Occupation</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-tags" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" required name="occupation" id="occupation" class="form-control" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Email</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-envelope" style="color:#2196F3;"></i>                                          </span>
                                        <input type="email" required id="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Address</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-map-marker" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" required name="address" id="address" class="form-control" placeholder="Address">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">City</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-map-marker" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" required name="city" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">State</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-map-marker" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" required name="state" id="state" class="form-control" placeholder="state">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Zipcode</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-map-marker" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" value="" required name="zipcode" class="form-control" placeholder="Zipcode">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Phone</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-phone" style="color:#2196F3;"></i>                                          </span>
                                        <input type="text" value="" id="phone_no" required name="phone" class="form-control" placeholder="Telephone">
                                    </div>

                                    <div class="row"  style=" position:absolute;  ">
                                        <div hidden="hidden" style="color:red; background-color: white; z-index: 1000;" class="col-md-12 col-sm-12 col-lg-12" id="phone_error" >                                            </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Date of Birth</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-calendar" style="color:#2196F3;"></i>                                          </span>
                                        <input type="date" required id="dob" name="dob" class="form-control" placeholder="Date of Birth" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Gender</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-user" style="color:#2196F3;"></i>
                                          </span>
                                        <select name="gender" class="form-control" id="gender" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="psw">Password</label>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                            <i class="fa fa-key" style="color:#2196F3;"></i>
                                          </span>
                                        <input type="password" id="psw" required name="password" class="form-control" placeholder="Enter Password">

                                    </div>
                                    <div id="msg" style="color: red;" class="mb-3"></div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Confirm Password</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-key" style="color:#2196F3;"></i>
                                          </span>
                                        <input type="password" id="re_psw" required name="password_confirmation" class="form-control" placeholder="confirm-password">
                                    </div>
                                    <div id="msg2" style="color: red;" class="mb-3"></div>

                                </div>


                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Marital Status</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-tags" style="color:#2196F3;"></i>                                          </span>
                                        <select name="m_status" class="form-control" required>
                                            <option value="" selected disabled>Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Account Type</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-briefcase" style="color:#2196F3;"></i>                                          </span>
                                        <select name="account_type" class="form-control" id="account_type" required>

                                            <option selected disabled>Account Type</option>
                                            <option value="Savings">Savings</option>
                                            <option value="Checking">Checking</option>
                                            <option value="Current">Current</option>
                                            <option value="Offshore">Offshore</option>
                                            <option value="Joint">Joint</option>
                                            <option value="Fixed">Fixed</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Choose Prefered Currency</label>
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-money" style="color:#2196F3;"></i>                                      </span>
                                        <select name="preferred_currency" required class="form-control currency_changer" id="currency">
                                            <option value="" selecetd disabled>Prefered Currency</option>
                                            <option value="USD">USD</option>
                                            <option value="GBP">British pound (GBP)</option>
                                            <option value="EURO">EURO (EUR)</option>
                                            <option value="AUD" >Australian Dollar (AUD)</option>
                                            <option value="CAD">Canadian Dollars (CAD)</option>
                                            <option value="CHF">Swiss Franc (fr)</option>
                                            <option value="JPY">Japanese Yen (JPY)</option>
                                            <option value="NZD">New Zealand Dollars (NZD)</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                                    <label for="">Passport photograph</label>
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-user-circle" style="color:#2196F3;"></i>                                          </span>
                                        <input type="file" name="avatar" id="photo" required class="form-control" />
                                    </div>

                                    <div class="row"  style=" position:absolute;  ">
                                        <div hidden="hidden" style="color:red; background-color: white; z-index: 1000;" class="col-xs-12 col-sm-12 col-lg-12" id="user_error" >                                            </div>
                                    </div>
                                </div>

                                <hr>
                                <br>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 text-center" style="margin-top: 20px;">
                                    <button type="submit" name="register" id="register" class="button button-4x covered_but text_white" style="background-color:#336699;">Submit</button>
                                </div>

                            </form>

                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 text-center" style="margin-top: 5px;">
                                <a href="{{ route('login') }}" >Have an account already? Sign in</a>							</div>
                            <br>
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
                    <p> <a href="#">Nestlecity Bank </a> © 2021. All rights reserved.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="privacy text-right">
                    <ul>

                        <li><a href="{{ route('risk_disclosure') }}">Risk Disclosure </a> |
                            <a href="{{ route('terms') }}">Terms & Conditions </a> |
                            <a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer End -->

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
