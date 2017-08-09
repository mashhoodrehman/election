<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/plugins/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/css/font-awesome.css') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <link href="{{ asset('assets/user/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/user/plugins/vendors/jquery-3.2.1.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body>
        <header>
            <div class="container menu_con">
                <nav class="display-md">
                    <div class="collapse navbar-collapse" id="navigationbar">
                        <a  href="{{url('/')}}"> 
                            <img src="{{ asset('assets/user/images/TSBS_logo.png') }}" alt="TSBS logo" class="logoImg"></a>
                        <ul class="nav navbar-nav">
                            <li class="nav-login">
                                <?php if(!Auth::user()){?>
                                <a data-toggle="modal" data-target="#myModal">login</a>
                                <?php }?>
                                <?php if(Auth::user()){?>
                                <a href="{{ url('/user/profile') }}/{{Auth::user()->id}}">{{Auth::user()->fName}}</a>
                                <?php }?>
                            </li>
                            <li class="nav-login">
                                <?php if(Auth::user()){?>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >LogOut</a>
                                <?php }?>
                                <?php if(!Auth::user()){?>
                                <a data-toggle="modal" data-target="#registerModal" >Register</a>
                                <?php }?>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>

                            <li class="nav-login navDonate">
                                <button type="submit" class="btn donateButton" data-toggle="modal" data-target="#ratingModal">Donate Now</button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 mob-md">
                        <div class="col-xs-12">
                            <span class=" col-xs-12 col-sm-12 mob-img">
                            <a  href="{{url('/')}}"><img src="{{ asset('assets/user/images/TSBS_logo.png') }}" alt="TSBS logo" class="mob_logo"></a>
                            </span>
                        </div>
                        <div class="col-xs-12 mobDisplay">
                            <span class="col-xs-12 col-sm-6 mob-login">
                                 @if(!Auth::user())
                                   <a data-toggle="modal" data-target="#myModal">login</a>
                                @endif
                                @if(Auth::user())
                                    <a href="{{ url('/user/profile') }}/{{Auth::user()->id}}">{{Auth::user()->fName}}</a>
                                @endif
                            </span>
                            <span class="col-xs-12 col-sm-6 mob-register">
                                 @if(Auth::user())
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >LogOut</a>
                                @endif
                                @if(!Auth::user())
                                <a data-toggle="modal" data-target="#registerModal" >Register</a>
                                @endif 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>                                                         
                            </span>
                        </div>
                        <div class="col-xs-12 mobDonate">
                            <button type="submit" class="btn donateButton" data-toggle="modal" data-target="#ratingModal">Donate Now</button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>







        <div class="content">
            @yield('content')
        </div>
        <footer>
            <div class="container upper-footer">
                <div class="roww">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 upper-left">
                            <h4>About us</h4>
                            <p>
                                Growing up, school was always a safe place for me. Some of my fondest childhood
                                memories were shaped by loving and kind teachers that fostered me to become a
                                strong, independent, and confident student of life. Many, many years later when I became a
                                parent and my own children entered school, I expected them to have a similar
                                experience....<a href="{{url('about')}}" class="read_more">Read More</a>
                            </p>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 upper-right">
                            <div class="col-lg-3 col-md-4 col-sm-4  col-xs-12 footer-pages">
                                <span>
                                <a href="{{url('terms')}}">Terms of Use</a>
                                <br>
                                <a href="{{url('policy')}}">Privacy Policy</a>
                                <br>
                                <a href="{{url('faqs')}}">FAQ</a>
                                </span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4  col-xs-12 footer-pages social-pages">
                                <span>
                                <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>info@teachingSBS.com</a>
                                <br>
                                <a href=""><i class="fa fa-phone" aria-hidden="true"></i>0800 111 3456</a>
                                </span>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-4  col-xs-12 social-pages">
                                <span>
                                <a href="https://www.facebook.com/teachingsbs" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>facebook.com/teachingsbs</a>
                                <br>
                                <a href="https://www.twitter.com/teachingsbs" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>twitter.com/teachingsbs</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bottom-footer">
                            <h5>Copyright 2017 Teaching Side By Side. All Rights Reserved.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal content login-->
<!--  -->

<!--===================================================== -->        
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modalBorder">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="login-modal">
                        <h3>login</h3>
                        <form class="form-signin" class="form-signin" method="POST" action="{{ route('login') }}" id="login_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="current_url" value="{{url()->current() }}" id="current_url">
                            <div class="input-group search-input col-xs-offset-1 col-xs-10">
                                <input type="text" class="form-control input-control login-input" placeholder="USERNAME" required name="email" id="login_email">
                            </div>
                            <div class="input-group search-input login-input col-xs-offset-1 col-xs-10">
                                <input type="password" class="form-control input-control login-input" placeholder="PASSWORD" required name="password" maxlength="15" id="login_password">
                            </div>
                            <div class="forget-modal col-xs-offset-1 col-xs-10">
                                <a data-toggle="modal" data-target="#forgetModal" data-dismiss="modal">Forgot Password?</a>
                            </div>
                             </form>
                    </div>
                </div>
                <div class="modal-footer">
                <div class="login-button">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button id="login_btn" class=" col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn popBtn input-button">Login
                    </button>
                </div>
                <br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>New User?<a data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Register</a></p>
                </div>
               
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Modal content Register-->
        <div id="registerModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modalBorder">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="login-modal">
                                <h3>Register</h3>
                                <ul class="nav nav-pills nav-registration col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register regRight active"><a class="" data-toggle="pill" href="#student">Student</a></li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register regLeft pull-right"><a data-toggle="pill" href="#parent">Parent</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="student" class="tab-pane fade in active">
                                        <form class="form-signin"  action="{{route('register')}}" method="POST" enctype='multipart/form-data' id="register_user_student">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="role" value="student">
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="email" class="form-control input-control login-input" placeholder="EMAIL" required name="email" id="reg_email" >
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="text" class="form-control input-control login-input" placeholder="FIRST NAME" required name="fName" id="reg_fname" maxlength="25">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="text" class="form-control input-control login-input" placeholder="LAST NAME" required name="lName" id="reg_lname" maxlength="25">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="password" class="form-control input-control login-input" placeholder="PASSWORD" required name="password" id="reg_password" maxlength="15">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="password" class="form-control input-control login-input" placeholder="CONFIRM PASSWORD" required name="password_confirmation" id="reg_cpassword" maxlength="15">
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <div class="login-button">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loginAlign">
                                                    <button id="register_user_btn"  class=" col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn regBtn input-button">Register</button>
                                                </div>
                                                <br>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <p>Already have an account?<a data-toggle="modal" data-target="#myModal" data-dismiss="modal">Sign In</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="parent" class="tab-pane fade">
                                        <form class="form-signin"  action="{{route('register')}}" method="POST" enctype='multipart/form-data' id="register_user_parent">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="role" value="parent">
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="email" class="form-control input-control login-input" placeholder="EMAIL" required name="email" id="reg_email2">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="text" class="form-control input-control login-input" placeholder="FIRST NAME" required name="fName" id="reg_fname2" maxlength="25">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="text" class="form-control input-control login-input" placeholder="LAST NAME" required name="lName" id="reg_lname2" maxlength="25">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="password" class="form-control input-control login-input" placeholder="PASSWORD" required name="password" id="reg_password2" maxlength="15">
                                            </div>
                                            <div class="input-group  col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                                                <input type="password" class="form-control input-control login-input" placeholder="CONFIRM PASSWORD" required name="password_confirmation" id="reg_cpassword2" maxlength="15">
                                            </div>
                                        </form>
                                            <div class="modal-footer">
                                                <div class="login-button">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loginAlign">
                                                        <button id="register_user_btn2" class=" col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn regBtn input-button">Register</button>
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <p>Already have an account?<a data-toggle="modal" data-target="#myModal" data-dismiss="modal">Sign In</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal content register-->
        <!-- Modal content forget pasword-->

<!-- ======================================== -->
        <div id="forgetModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modalBorder">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="login-modal forgetPswrd">
                                <h3>Forgot password</h3>
                                <p>Please Provide Your Registered Email</p>
                                <form class="form-signin" method="POST" action="{{ route('password.email') }}" id="forget_form">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group search-input col-xs-offset-1 col-xs-10">
                                        <input type="email" class="form-control input-control reset-rad login-input" placeholder="EMAIL ADDRESS" name="email" required id="forget_ema">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <div class="login-button">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button id="forget_btn" class=" col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn forgetBtn popBtn input-button">Submit</button>
                        </div>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="forgetAccount">Already have account?<a data-toggle="modal" data-target="#myModal" data-dismiss="modal">Sign in</a></p>
                        </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modals end-->
        <!-- Modal content register-->
        <script src="{{ asset('assets/user/plugins/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/user/js/custom.js') }}"></script>
        <script src="{{ asset('assets/user/plugins/vendors/highlight.js') }}"></script>
        <script src="{{ asset('assets/user/plugins/select2/dist/js/select2.min.js') }}"></script>

        <script src="{{ asset('assets/user/plugins/js/app.js') }}"></script>
        <script src="{{ asset('assets/user/plugins/js/custom2.js') }}"></script>
        {!! Toastr::render() !!}

        @if ($errors->first('email'))
        <script> 
            toastr.error("{{$errors->first('email')}}","Error");
        if(localStorage.getItem("usertype") =="student"){

                $('#registerModal').modal('show');
                $('#registerModal').addClass('in');
                $('#registerModal').css({"display":"block"});
                $('#'+localStorage.getItem("usertype")).addClass("active in");                
                $('#parent').removeClass('active in');
                $('#student').addClass('active in');
                $('.regRight').addClass('active');
                $('.regLeft').removeClass('active');
                localStorage.setItem("usertype", "none");
            }else if(localStorage.getItem("usertype") =="parent"){
                $('#registerModal').modal('show');
                $('#registerModal').addClass('in');
                $('#registerModal').css({"display":"block"});

                $('#'+localStorage.getItem("usertype")).addClass("active in");                
                $('#student').removeClass('active in');
                $('#parent').addClass('active in');
                $('.regLeft').addClass('active');
                $('.regRight').removeClass('active');
            }else if(localStorage.getItem("usertype") =="login"){
                localStorage.setItem("usertype", "none");
                $('#myModal').modal('show');
                $('#myModal').addClass('in');
                $('#myModal').css({"display":"block"});                
            }
            
        </script>
        @elseif($errors->first('password'))
        <script> toastr.error("{{$errors->first('password')}}")</script>
        @endif  
        @if (session('status'))
        <script> toastr.info("{{ session('status') }}","Message")</script>
        @endif 
        @if (session('activationlink'))
        <script> toastr.success("{{ session('activationlink') }}")</script>
        @endif  
        @if (session('activated'))
        <script> toastr.success("{{ session('activated') }}","Congratulations!")</script>
        @endif 
        <script>
            $(document).ready(function () {
                $(".state-dropdown").select2({
                  placeholder: "State",
                  allowClear: true
                });
                $(".state-dropdown2").select2({
                  placeholder: "City",
                  allowClear: true
                });
                $(".state-dropdown3").select2({
                  placeholder: "Select a school",
                  allowClear: true
                });
                $(".state-dropdown4").select2({
                  placeholder: "Grade Level",
                  allowClear: true
                });
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    nav: true,
                    navText: [
                        "<img src='{{ asset('assets/user/images/left-arrow.png') }}'>",
                        "<img src='{{ asset('assets/user/images/right-arrow.png') }}'>"
                    ],
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
            
                        },
                        600: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: false
                        },
                        1600: {
                            items: 4,
                            nav: true,
                            loop: false
            
                        }
                    }
                })
                $('#states').on('change',function () {
                    
                    var stateID = $(this).val();
                   var state=$("#states option:selected").text();
                        $('#state_id').val(state);
                    $(this).closest('div').removeClass('has-error');
                    $(this).closest('div').find('label').remove();
                    
                    getCities(stateID);
            
                });
                function getCities(stateID){
                    if (stateID !="") {
            
                        $.ajax({
            
                            url: '/myform/ajax/' + stateID,
            
                            type: "GET",
            
                            dataType: "json",
            
                            success: function (data) {
                                $('#city').val("");
                                $('#cities').empty();
                                 $('#cities').append('<option></option>');


                                $.each(data, function (key, value) {
                                    $('#cities').append('<option value="' + key + '"  >' + value + '</option>');
                                });
                                
                                checkCityifSelectd();
                            }
            
                        });
                    } else {
                        /*$('#states').empty();*/
                    }
                }       
                
                function checkCityifSelectd(){
                        var path = '{{Request::path()}}';
                        var split = path.split("/");
                        var x = split.slice(0, split.length - 1).join("/") + "/";

                       
                        @if(Auth::check())
                            var auth='{{Auth::check()}}';
                            var value2='{{Auth::user()->city}}';
                        @elseif(!Auth::check())
                        var auth = '';
                        @endif

                        
                        if(auth==1 && x == 'user/profile/' ){
                            
                        }
                       else{
                            var value2='';
                            
                        }
                                                
                    $('#cities option').each(function() {
                        var value=$(this).text();
                        if (value == value2) {
                            $(this).prop('selected', true);
                            $('#city').val(value);
                        }

                        else if(value == '{{ request('city')}}'){

                            
                            $(this).prop('selected', true);
                            $('#city').val(value);
                              
                        }else{
                            
                           
                        }
                    });
                }

                    $('#cities').on('change',function () {
                        var city=$("#cities option:selected").text();
                        $('#city').val(city);
                        $(this).closest('div').removeClass('has-error');
                        $(this).closest('div').find('label').remove();
                    });
                    

                    $('#states option').each(function() {
                        if(this.selected){
                            getCities($(this).val());
                            $('#state_id').val($(this).text());

                        }

                    });


                    $('#schools').on('change',function () {
                        var school_id=$("#schools option:selected").val();
                        $('#school_id').val(school_id);
                        $(this).closest('div').removeClass('has-error');
                        $(this).closest('div').find('label').remove();
                    });  



                    $("#user_img").on('click',function () {
                        $("#my_file").click();
                    });
            
/*                $('input[name=state]').val('');
                $('input[name=city]').val('');*/
                    $("#school_tab").on('click',function () {
                        $("#teacher_links").hide();
                        $("#school_links").show();
                    }) ;
                    $("#teacher_tab").on('click',function () {
                        $("#teacher_links").show();
                        $("#school_links").hide();
                    }) ;
                        
            
            });
        </script>
    </body>
</html>