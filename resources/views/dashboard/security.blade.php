@extends('dashboard.layout.app')
@section('content')



    <main id="main-container">



        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('user.change.password') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Change Password -->
                        <h2 class="content-heading pt-0">
                            <i class="fa fa-fw fa-asterisk text-muted mr-1"></i> Change Password
                        </h2>
                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Changing your sign in password is an easy way to keep your account secure.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="form-group">
                                    <label for="dm-profile-edit-password">Current Password</label>
                                    <input type="password" name="current_password"  class="form-control" id="dm-profile-edit-password">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="dm-profile-edit-password-new">New Password</label>
                                        <input type="password" class="form-control" id="dm-profile-edit-password-new"  name="new_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="dm-profile-edit-password-new-confirm">Confirm New Password</label>
                                        <input type="password" class="form-control" id="dm-profile-edit-password-new-confirm" name="new_confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Change Password -->



                        <!-- Submit -->
                        <div class="row push">
                            <div class="col-lg-8 col-xl-5 offset-lg-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle mr-1"></i> Update Password
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>

@endsection
