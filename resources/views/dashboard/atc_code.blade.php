@extends('dashboard.layout.app')
@section('content')


    <main id="main-container">


        <!-- Page Content -->
        <div class="content">

            <h3 class="text-center text-muted">Enter Your ATC Code</h3>


            <div class="row">
                <div class="container-fluid">
                    <div class="col-lg-10 offset-lg-1">
                        <form action="{{ route('user.atc_code_store') }}" method="POST">

                            @csrf
                            <input type="hidden" value="{{ $with_dt->id }}" name="withdrawal_id">
                            @if(session()->has('declined'))
                                <div class="alert alert-danger">
                                    {{ session()->get('declined') }}
                                </div>
                            @endif

                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label>ATC Code</label>
                                    <input required type="number" name="atc_code" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>

                            <div class="mt-3">
                                <p>If you do not have an ATC code kindly request or contact bank for it</p>
                                <a target="_blank" href="mailto:admin@nestlecity.com">admin@nestlecity.com</a>

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
