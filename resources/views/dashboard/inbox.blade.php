@extends('dashboard.layout.app')
@section('content')
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/logo.png" alt="">
                <img class="logo-compact" src="images/logo-text.png" alt="">
                <img class="brand-title" src="images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->




        <!--**********************************
            Header start
        ***********************************-->
    @include('dashboard.layout.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
    @include('dashboard.layout.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Inbox</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Message</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="email-left-box px-0 mb-3">
                                    <div class="mail-list mt-4">
                                        <a href="{{ route('user.messages') }}" class="list-group-item active"><i
                                                class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span
                                                class="badge badge-primary badge-sm float-right">{{ auth()->user()->unread_msg() }}</span> </a>
                                        <a href="{{ route('user.read') }}" class="list-group-item">
                                            <i class="fa fa-star font-18 align-middle mr-2"></i>Read Messages<span
                                                class="badge badge-danger text-white badge-sm float-right">{{ auth()->user()->read_msg() }}</span>
                                        </a>
                                    </div>

                                </div>
                                <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">

                                    <div class="email-list mt-3">
                                        @forelse($notify as $msg)
                                        <div class="message unread">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ml-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i
                                                                class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="{{ route('user.show_notify', $msg->slug) }}" class="col-mail col-mail-2">
                                                    <div class="subject"><strong>{{ $msg->title }}</strong></div>
                                                    <div class="date">{{ date('d/M/y h:i A', strtotime( $msg->created_at)) }}</div>
                                                </a>
                                            </div>
                                        </div>
                                        @empty
                                            <div>
                                                <p class="text text-center">No Message Found</p>
                                            </div>
                                        @endforelse

                                    </div>
                                    <!-- panel -->
{{--                                    <div class="row mt-4">--}}
{{--                                        <div class="col-12 pl-3">--}}
{{--                                            <nav>--}}
{{--												<ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">--}}
{{--													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-left"></i></a></li>--}}
{{--													<li class="page-item "><a class="page-link" href="javascript:void()">1</a></li>--}}
{{--													<li class="page-item active"><a class="page-link" href="javascript:void()">2</a></li>--}}
{{--													<li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>--}}
{{--													<li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>--}}
{{--													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-right"></i></a></li>--}}
{{--												</ul>--}}
{{--											</nav>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
    @include('dashboard.layout.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->



@endsection
