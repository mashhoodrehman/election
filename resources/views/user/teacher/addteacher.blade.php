 

@extends('user.layout')
@section('content')
@if ($errors->has('name'))
    <script> toastr.error("The name field is required","Error")</script>
 @endif  
@if ($errors->has('about'))
    <script> toastr.error("The about field is required","Error")</script>
 @endif  
@if ($errors->has('address'))
    <script> toastr.error("The address field is required","Error")</script>
 @endif  
@if ($errors->has('city'))
    <script> toastr.error("The city field is required","Error")</script>
 @endif  
@if ($errors->has('state'))
    <script> toastr.error("The state field is required","Error")</script>
 @endif  
@if ($errors->has('zip'))
    <script> toastr.error("The zip field is required","Error")</script>
 @endif   
@if ($errors->has('school_id_fk'))
    <script> toastr.error("The School field is required","Error")</script>
 @endif  
@if ($errors->has('logo'))
    <script> toastr.error("The logo is required. e.g(.jpg, .jpeg ,.png)","Error")</script>
 @endif
<div class="content">

{{--         <section>
            <div id="profile" class="profile-content">
                <div class="container">
                    <div class="school-avatar">
                        <span class="avatar-sphere grey">
                        <img src="{{asset('assets/user/images/t-avatar.png')}}" alt="Add teacher" class="avatar-img">
                        </span>
                    </div>
                    <div class="school-heading">
                        <h3>
                            Add Teacher
                        </h3>
                        <p>
                            Please provide the required details
                        </p>
                    </div>

                    
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-adjust">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="address" class="form-control input-control profile-rad" placeholder="Address" required id="addteacher_address" maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="zip" class="form-control input-control profile-rad" placeholder="ZIP" required id="addteacher_zip" maxlength="10">
                                </div>
                            </div>
                        </div>                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <select class="state-dropdown" id="states">
                                        <option></option>

                                     @foreach ($states as $key => $value)
                                       <option value="{{$key}}">{{$value}} </option>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dropZoneContainer">
                                        <label for="upload-1" class="btn-file-upload">
                                            <span class="text-upload">Upload Image</span>
                                            <p class="file-name pull-right browse-upload"> Browse</p>
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                   
                                   <p>Can't find school in list?<a href="">Add School</a></p>                                   
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust">
                            <button  class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 btn input-button btn-lg">Add Teacher</button>
                        </div>
                    
                </div>
            </div>
        </section> --}}
{{-- ======================================= --}}
            <section>
                <div id="profile" class="profile-top">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">
                            <div class="school-heading">
                                <h1>
                                    Add Teacher
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
                <div id="profile" class="schoolContent">
                    <div class="container">
                    <form class="form-profile" method="POST" action="{{ url('user/teachers') }}" enctype="multipart/form-data" id="addteacher_form">                        
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-adjust">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name" class="form-control input-control profile-rad" placeholder="Teacher Name" required id="addteacher_name" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text"   name="subject" class="form-control input-control profile-rad" placeholder="Teaching Subject" required id="addteacher_subject" maxlength="25">
                                </div>
                                    </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="dropZoneContainer">
                                            <label for="upload-1" class="btn-file-upload">
                                                <span class="text-upload file-name">UPLOAD IMAGE</span>
                                                <p class="pull-right browse-upload"> Browse</p>
                                            </label>
                                            <input type="file" id="upload-1" name="image"  accept=".jpeg,.jpg,.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group searchinput profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <select class="state-dropdown3" id="schools" >
                                            <option></option>

                                         @foreach($schools as $data)

                                           <option value="{{$data->id}}" @if(isset($id) && $id ==$data->id) selected @endif>{{$data->name}}</option>
                                        @endforeach                                 
                                        </select>
                                        <input type="hidden" name="school_id_fk" id="school_id"> 
                                        <p>Can't find school in list<span class="questionMark">?</span> <a href="{{url('/user/addschool')}}">Add School</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea type="content" class="form-control input-control profile-rad" placeholder="About the teacher" name="about" required id="addteacher_about"></textarea>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust">
                                <button id="addteacher_btn" class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 btn input-button btn-lg">Add Teacher</button>
                            </div>
                        
                    </div>
                </div>
            </section>
</div>                 
<script >
                        (function(){
                            var school_id=$("#schools option:selected").val();
                            $('#school_id').val(school_id);
                            $(this).closest('div').removeClass('has-error');
                            $(this).closest('div').find('label').remove();  
                            console.log($('#school_id').val());                   
                    })(); 
                    
</script>
@endsection

