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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Transfer</a></li>
						<li class="breadcrumb-item "><a href="javascript:void(0)">ATC Code</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">OTP Code</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">TRN Code</a></li>
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
                                    <form action="{{ route('user.trn_code_store')}}" method="POST">
                                        @csrf
                                        @if(session()->has('declined_trn'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('declined_trn') }}
                                            </div>
                                        @endif
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <input type="hidden" value="{{ $withdrawal->id }}" name="withdrawal_id">
                                     <p>Enter Your TRN Code</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>TRN Code</label>
                                                <input type="number" name="trn" value="{{ old('trn') }}"  class="form-control">
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Send</button>
                                        <div class="mt-3">
                                            <p>If you do not have an TRN code kindly request or contact bank for it</p>
                                            <a href="{{ route('user.request_swift_code') }}" class="text text-primary">Request for TRN Code</a>
                                        </div>
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
