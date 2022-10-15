@extends('dashboard.layout.app')
@section('content')



    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image" style="background-image: url('../assets/media/photos/photo17@2x.jpg');">
            <div class="bg-black-75">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" href="">
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset(auth()->user()->profile_pic) }}" alt="">
                        </a>
{{--                        <h1 class="font-w700 my-2 text-white">Edit Account</h1>--}}
                        <h2 class="h4 font-w700 mt-3 text-white-75">
                            {{ auth()->user()->first_name." ".auth()->user()->last_name }}
                        </h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                        <!-- User Profile -->
                        <h2 class="content-heading pt-0">
                            <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> User Profile
                        </h2>
                        <p class="text-muted">
                            If any need for info modification please contact the bank
                        </p>
                        <div class="row push">

                            <div class="col-lg-8 col-xl-5">
                                <div class="form-group">
                                    <label for="dm-profile-edit-username">First Name</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-username" readonly name="first_name" placeholder="Enter your username.." value="{{ old('first_name', optional($user)->first_name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="dm-profile-edit-name">Name</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-name" readonly name="last_name" placeholder="Enter your name.." value="{{ old('last_name', optional($user)->last_name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="dm-profile-edit-email">Email Address</label>
                                    <input type="email" class="form-control" readonly id="dm-profile-edit-email" name="dm-profile-edit-email" placeholder="Enter your email.." value="{{ old('email', optional($user)->email) }}">
                                </div>
                            </div>



                        </div>

                        <!-- END User Profile -->



                        <!-- Submit -->
                        <!-- END Submit -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>

@endsection
