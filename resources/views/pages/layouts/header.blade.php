<header style=" background:white; width: 100%; z-index: 1000;">
    <div  style="background: #151D28;" class="nav-top hidden-xs" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-top-social">
                        <ul>
                            <li style="color:white"><i class="fa fa-phone" style="color:white"></i><!DOCTYPE html>
                                <html>
                                <head>
                                    <meta charset="UTF-8">
                                    <title></title>
                                </head>
                                <body>
                                +1(760)481‑1341
                                </body>

                                </html>
                            </li>
                            <li style="color:white">
                                <a style="color:white !important" href="{{ route('contact') }}">
                                    <i style="color:white" class="fa fa-envelope" aria-hidden="true"></i> Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="nav-top-access">
                        <ul>
                            <li><a target="_blank" href="{{ route('login') }}" style="color:white"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                            <li><a target="_blank" href="{{ route('register') }}" style="color:white"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Open Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-flexo " >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('homepage') }}" >
                    <h4>Nestleunion Bank</h4>
{{--                    <img height="100" style="margin-top: -30px" src="{{ asset('img/logo.png') }}" class="img-respnsive" alt="Brand Logo">--}}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li class="dropdown" style="color: white;">
                        <a href="#" style="color: white;">Banking & Loans</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('online_banking') }}">Online Banking</a></li>
                            <li><a href="{{ route('mobile_banking') }}">Mobile Banking</a></li>
                            <li><a href="{{ route('cards') }}">Cards</a></li>
                            <li><a href="{{ route('atm') }}">ATM</a></li>
                            <li><a href="{{ route('student_loan') }}">Student Loan Refinance</a></li>
                            <li><a href="{{ route('internet_banking') }}">Internet Banking</a></li>
                            <li><a href="{{ route('branch_banking') }}">Branch Banking</a></li>
                            <li><a href="{{ route('debit_card') }}">Debit Card</a></li>
                            <li><a href="{{ route('FCTeNS') }}">FCTeNS</a></li>
                            <li><a href="{{ route('e_statements') }}">e-Statement</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('wealth_management') }}" style="color: white;">Wealth Management</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" style="color: white;">Nestleunion </a>
                        <ul class="dropdown-menu">
                            <li><a  href="{{ route('about') }}">About Us</a></li>
                            <li><a  href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a  href="{{ route('careers') }}">Careers</a></li>
                        </ul>
                    </li>
                    <li class="nav-search hidden-sm hidden-xs"><i class="fa fa-search" style="color: white;"></i></li>

                    <li><a class="hidden-lg hidden-md" href="{{ route('register') }}" style="color: white;">Register</a></li>
                    <li>
                        <a class="hidden-lg hidden-md" href="{{ route('login') }}" style="color: white;">Login</a>
                    </li>
                    <li>
                        <!-- GTranslate: https://gtranslate.io/ -->

                        <style type="text/css">
                            <!--
                            a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(http://gtranslate.net/flags/16.png);}
                            a.gflag img {border:0;}
                            a.gflag:hover {background-image:url(http://gtranslate.net/flags/16a.png);}
                            #goog-gt-tt {display:none !important;}
                            .goog-te-banner-frame {display:none !important;}
                            .goog-te-menu-value:hover {text-decoration:none !important;}
                            body {top:0 !important;}
                            #google_translate_element2 {display:none!important;}
                            -->
                        </style>

                        <select onchange="doGTranslate(this);" style="height: 50px; border-radius: 5px; padding: 5px; margin-left: 10px; margin-top: 10px"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
                        <script type="text/javascript">
                            function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
                        </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


                        <script type="text/javascript">
                            /* <![CDATA[ */
                            eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
                            /* ]]> */
                        </script>
                    </li>
                </ul>
            </div>

        </div>
        <div class="header-search">
            <div class="container">
                <h3 class="search-title">Just type and press enter</h3>
                <form id="searchForm" class="searchform" action="#" method="post">
                    <div class="form-group">
                        <input type="search" name="searchinput" placeholder="Search..." class="form-control" required>
                    </div>
                </form>
            </div>
        </div>
    </nav>

</header>
