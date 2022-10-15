@extends('dashboard.layout.app')
@section('content')


    <main id="main-container">


        <!-- Page Content -->
        <div class="content">

            <h3 class="text-center text-muted">Make A Transfer</h3>


                <div class="row">
                    <div class="container-fluid">
                        @if(auth()->user()->account->active == 1)
                            <div class="alert alert-danger" role="alert">
                                Hello there <br>
                                Your account has been deactivated, please contact bank for activation<br>
                                <a href="mailto:support@shirecitybank.com">support@shirecitybank.com</a>
                            </div>
                        @else

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
                                @if(session()->has('illicit'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('illicit') }}
                                    </div>
                                @endif
                                @if(session()->has('not_found'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('not_found') }}
                                    </div>
                                @endif
                                <div class="form-group form-row">
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">From <span class="text-danger">*</span></label>
                                        <select name="from" class="form-control form-control-lg" id="">
                                            <option value="{{ auth()->user()->account->account_number }}">{{ auth()->user()->account->account_number }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Amount <span class="text-danger">*</span></label>
                                        <input type="number" name="amount" value="{{ old('amount') }}" class="form-control form-control-lg" placeholder="$-xxxxx" required>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col-lg-4 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Transaction Type <span class="text-danger">*</span></label>
                                        <select id="inputState" name="trans_type" class="form-control form-control-lg" required>
                                            <option selected>Choose Transaction Type</option>
                                            <option value="Internal-Transaction">Internal Transaction</option>
                                            <option value="Local-Transaction">Local Transaction</option>
                                            <option value="International-Transaction">International Transaction</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Account Number <span class="text-danger">*</span></label>
                                        <input type="text" name="acct_number" value="{{ old('acct_number') }}" class="form-control form-control-lg" placeholder="0244xxxxxx" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Recipient's Name <span class="text-danger">*</span></label>
                                        <input type="text" name="rep_name" value="{{ old('rep_name') }}" class="form-control form-control-lg" placeholder="John Doe" required>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Bank Name <span class="text-danger">*</span></label>
                                        <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="form-control form-control-lg" placeholder="0244xxxxxx" required>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Account Type <span class="text-danger">*</span></label>
                                        <select id="inputState" name="account_type" class="form-control form-control-lg" required>
                                            <option selected disabled>Account Type</option>
                                            <option value="Savings">Savings</option>
                                            <option value="Checking">Checking</option>
                                            <option value="Current">Current</option>
                                            <option value="Offshore">Offshore</option>
                                            <option value="Joint">Joint</option>
                                            <option value="Fixed Deposit">Fixed Deposit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Swift Code</label>
                                        <input type="text" name="swift_code" readonly value="SCBAUS33XXX"  class="form-control form-control-lg" placeholder="xx03">
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-4">
                                        <label for="example-ltf-text">Description</label>
                                        <textarea class="form-control" rows="3" name="note"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        @endif

                    </div>


                </div>


            <!-- END Cards -->



            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>



@endsection
