@extends('dashboard.layout.app')
@section('content')



    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Quick Overview -->
            <h2 class=" text-muted mr-1">Welcome {{ auth()->user()->last_name." ".auth()->user()->first_name }}</h2>
            @if(auth()->user()->account->active == 1)
                <div class="alert alert-danger" role="alert">
                    Hello there <br>
                    Your account has been deactivated, please contact bank for activation<br>
                   <a href="mailto:support@shirecitybank.com">support@nestlecity.com</a>
                </div>
            @endif
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
            </h2>

            <div class="block block-rounded invisible" data-toggle="appear">
                <div class="block-content block-content-full">
                    <div class="row text-center">
                        <div class="col-md-4 py-3">
                            <div class="font-size-h1 font-w300 text-black mb-1">
                                $@convert( optional(auth()->user()->account)->balance)
                            </div>
                            <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Balance</a>
                        </div>
                        <div class="col-md-4 py-3">
                            <div class="font-size-h1 font-w300 text-success mb-1">
                                +$@convert($credit)
                            </div>
                            <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Total Income</a>
                        </div>
                        <div class="col-md-4 py-3">
                            <div class="font-size-h1 font-w300 text-danger mb-1">
                                -$@convert($debit)
                            </div>
                            <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Total Outflow</a>
                        </div>
                        <div class="col-md-4 py-3">
                            <div class="font-size-h1 font-w300 mb-1">
                                $@convert($pending_debit)
                            </div>
                            <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Pending Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Quick Overview -->


            <!-- Bank Accounts -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Bank Accounts (1)
            </h2>
            <div class="row">
                <div class="col-lg-12 invisible" data-toggle="appear">
                    <!-- Bank Account #1 -->
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <p class="font-size-lg font-w600 mb-0">
                                    Account Number -<span class="text-default">{{ optional(auth()->user()->account)->account_number }}</span>
                                </p>
                                <p class="text-muted mb-0">
                                    $ @convert( optional(auth()->user()->account)->balance)
                                </p>
                            </div>
                            <div class="ml-3">
                                <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                            <span class="font-size-sm text-muted">Type Account: <span class="text-default">{{ optional(auth()->user())->account_type }}</span></span><br>
                            <span class="font-size-sm text-muted">Account Base Currency: <span class="text-default">{{ optional(auth()->user())->preferred_currency }}</span></span><br>
{{--                            <span class="font-size-sm text-muted">$ @convert( optional(auth()->user()->account)->account_limit_per_day) in daily limit</span>--}}
                        </div>
                    </a>
                    <!-- END Bank Account #1 -->
                </div>

            </div>
            <!-- END Bank Accounts -->

            <!-- Latest Transactions -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted mr-1"></i> Latest Transactions({{ $total_trans }})
            </h2>
            @forelse($transactions as $item)
                @if($item->status == 1)

                    <a class="block block-rounded block-link-shadow invisible border-left border-success border-3x" data-toggle="appear" href="{{ route('user.withdrawal_details', $item->id) }}">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <p class="font-size-lg font-w600 mb-0">
                                    +$@convert($item->amount)
                                </p>
                                <p class="text-muted mb-0">
                                    {{ substr($item->acct_number, 0, 5) }}-xxx Account
                                </p>
                            </div>
                            <div class="ml-3">
                                <i class="fa fa-arrow-right text-danger"></i>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <span class="font-size-sm text-muted">From <strong>{{ $item->rep_name }}</strong> at <strong>{{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</strong></span>
                        </div>
                    </a>
                @else
                    <a class="block block-rounded block-link-shadow invisible border-left border-danger border-3x" data-toggle="appear" href="{{ route('user.withdrawal_details', $item->id) }}">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <p class="font-size-lg font-w600 mb-0">
                                    +$@convert($item->amount)
                                </p>
                                <p class="text-muted mb-0">
                                    {{ substr($item->acct_number, 0, 5) }}-xxx Account
                                </p>
                            </div>
                            <div class="ml-3">
                                <i class="fa fa-arrow-right text-danger"></i>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <span class="font-size-sm text-muted">From <strong>{{ $item->rep_name }}</strong> at <strong>{{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</strong></span>
                        </div>
                    </a>

                @endif

            <!-- END Latest Transactions -->
            @empty
                <h3>No Transaction</h3>
        @endforelse
            <!-- END Latest Transactions -->

            <!-- View More -->
            <div class="text-center invisible" data-toggle="appear">
                <a class="btn btn-sm btn-alt-secondary font-w600" href="{{ route('user.statement') }}">
                    <i class="fa fa-arrow-down mr-1"></i> View More..
                </a>
            </div>
            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
