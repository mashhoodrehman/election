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
{{--         <section>
            <div id="profile" class="profile-content">
                <div class="container">
                    <div class="school-avatar">
                        <span class="avatar-sphere grey">
                        <img src="{{asset('assets/user/images/s-avatar.png')}}" alt="Add school" class="avatar-img">
                        </span>
                    </div>
                    <div class="school-heading">
                        <h3>
                            Add School
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
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input  class="form-control input-control profile-rad" required="required" placeholder="Zip" name="zip" type="text" id="school_zip" maxlength="10">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dropZoneContainer">
                                        <label for="upload-1" class="btn-file-upload">
                                            <span class=" file-name text-upload">Upload Image</span>
                                            <p class=" pull-right browse-upload"> Browse</p>
                                        </label>
                                        <input  id="upload-1" type="file" name="logo"  accept=".jpeg,.jpg,.png">
                                    </div>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
                                </div>
                            </div>
                        </div>
                         </form>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust">
                            <button  class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 btn input-button btn-lg">Add School</button>
                        </div>
                   
                </div>
            </div>
        </section> --}}
{{-- ========================================================== --}}
            <section>
                <div id="profile" class="schoolTop">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">
                            <div class="school-heading">
                                <h1>
                                    Add School
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
                        <form class="form-profile" method="POST" action="{{ url('user/schools') }}"  enctype="multipart/form-data" id="addschool_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-adjust">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input  class="form-control input-control profile-rad" maxlength="50" required="required"  placeholder="School Name" name="name" type="text" id="school_name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="number" class="form-control input-control profile-rad numbersOnly" placeholder="Contact number" name="number" required id="number">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="url" class="form-control input-control profile-rad" placeholder="School website" name="url" required id="url">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-adjust">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <input  class="form-control input-control profile-rad" maxlength="50" required="required" placeholder="Address" name="address" type="text" id="school_address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="dropZoneContainer">
                                            <label for="upload-1" class="btn-file-upload">
                                                <span class="text-upload file-name">UPLOAD IMAGE</span>
                                                <p class="pull-right browse-upload"> Browse</p>
                                            </label>
                                            <input  id="upload-1" type="file" name="logo"  accept=".jpeg,.jpg,.png">
                                        </div>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group search-input profile-input col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea type="content" cols="20" class="form-control input-control profile-rad" placeholder="About the school" name="about" required id="schools_about"></textarea>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust">
                                <button id="addschool_btn" class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 btn input-button btn-lg">Add School</button>
                            </div>
                        
                    </div>
                </div>
            </section>
@endsection