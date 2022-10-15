@extends('dashboard.layout.app')
@section('content')



    <main id="main-container">

        <!-- Page Content -->
        <div class="content content-boxed">


            <!-- Invoice -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ $with_dt->transaction_id }}</h3>
                    <div class="block-options">
                        <!-- Print Page functionality is initialized in Helpers.print() -->
                        <button type="button" class="btn-block-option" onclick="Dashmix.helpers('print');">
                            <i class="si si-printer mr-1"></i> Print Invoice
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="p-sm-4 p-xl-7">
                        <!-- Invoice Info -->
                        <div class="row mb-5">
                            <!-- Company Info -->
                            <div class="col-lg-6 col-md-12">
                                <p class="h3">SENDER</p>
                                <div>
                                    <strong>Name:</strong> {{ auth()->user()->first_name." ".auth()->user()->last_name }}<br>
                                    <strong>Email:</strong> {{ auth()->user()->email }}<br>
                                    <strong>Bank Name:</strong> Nestlecity Bank<br>
                                    <strong>Account No:</strong> <span class="text text-primary">{{ auth()->user()->account->account_number }}</span><br>
                                </div>
                            </div>
                            <!-- END Company Info -->

                            <!-- Client Info -->
                            <div class="col-lg-6 col-md-12 text-right">
                                <p class="h3">RECEIVER</p>
                                <div>
                                    <strong>Name:</strong> {{ $with_dt->rep_name }}<br>
                                    <strong>Account No:</strong> {{ $with_dt->acct_number }}<br>
                                    <strong>Bank Name:</strong> {{ $with_dt->bank_name }}<br>
                                    <strong>Account Type:</strong> {{ $with_dt->account_type }}<br>
                                </div>
                            </div>
                            <!-- END Client Info -->
                        </div>
                        <!-- END Invoice Info -->

                        <!-- Table -->
                        <div class="table-responsive push">
                            <table class="table table-bordered">
                                <thead class="bg-body">
                                <tr>
                                    <th class="text-center" style="width: 60px;">Date</th>
                                    <th>Note</th>
                                    <th class="text-center" style="width: 90px;">Status</th>
                                    <th class="text-right" style="width: 120px;">Unit</th>
                                    <th class="text-right" style="width: 120px;">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary">{{ date('d.M.y h:i A', strtotime($with_dt->created_at)) }}</span>
                                    </td>
                                    <td>

                                        <div class="text-muted">{{ $with_dt->note }}</div>
                                    </td>
                                    <td class="text-center">
                                        {!! $with_dt->status() !!}
                                    </td>
                                    <td class="text-right">$@convert( $with_dt->amount)</td>
                                    <td class="text-right">$@convert( $with_dt->amount)</td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="font-w600 text-right">Vat Rate</td>
                                    <td class="text-right">$@convert( $with_dt->vat ) </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                    <td class="text-right">$@convert( $with_dt->amount + $with_dt->vat )</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-w700 text-uppercase text-right bg-body-light">Total Due</td>
                                    <td class="font-w700 text-right bg-body-light">$@convert( $with_dt->amount + $with_dt->vat )</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Table -->

                        <!-- Footer -->
                        <p class="text-muted text-center my-5">
                            Thank you for doing business with us.
                        </p>
                        <!-- END Footer -->
                    </div>
                </div>
            </div>
            <!-- END Invoice -->
        </div>
        <!-- END Page Content -->
    </main>





@endsection
