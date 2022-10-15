<div class="nav-header">
    <a href="index.html" class="brand-logo">
{{--        <img class="logo-abbr" src="{{ asset('themes/nbkc/assets/images/fnblogo.png') }}" alt="">--}}
{{--        <img class="logo-compact" src="{{ asset('themes/nbkc/assets/images/fnblogo.png') }}" alt="">--}}
        <img class="brand-title" src="{{ asset('themes/nbkc/assets/images/fnblogo.png') }}" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>


<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="{{ route('user.dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('user.transfer') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-send-1"></i>
                    <span class="nav-text">Transfer</span>
                </a>
            </li>
            <li><a href="{{ route('user.transactions') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-file-1"></i>
                    <span class="nav-text">Transactions</span>
                </a>
            </li>
            <li><a href="{{ route('user.messages') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-briefcase"></i>
{{--                    <img src="{{ asset('img/email.svg') }}">--}}

                    <span class="nav-text">Message <span class="badge badge-danger"> {{ auth()->user()->unread_msg() }}</span></span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-1"></i>
                    <span class="nav-text">Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.user_profile') }}">Profile</a></li>
                </ul>
{{--                <ul aria-expanded="false">--}}
{{--                    <li><a href="{{ route('user.kyc') }}">KYC</a></li>--}}
{{--                </ul>--}}
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.password.index') }}">Change Password</a></li>
                </ul>


            </li>
        </ul>

        <div class="copyright">
            <p><strong>Nestlecity Bank</strong> <br>© 2020 All Rights Reserved</p>
        </div>
    </div>
</div>
