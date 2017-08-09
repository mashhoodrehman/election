@extends('user.layout')
@section('content')
 
    <section>

        <div id="profile" class="resetPasswordBn">
            <div class="container">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">


                    <div class="school-heading">
                        <h1>
                            Reset password
                        </h1>
                        <p>
                            Please provide the required details
                        </p>

                    </div>


                </div>

            </div>
        </div>

    </section>
    <section>

        <div id="profile" class="profile-content">
            <div class="container">







                <form class="form-profile" method="POST" action="{{ route('password.request') }}" id="reset_form">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-adjust">

                        <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="email" name="email" class="form-control input-control reset-rad profile-rad" placeholder="email" required id="reset_email">
                            </div>
                        </div>

                    </div>


                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 reset-adjust">

                        <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="password" name="password" class="form-control input-control reset-rad profile-rad" placeholder="New Password" required id="reset_password">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 reset-adjust">

                        <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="password" name="password_confirmation" class="form-control input-control reset-rad profile-rad" placeholder="confirm new password" required id="reset_cpassword">
                            </div>
                        </div>

                    </div>
                    </form>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust">
                        <button id="reset_btn" class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-offset-1 col-xs-10 btn input-button btn-lg">Submit</button>

                    </div>
                   
                    
                




            </div>
        </div>

    </section>
@endsection