@extends('user.layout')
@section('content')
        <section>
            <div id="home" class="home-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tsbs-content tsbs-section" style="">
                                <h1 class="mySlides w3-animate-top">Celebrating A+ teachers<br> Yearly classroom supplies awarded <br> Listen. Learn. Grow.</h1>
                                <h1 class="mySlides w3-animate-bottom">CREATING A BRIDGE OF POSITIVE COMMUNICATION BETWEEN PARENTS, STUDENTS, AND TEACHERS</h1>
                                <h1 class="mySlides w3-animate-top">BUILDING A BETTER 
                                    EDUCATION EXPERIENCE FOR ALL
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="search" class="search-content">
            <div class="container search-container search-bar resultSearch">
            <form method="GET" action="{{url('/search')}}" enctype="multipart/form-data">
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-12 colmd-12 col-sm-12 col-xs-12">
                            <div class="input-group search-input">
            <input type="text" name="keyword" class="form-control resultField input-control" placeholder="SEARCH SCHOOL OR TEACHER ..." value="{{ strtolower(request('keyword'))}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 result-align">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <select class="state-dropdown" id="states">
                                        <option></option>

                                     @foreach ($states as $key => $value)
                                       <option value="{{$key}}" {{ strtolower(request('state'))==  strtolower($value)?'selected':''}}  >{{$value}} </option>
                                    @endforeach                                 
                                    </select>
                                    <input type="hidden" class="btn-select-input " id="state_id" name="state" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <select class="state-dropdown2" id="cities">
                                        <option  >{{ strtolower(request('city'))}}</option>
                          
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="btn-select-input " id="city" name="city"  />
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <input type="number" class="form-control resultField input-control" placeholder="ZIP" name="zip" value="@if(isset($request->zip)){{$request->zip}}@endif" value="{{ strtolower(request('zip'))}} ">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <button class="btn input-button col-xs-12" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 advancedResult">
                            <a>Advanced search</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
        <section>
            <div id="" class="search-content searchAlign">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 htu-content">
                                <span class="sphere grey">
                                <img src="{{ asset('assets/user/images/registerr.png') }}" alt="registration" class="sphere-img">
                                </span>
                                <h3>Register yourself</h3>
                                <p>Create an account and register as <br> student or parent</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 htu-content">
                                <span class="sphere grey">
                                <img src="{{ asset('assets/user/images/select.png') }}" alt="selection" class="teacher-img">
                                </span>
                                <h3>Select the teacher</h3>
                                <p>Search and select the teacher <br> and school</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 htu-content">
                                <span class="sphere grey">
                                <img src="{{ asset('assets/user/images/grade.png') }}" alt="rating" class="rating-img">
                                </span>
                                <h3>Grade the teacher</h3>
                                <p>Grade your teacher and <br> leave feedback</p>
                            </div>
                        </div>
                        <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10 advancedContent">
                            <p> At the end of every school year, once the teachers grades are in, we will pick five A+ teachers
                                to receive supplies to start their next school year off right! And that’s just the beginning…we
                                also want to celebrate students and parents by creating a scholarship program to bridge the
                                gap in this ever increasing, yet underfunding of student grants and loans so those families
                                unable to pay the increasing tuition costs are still able to send their child to college.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
        <section id="demos" class="parent-carousal">
            <div class="slider-team">
                <div class="large-12 columns container">
                    <h1> Top rated teachers by parents</h1>
                    <div class="owl-carousel owl-theme">
                    @if(isset($teachers))
                    @if($teachers->first())
                    @foreach($teachers as $teacher)
                        <div class="text-carousel">
                            <div class="item">
                            <a href="{{url('teacher-detail')}}/{{$teacher->id}}">
                            @if($teacher->image)
                                <img src="{{asset('uploads/teacher_imgs')}}/{{$teacher->image}}" class="carousal-img">
                            @else
                                <img src="{{asset('assets/user/images/teacher-detail.jpg')}}" class="carousal-img">
                             @endif
                             </a>                                 
                            </div>
                            <h3><a href="{{url('teacher-detail')}}/{{$teacher->id}}">{{$teacher->name}}</a></h3>
                            <p>{{$teacher->schools->name}}</p>
                        </div>
                        @endforeach
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section id="demos" class="student-carousal">
            <div class="slider-team">
                <div class="large-12 columns container">
                    <h1> Top rated teachers by student</h1>
                    <div class="owl-carousel owl-theme">
                    @if(isset($teachers))
                    @if($teachers->first())
                    @foreach($teachers as $teacher)
                        <div class="text-carousel">
                            <div class="item">
                            <a href="{{url('teacher-detail')}}/{{$teacher->id}}">
                            @if($teacher->image)
                                <img src="{{asset('uploads/teacher_imgs')}}/{{$teacher->image}}" class="carousal-img">
                            @else
                                <img src="{{asset('assets/user/images/teacher-detail.jpg')}}" class="carousal-img">
                             @endif
                             </a>                                    
                            </div>
                            <h3><a href="{{url('teacher-detail')}}/{{$teacher->id}}">{{$teacher->name}}</a></h3>
                            <p>{{$teacher->schools->name}}</p>
                        </div>
                        
                         @endforeach
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="state">
                <div class="container state-cont">
                    <div class="row">
                        <div class="state-heading">
                            <h1> Locate Schools By State</h1>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 state-section">
                                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-12 state-pages">
                                    <span>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >California</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Texas</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Florida</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >New York</a>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-12 state-pages">
                                    <span>
                                    
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Illinois</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Pennsylvania</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Ohio</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Georgia</a>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-12 state-pages">
                                    <span>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >North Carolina</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Michigan</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >New Jersey</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Virginia</a>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-12 state-pages">
                                    <span>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Washington</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Arizona</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Massachusetts</a>
                                    <br>
                                    <a href="" class="st" onclick="event.preventDefault();
                                                    var st = $(this).text();
                                                    console.log(st);
                                                    $('input[name=stateNameSearch]').val(st);
                                                     document.getElementById('schoolsLinks').submit();" >Tennessee</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-state-section">
                            <button class="btn btn-primary btn-state">
                            view more
                            </button>
                        </div>
                    </div>
                </div>
        </section>


<form id="schoolsLinks" action="{{url('/schools') }}" method="GET" style="display: none;">
    <input type="text" name="stateNameSearch">
</form>

<script>
    var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000);    
}  
</script>




{{-- Search --}}



@endsection