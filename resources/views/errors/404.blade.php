


<!DOCTYPE html>
<html>
<head>
  <title>404</title>
  <style>
#fof {
    display: block;
    width: 100%;
    padding: 150px 0;
    line-height: 1.6em;
    text-align: center;
}

#fof .hgroup {
    display: block;
    width: 80%;
    margin: 0 auto;
    padding: 0;
}

#fof .hgroup h1,
#fof .hgroup h2 {
    margin: 0 0 0 40px;
    padding: 0;
    float: left;
    text-transform: uppercase;
}

#fof .hgroup h1 {
    margin-top: -90px;
    font-size: 200px;
}

#fof .hgroup h2 {
    font-size: 60px;
}

#fof .hgroup h2 span {
    display: block;
    font-size: 30px;
}

#fof p {
    margin: 25px 0 0 0;
    padding: 0;
    font-size: 16px;
}

#fof p:first-child {
    margin-top: 0;
}


body {
    margin: 0;
    padding: 0;
    font-size: 13px;
    font-family: Georgia, "Times New Roman", Times, serif;
    color: #919191;
   
}


.clear:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
    line-height: 0;
}



.row2 {
    color: #979797;
    background-color: #FFFFFF;
}

.row2 a {
    color: #FF9900;
    background-color: #FFFFFF;
}



div.wrapper h1,
div.wrapper h2,
div.wrapper h3,
div.wrapper h4,
div.wrapper h5,
div.wrapper h6 {
    margin: 0 0 15px 0;
    padding: 0;
    font-size: 20px;
    font-weight: normal;
    line-height: normal;
}


#header,
#container,
#footer {
    display: block;
    width: 960px;
    margin: 0 auto;
}

#header {
    padding: 20px 0;
}

#header .fl_left h1,
#header .fl_left h2 {
    margin: 0;
    padding: 0;
    font-weight: normal;
    text-transform: none;
}

#header .fl_left h1 {
    font-size: 36px;
}

#header .fl_left h2 {
    font-size: 13px;
}
.wrapper{
    width: 100%;
    height: 100%;
}
</style>
</head>
<body>
<div class="wrapper row2">
  <div id="container" class="clear">
    <section id="fof" class="clear">
      <div class="hgroup clear">
        <h1>404</h1>
        <h2>Error ! <span>Page Not Found</span></h2>
      </div>
      <p>For Some Reason The Page You Requested Could Not Be Found On Our Server</p>
      <p><a href="{{URL::previous()}}">&laquo; Go Back</a> / <a href="{{url('admin')}}">Go Home &raquo;</a></p>
    </section>
  </div>
</div>
</body>
</html>