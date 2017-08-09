

@extends('user.layout')
@section('content')
    <section>

        <div id="profile" class="editProfile">
            <div class="container">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">


                    <div class="school-heading">
                        <h1>
                            @if(Auth::user()->role =="parent")parent @elseif(Auth::user()->role =="student") student  @endif  profile
                           
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
            <form class="form-profile" method="POST" action="{{ url('userEdit') }}/{{Auth::user()->id}}" enctype="multipart/form-data" id="profile_form">      
            {{csrf_field()}}              
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-2 col-md-1 col-sm-12 col-xs-12"> </div>
                        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                            <div class="img-change">
                                @if($user->image)
                                <img src="{{asset('uploads/User')}}/{{$user->image}}" class="rounded-img" id="user_img" />
                                @else
                                <img src="{{asset('assets/user/images/t-avatar.png')}}" class="rounded-img" id="user_img" />
                                @endif
                                <input type="file"  id="my_file" name="file" style="visibility: hidden;"  />

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                            <div class="img-change">
                                <h1>{{Auth::user()->fName}} {{Auth::user()->lName}}</h1>
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>





               
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-adjust">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="fName" class="form-control input-control profile-rad" placeholder="First Name" value="{{$user->fName}}" required id="profile_fname" maxlength="25">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="lName" class="form-control input-control profile-rad" placeholder="Last Name" value="{{$user->lName}}" required id="profile_lname" maxlength="25">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="email" class="form-control input-control  profile-read profile-rad" value="{{$user->email}}" required readonly >
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control input-control profile-read profile-rad" value="{{$user->role}}" required readonly>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown" id="states">
                                    <option></option>

                                 @foreach ($states as $key => $value)
                                   <option value="{{$key}}" @if($value== Auth::user()->state) selected @endif>{{$value}} </option>
                                @endforeach                                 
                                </select>
                                <input type="hidden" class="btn-select-input " id="state_id" name="state" />                                    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown2" id="cities">
                                    <option></option>

                                 @foreach ($states as $key => $value)
                                   <option value="{{$key}}">{{$value}} </option>
                                @endforeach                                 
                                </select>
                                 <input type="hidden" class="btn-select-input " id="city" name="city"  />                                    
                            </div>
                        </div>
                    </div>
                     @if(Auth::user()->role =="student")
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown3" id="schools" >
                                    <option></option>
                                @if(isset($schools))
                                 @foreach($schools as $data)

                                   <option value="{{$data->id}}"@if(isset($user->school) && $data->id ==$user->school->id) selected @endif>{{$data->name}}</option>
                                @endforeach
                                @endif                                 
                                </select>
                               <input type="hidden" name="school_id_fk" id="school_id"> 
                                                                  
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown4" id="grade"  name="grade">
                                    <option></option>
                                    <option value="Sixth" @if(isset($user->grade) && 'Sixth' ==$user->grade) selected @endif>Sixth</option>
                                    <option value="Seventh" @if(isset($user->grade) && 'Seventh' ==$user->grade) selected @endif>Seventh</option>
                                    <option value="Eighth" @if(isset($user->grade) && 'Eighth' ==$user->grade) selected @endif>Eighth</option>
                                    <option value="Ninth" @if(isset($user->grade) && 'Ninth' ==$user->grade) selected @endif>Ninth</option>
                                    <option value="Tenth" @if(isset($user->grade) && 'Tenth' ==$user->grade) selected @endif>Tenth</option>
                                    <option value="Eleventh" @if(isset($user->grade) && 'Eleventh' ==$user->grade) selected @endif>Eleventh</option>
                                    <option value="Twelfth" @if(isset($user->grade) && 'Twelfth' ==$user->grade) selected @endif>Twelfth</option>
                                 </select>                                   
                            </div>
                        </div>
                        </div>
                    @endif
                     </form>



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 prof-button-adjust">
                        <button id="profile_btn" class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 btn input-button btn-lg">Update</button>
                    </div>

               {{--                         <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control input-control profile-read profile-rad" value="{{$user->zip}}" name="zip" placeholder="ZIP" required min="0" id="profile_zip" maxlength="10">
                        </div> --}}
            </div>
        </div>
    </section>
<script ></script>
@endsection

