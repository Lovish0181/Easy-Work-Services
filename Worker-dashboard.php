<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>worker</title>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <style>
    #container {
            margin: auto;
            width: 50%;
            margin-top: 100px;

        }

    .cardimg {
            background-position: center;
            background-repeat: no-repeat;
            margin-top: 20px;
         width: 230px;
            height: 220px;
        }

    .card-img {
            background-position: center;
            background-repeat: no-repeat;
            margin-top: 20px;
            width: 230px;
            height: 220px;
        }
    a , a:hover{
            text-decoration: none;
            color:black;
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
       $("#btnrate").click(function(){
        var cid=$("#txtci").val();
        var wid=$("#txtwi").val();
        var url="Ajax-Rating-Process.php?cid="+cid+"&wid="+wid;
        $.get(url,function(response){
            alert(response);
        });
    });
        });
    </script>
</head>
<body>
    <div id="container">
      <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="Dash-Citizen.php" style="font-size:30px; font-weight:500;">
                Manpowerservices.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:grey;">My Dashboard</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:grey; float:right">Home</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="logout-process.php" style="font-size:20px; font-weight:500; color:grey; float:right">Logout</a>
                    </li>
                    
                </ul>
            </div>

        </nav>
        <br>
        <br>
        <br>
       <div class="row">
           <div class="col-sm-6">       
           <a href="profile-worker-front.php">
           <div class="card bg-transparent" style="width: 20rem; height:20rem;">
           <center>
           <img src="Pics/undraw_profile_details_f8b7%20(1).svg" class="cardimg" alt="">
            <div class="card-body">
                <div class="card-title"><h4>Worker Profile</h4> </div>
            </div>
            </center>
                    </div>
                    </a>
                    </div>
        <div class="col-sm-6">
           <a href="#" data-toggle="modal" data-target="#modaldash"
>
            <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                <center>
                    <img src="Pics/undraw_accept_request_vdsd%20(1).svg" class="card-img" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Rating</h4>
                    </div>
                </center>
            </div>
            </a>
        </div>
        </div>
        <div class="row mt-5">
         <div class="col-sm-6">
           <a href="Citizen-Search.php"
>
            <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                <center>
                    <img src="Pics/undraw_people_search_wctu.svg" class="card-img" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Find Work</h4>
                    </div>
                </center>
            </div>
            </a>
        </div>
          <div class="col-sm-6">
           <a href="#"
>
            <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                <center>
                    <img src="Pics/undraw_personal_settings_kihd.svg" class="card-img" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                    </div>
                </center>
            </div>
            </a>
        </div>
          </div>
          <!------------->
          <div class="modal" tabindex="-1" role="dialog" id="modaldash">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
          <div class="col-md-6">
        <label>Citizen Id</label>
        <input type="text" id="txtci" name="txtci">
             </div>
             <div class="col-md-6">
                 <label>Worker Id</label>
        <input type="text" id="txtwi" name="txtwi"value="<?php echo $_SESSION['activeuser'];?>" readonly>
             </div>
          </div>
            <div class="row">
             <div class="col-md-6 mt-2">
        <button type="button" class="btn btn-dark" id="btnrate" data-dismiss="modal" name="btnrate">
            Send Request</button>
             </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,181.3C384,171,480,213,576,218.7C672,224,768,192,864,160C960,128,1056,96,1152,112C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      </body>
      </html>