@extends('dashboard.layout.app')
@section('content')



    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Quick Overview -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
            </h2>

                <h3 class="text text-center">Request A Debit Card</h3>
                <form action="{{ route('user.card.store') }}" method="POST">
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

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" readonly class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" readonly class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Nick Name</label>
                            <input type="text" name="nickname" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Card Type</label>
                            <select name="card_type" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Request Card</button>
                </form>

            <!-- END Quick Overview -->

            <!-- Cards -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Requested Card ({{ $card_count }})
            </h2>
            <div class="container">
                @foreach($cards as $item)
                <a class="block block-rounded block-link-shadow invisible border-left border-success border-3x" data-toggle="appear" >
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                Card Nickname: {{ $item->nickname }}
                            </p>
                            <p class="text-muted mb-0">
                                Card Type: {{ $item->card_type }}
                            </p>
                            <p class="text-muted mb-0">
                                Date: {{ date('d M, Y', strtotime($item->created_at)) }}
                            </p>
                        </div>

                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
{{--                        <span class="font-size-sm text-muted">From <strong>{{ $item->rep_name }}</strong> at <strong>{{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</strong></span>--}}
                    </div>
                </a>
                @endforeach
            </div>
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Cards (0)
            </h2>
            <h3 class="text-center">You do not have any card active</h3>
            <div class="row">

                <div class="col-xl-6 offset-xl-3 invisible" data-toggle="appear">
                    <!-- Card #1 -->
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full ribbon ribbon-dark ribbon-modern ribbon-info">
                            <div class="ribbon-box">$ xxxx</div>
                            <div class="py-3 text-center">
                                <i class="fa fa-credit-card fa-4x text-gray"></i>
                                <p class="font-size-lg text-black mt-3 mb-0">
                                    Example LTD
                                </p>
                                <p class="text-muted mb-3">
                                    4309-xxxx-xxxx-7898
                                </p>
                                <p class="font-size-sm font-w700 text-muted mb-0">
                                    MasterCard
                                </p>
                            </div>
                        </div>
{{--                        <div class="block-content block-content-full block-content-sm text-center bg-body-light">--}}
{{--                            <span class="font-size-sm text-muted">Active through May 2025</span>--}}
{{--                        </div>--}}
                    </a>
                    <!-- END Card #1 -->
                </div>

            </div>
            <!-- END Cards -->



            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
