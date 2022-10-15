@extends('dashboard.layout.app')
@section('content')


    <main id="main-container">


        <!-- Page Content -->
        <div class="content">

            <h3 class="text-center text-muted">Enter Your TRN Code</h3>


            <div class="row">
                <div class="container-fluid">
                    <div class="col-lg-10 offset-lg-1">
                        <form action="{{ route('user.trn_code_store') }}" method="POST">

                            @csrf
                            <input type="hidden" value="{{ $with_dt->id }}" name="withdrawal_id">
                            <input type="hidden" value="{{ $with_dt->acct_number }}" name="acct_number">
                            @if(session()->has('declined'))
                                <div class="alert alert-danger">
                                    {{ session()->get('declined') }}
                                </div>
                            @endif

                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label>TRN Code</label>
                                    <input required type="number" name="trn" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>

                            <div class="mt-3">
                                <p>If you do not have an TRN code kindly request or contact bank for it</p>
                                <a href="mailto:admin@nestlecity.com">admin@nestlecity.com</a>

                            </div>

                        </form>
                    </div>


                </div>


            </div>


            <!-- END Cards -->



            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>



@endsection
