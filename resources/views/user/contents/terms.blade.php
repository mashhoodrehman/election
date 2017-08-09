@extends('user.layout')
@section('content')
         <section>
            <div id="profile" class="profile-top">
                <div class="container">
                </div>
            </div>
        </section>
        <section>
            <div id="about" class="aboutContent">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2><span>Use OF Terms</span></h2>
                    @if(isset($data)){!!$data!!} @endif                   
                </div>
            </div>
        </section>
@endsection