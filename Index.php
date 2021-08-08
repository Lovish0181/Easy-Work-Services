        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyProject2020</title>
        <script src="js/jquery-1.8.2.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <script src="js/bootstrap.min.js">
    </script>
   
    <style>
     #passwordBlock
        {
            display: flex;
            width:100%;
            align-items: center;
            border:1px solid #d3d3d3;
            border-radius: 5px;
        }
        #txtPwdLogin
        {
            border: none;
            border-right: 1px solid #d3d3d3;
            border-radius: 0px;
        }
        #eye-show-hide
        {
            margin: 0px 10px;
            
        }
        .card-img {
            background-position: center;
            background-repeat: no-repeat;
            margin-top: 20px;
            width: 250px;
            height: 250px;
        }
        .card
        {
            box-shadow:0px8px0px8px darkgray;
            border: .2px black solid;
        }
        .card:hover{
            box-shadow: 0px 0px 3px 3px dimgray;
            
        }
    </style>
        <script>
    $(document).ready(function(){
       /* <!---==-=-Ajax-uid---->*/
        $("#txtuid").blur(function(){
           var uid=$("#txtuid").val();
            var check="validateuid";
            var actionurl="ajax-signup-process.php? uid="+uid+"&check="+check;
            $.get(actionurl,function(response){
               $("#uidhelp").html(response); 
            });
            
        });
        /*<!---==-=-=--Ajax-mobile--=-=-=-=>*/
            $("#txtmob").blur(function(){
       var mob= $("#txtmob").val();
            var check="validatemob";
            var actionurl="ajax-signup-process.php? mob="+mob+"&check="+check;
            $.get(actionurl,function(response){
               $("#mobhelp").html(response); 
            });
    });
        /*<---=-=-=-=password---=-=-=-->*/
            $("#txtpwd").blur(function(){
       var pass=$(this).val();
        var validpass = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
        if(validpass.test(pass)==false)
        {
        $("#passhelp").html("Password Must Have : <li>1 Special Charcter</li> <li> 1 Number</li> <li> 1 LowerCase Letter</li> <li> 1 UpperCase Letter</li>").css("color", "red");
    }
                else
        {
        $("#passhelp").html("Alright").css("color", "green");
    }
    });
        /*<--=-=-=--=-Ajax-signup-=-=-=-->*/
            $("#btnsignupsubmit").click(function(){
            var uid=$("#txtuid").val();
            var pwd=$("#txtpwd").val();
            var mob=$("#txtmob").val();
        var radvalue=$('input:radio[name=radio]:checked').val();
        var check="signup";
        var actionurl="ajax-signup-process.php? uid="+uid+"&pwd="+pwd+"&mob="+mob+"&check="+check+"&category="+radvalue;
        $.get(actionurl,function(response){
       $("#submitresponse").html(response); 
    });
    });
         /*<--=-=-=--=-Ajax-login-=-=-=->*/
            $("#btnlogin").click(function(){
            var uid=$("#txtloginuid").val();
            var pwd=$("#txtPwdLogin").val();
        var check="login";
        var actionurl="ajax-signup-process.php? uid="+uid+"&pwd="+pwd+"&check="+check;
        $.get(actionurl,function(response){
        
    if (response == "Citizen") {
                        location.href = "Citizen-dashboard.php";
                    } else
                    if (response == "Worker") {
                        location.href = "Worker-dashboard.php";
                    } else if (response == "Admin") {
                        location.href = "Admin-Dash.php";
                    }
    });
        });
           /* <--=-=-=--=-Ajax-forgot password-=-=-=->*/
            $("#btnforgot").click(function(){
            var uid=$("#txtuid").val();
        if(uid=="")
        {
         $("#uidforgothelp").html("Please Enter Your Uid");
                    return;
        
    }
        var check="forgotpass";
        var actionurl="ajax-signup-process.php? uid="+uid+"&check="+check;
        $.get(actionurl,function(response){
            if (response.length == 0) {
                        $("#forgotresponse").html("<font style='font-size:30px;'>Invalid Id</font>");
                    } else
                        $("#forgotresponse").html("Your Password is : <font style='font-size:30px;'>".concat(response).concat("</font>"));
    });
    });
    });    
    </script>
        <script type="text/javascript">
        function doShowpwd() {
            var initial = document.getElementById("eye-show-hide");
            var pwd = document.getElementById("txtPwdLogin");
            if (pwd.type == "password") {
                pwd.type = "text";
                initial.className = "fa fa-fw fa-eye-slash";
            } else {
                pwd.type = "password";
                initial.className = "fa fa-fw fa-eye";
            }
        }

    </script>
        
</head>
<body>
   <div id="container">
   <div id="nav-top">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:transparent;">
    <a href="#" style="color:Black;">
    <img src="Pics/logo.png" style="height:50px;width:40px">&nbsp;&nbsp;Manpowerservices.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active mt-2 text-center">
        <a class="nav-link" href="#" style="float:right">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mt-2  text-center">
        <button type="button"  class="btn" data-target="#signupmodal" data-toggle="modal">Signup</button>
      </li>
      
      <li class="nav-item mt-2 text-center">
        <button type="button" class="btn" data-target="#loginmodal" data-toggle="modal">Login</button>
      </li>
       <li class="nav-item mt-2 text-center">
        <button type="button" class="btn" data-target="#forgotpassmodal" data-toggle="modal">Forgot Password</button>
      </li>
    </ul>
  </div>
</nav>
       </div>
        <!--=-=-=Carousel Div-=-=-=--->
                <div id="carousel-div">
                    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Pics/patrick-tomasso-1NTFSnV-KLs-unsplash.jpg" style="width:100%;height:750px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="Pics/todd-quackenbush-IClZBVw5W5A-unsplash.jpg" style="width:100%;height:750px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="Pics/person-holding-paint-roller-while-painting-the-wall-994164.jpg" class="d-block w-100" style="width:100%;height:750px" alt="...">
                            </div>
                               <div class="carousel-item">
                                <img src="Pics/davids-kokainis-wah9pnO9G6k-unsplash.jpg" class="d-block w-100" alt="..." style="width:100%;height:750px">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!----cards---->
                 <div id="cards-div">
                   <center>
                    <h3>Our Services</h3>
                    <div class="card-deck m-5">
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_under_construction_46pa.svg" class="card-img" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Find Work</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam provident delectus fugit placeat dolores necessitatibus mollitia soluta unde, similique neque.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_hiring_cyhs.svg" class="card-img" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Find Workers</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, animi? Obcaecati doloribus dicta corporis officia optio, eligendi accusantium, deleniti eius!</p>
                            </div>
                        </div>
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_contract_uy56.svg" class="card-img" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">More than 50 types of Services</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime esse asperiores repellat molestiae dolorum nesciunt! Consectetur assumenda doloremque laboriosam nesciunt.</p>
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
                <h3 style="text-align: center; margin-top: 100px;font-size: 50px;"> Meet the Developers</h3>
                <br>
                <br>
                <br>
                <center>
                   <div  class="row">
                    <div class="col-md-8">
                        <div class="card mb-5" >
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="Pics/20200209_223831.jpg" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8 ">
                                    <div class="card-body table-responsive">
                                        <h5 class="card-title">Developer</h5>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>Lovish Jindal</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th >College</th>
                                                    <td>Thapar Insitute of Engineering and Technology</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th >Contact</th>
                                                    <td>7087309381</td>
                                                    
                                                </tr>
                                                                                     </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ml-auto">
                           <div class="card mb-3 ml-5" >
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="Pics/RajeshSir.jpg" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body table-responsive">
                                        <h5 class="card-title">Under the Guidance of</h5>
                                        <table class="table">
                                            
                                                <tr>
                                                    <th>Baba Ji</th>
                                                    <td>Rajesh K Bansal</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th >Owner At</th>
                                                    <td>Banglore Computer Education Bathinda </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th >Contact</th>
                                                    <td>9872246056</td>
                                                    
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <br
>                <h1>Reach Us</h1>
                <br>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8807337916064!2d74.95013941511905!3d30.21195128182175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594944494723!5m2!1sen!2sin" width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                
                </center>
<!-----signup modal----->
<div class="modal" tabindex="-1" role="dialog" id="signupmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Signup-Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="txtuid">User Id</label>
    <input type="text" class="form-control" id="txtuid" >
    <small id="uidhelp" class="form-text ">*</small>
  </div>
  <div class="form-group">
    <label for="txtpwd">Password</label>
    <input type="password" class="form-control" id="txtpwd">
    <small id="passhelp" class="form-text">*</small>
  </div>
  <div class="form-group">
    <label for="txtmob">Mobile</label>
    <input type="text" class="form-control" id="txtmob">
    <small id="mobilehelp" class="form-text">*</small>
  </div>
  
  <div class="form-group form-check">
   <label>Signup As:</label>
    <input type=radio class="radcitizen" name="radio" value="Citizen">Citizen
    <input type=radio class="radworker" name="radio"  value="Worker">Worker
  </div>
  <button type="button" class="btn btn-dark" id="btnsignupsubmit">Submit</button>
<span id="submitresponse">*</span>
     </form>
      </div>
    </div>
  </div>
</div>
<!-----login modal----->
<div class="modal" tabindex="-1" role="dialog" id="loginmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="txtloginuid">User Id</label>
    <input type="text" class="form-control" id="txtloginuid">
    <small id="loginuidhelp" class="form-text">*</small>
  </div>
  <div class="form-group">
    <label for="txtloginpwd">Password</label>
    <div id="passwordBlock">
    <input type="password" class="form-control" id="txtPwdLogin" name="txtPwdLogin">
    <span id="eye-show-hide" class="fa fa-fw fa-eye" onclick="doShowpwd()" style="cursor:pointer;"></span>
  </div>
  <button type="button" class="btn btn-dark mt-3" id="btnlogin">Login</button>
<span id="loginresponse">*</span>
            </div>
     </form>
      </div>
    </div>
  </div>
       </div>
  <!-----forgot password modal----->
<div class="modal" tabindex="-1" role="dialog" id="forgotpassmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="txtforgotuid">User Id</label>
    <input type="text" class="form-control" id="txtforgotuid" url="txtforgotuid">
    <small id="forgotuidhelp" class="form-text">*</small>
  </div>
  <button type="button" class="btn btn-dark" id="btnforgot">Get Password</button>
<span id="forgotresponse">*</span>
          </form>
            </div>
      </div>
    </div>
  </div>
  
</div>
</body>
</html>