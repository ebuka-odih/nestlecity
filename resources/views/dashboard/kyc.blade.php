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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">KYC</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fill Your KYC information</h4>
                            </div>
                            <div class="card-body">
                                @if(auth()->user()->status == 0)
                                <div class="basic-form">

                                    <form action="{{ route('user.kyc_store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <div class="offset-2 col-md-10">
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label>ID Type</label>
                                                    <select name="id_type" id="" class="form-control">
                                                        <option>Chose ID Type</option>
                                                        <option value="Passport"> Passport</option>
                                                        <option value="Driver license"> Driver's License</option>
                                                        <option value="National ID."> National ID.</option>
{{--                                                        <option value="driver license"> Driver's License</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <div class="custom-file">
                                                        <input name="id_picture" type="file" class="custom-file-input form-control-lg">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                                @else
                                <h2 class="text text-success text-center">Your Account Has Been Verified</h2>
                                    @endif
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
