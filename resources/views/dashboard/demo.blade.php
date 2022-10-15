
<form action="{{ route('user.store_otp_code') }}" method="POST">
    @csrf
    @if(session()->has('declined_otp'))
        <div class="alert alert-danger">
            {{ session()->get('declined_otp') }}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <input type="hidden" value="{{ $withdrawal->id }}" name="withdrawal_id">

    <p>Enter Your OTP Code</p>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>OTP Code</label>
            <input type="number" name="otp" class="form-control" autocomplete="off">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
    <div class="mt-3">
        <p>If you do not have an OTP code kindly request or contact bank for it</p>
        <a href="{{ route('user.request_swift_code') }}" class="text text-primary">Request for OTP Code</a>
    </div>
</form>
