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
                <img class="logo-abbr" src="{{ asset('dashboard/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('dashboard/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('dashboard/images/logo-text.png') }}" alt="">
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
					<h4>Transfer</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Transfer</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Enter Transfer Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('user.store') }}" method="POST">
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

                                        @if(session()->has('declined'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('declined') }}
                                            </div>
                                        @endif
{{--                                        <input type="hidden" value="{{ $withdraw->id }}" name="withdrawal_id">--}}

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>From</label>
{{--                                                <input type="number" name="amount" value="amount" class="form-control" placeholder="Enter Amount">--}}

                                                <select name="from" class="form-control" id="">
                                                    <option value="{{ auth()->user()->account->account_number }}">{{ auth()->user()->account->account_number }}</option>
                                                </select>
{{--                                                <input type="text" class="form-control" value="{{ auth()->user()->account->account_number }}">--}}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Amount</label>
                                                <input type="number" name="amount"  class="form-control" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Account Number</label>
                                                <input type="text" name="account_number" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Recipient's Name</label>
                                                <input type="text" name="rep_name" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Swift Code</label>
                                                <input type="text" name="swift_code" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Bank</label>
                                                <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Account Type</label>
                                                <select id="inputState" name="account_type" class="form-control">
                                                    <option selected>Choose Account Type</option>
                                                    <option value="savings">Savings</option>
                                                    <option value="current">Current</option>
                                                </select>
                                            </div>
                                        </div>
{{--                                        <div class="form-row">--}}
{{--                                            <div class="form-group col-md-6">--}}
{{--                                                <label>Routing Transit Number (RTN)</label>--}}
{{--                                                <input type="text" name="rtn" class="form-control" placeholder="Enter Account Number">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group col-md-6">--}}
{{--                                                <label>Swift Code</label>--}}
{{--                                                <input type="text"  name="swift_code" class="form-control" placeholder="Receiver Name">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Note</label>
                                                <textarea class="form-control" rows="3" name="note"></textarea>
                                            </div>
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox">--}}
{{--                                                <label class="form-check-label">--}}
{{--                                                    Check me out--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
@endsection
