<?php 
session_start();
?>
<html>

<head>
    <title>Dashboard</title>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <script>
        <!---AJAX--->
        $(document).ready(function()

        {

        $("#prbtn").click(function()

        {
        var uid=$("#txtuid").val();
        var category=$("#txtcategory").val();
        var problem=$("#txtprob").val();
        var location=$("#txtloc").val();
        var city=$("#txtcity").val();
        var actionurl="post-requirement-process.php?uid="+uid+"&category="+category+"&problem="+problem+"&location="+location+"&city="+city;

        $.get(actionurl,function(response)

        {

        alert(response);

        });

        });

        });
    </script>
    <script>
        <!---angular--->
        var cmodule=angular.module("citizenmodule",[]);
        cmodule.controller("citizencontroller",function($scope,$http)
        {
        $scope.jsonarray;
        $scope.dofetchdetails=function()
        { var activeuid=angular.element(document.getElementById("activeuid"));
         var uidvalue=activeuid.val();
        $http.get("JSON-FETCHALL-REQUIREMENTS.php?uid="+uidvalue).then(okfx,notokfx);

        function okfx(response)

        {

        $scope.jsonarray=response.data;
alert(JSON.stringify( $scope.jsonarray));
        }

        function notokfx(response)
        {

        alert(response.data);
        }

        };

        
        $scope.dodel=function(rid)
        {
            $http.get("DELETE-RECORD-FROM-REQ-MANAGER.php?rid="+rid).then(okfx,notokfx)
            function okfx(response)
            {
                alert(response);
            }
            function notokfx(response)
            {
                alert(reponse);
            }
        };
});




    </script>
    <style>
        #container {
            margin: auto;
            width: 70%;
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

        a,
        a:hover {
            text-decoration: none;
            color: black;
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
</head>

<body  ng-app="citizenmodule" ng-controller="citizencontroller" ng-model="uid1">
   
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
            <div class="col-sm-4">
                <a href="profile-citizen-front.php">
                    <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                        <center>
                            <img src="Pics/undraw_profile_details_f8b7%20(1).svg" class="cardimg" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Citizen Profile</h4>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <!----postwork----->
            <div class="col-sm-4">
                <a href="#" data-toggle="modal" data-target="#modaldash" >
                    <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                        <center>
                            <img src="Pics/undraw_publish_post_vowb%20(1).svg" class="card-img" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Post Work</h4>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <!-----req manager--->
            <div class="col-sm-4">
                <a href="#" data-toggle="modal" data-target="#modalreq" ng-click="dofetchdetails();">
                    <div class="card bg-transparent">
                        <center>
                            <img src="Pics/undraw_accept_tasks_po1c%20(1).svg" class="card-img" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Requirement Manager</h4>
                                <input type="hidden" value='<?php echo $_SESSION["activeuser"];?>' id="activeuid">
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <!-----search worker------>        
        <div class="row">
              <div class="col-sm-4 mt-5">
                <a href="Worker-Search.php">
                    <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                        <center>
                            <img src="Pics/undraw_people_search_wctu.svg" class="card-img" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Search Workers</h4>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <!-----ratings----->
            <div class="col-sm-4 mt-5">
                <a href="Rate-worker-front.php">
                    <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                        <center>
                            <img src="Pics/undraw_personal_goals_edgd.svg" class="card-img" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Ratings Manager</h4>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <!-=-=-=-settings card=-=-=-=->
            <div class="col-sm-4 mt-5">
                <a href="#" data-toggle="modal" data-target="#">
                    <div class="card bg-transparent" style="width: 20rem; height:20rem;">
                        <center>
                            <img src="Pics/undraw_personal_settings_kihd.svg" class="card-img" alt="">
                            <br>
                            <div class="card-body">
                                <h4 class="card-title">Settings</h4>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--modals---------------->
    <div class="modal fade" tabindex="-1" role="dialog" id="modaldash">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post Requirement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="post-requirement-process.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                                <input type="text" class="form-control" id="txtuid" name="txtuid" value='<?php echo $_SESSION["activeuser"];?>' disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Category</label>
                                <select name="txtcategory" id="txtcategory" class="form-control">
                                    <option value="">---Category---</option>
                                    <option value="Plumber">Plumber</option>
                                    <option value="Wood Work">Wood Work</option>
                                    <option value="AC Repair">AC Repair</option>
                                    <option value="Appliance Repair">Appliance Repair</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Carpenter">Carpenter</option>
                                    <option value="Dry Cleaning">Dry Cleaning</option>
                                    <option value="Disinfection">Disinfection</option>
                                    <option value="Cleaning Services">Cleaning Services</option>
                                    <option value="Car Repair">Car Repair</option>
                                    <option value="Bricks Man">Bricks Man</option>
                                    <option value="Painter">Painter</option>
                                    <option value="Flooring Services">Flooring Services</option>
                                    <option value="Metal Framing">Metal Framing</option>
                                    <option value="Wooden Flooring">Wooden Flooring</option>
                                    <option value="Tiling Services">Tiling Services</option>
                                    <option value="Kitchen Repair">Kitchen Repair</option>
                                    <option value="Sofa Cleaning">Sofa Cleaning</option>
                                    <option value="Computer Repair">Computer Repair</option>
                                    <option value="Metal Work">Metal Work</option>
                                    <option value="Wooden Framing">Wooden Framing</option>
                                    <option value="Glass Door Services">Glass Door Services</option>
                                    <option value="Other">Others…</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>What is the Problem ?</label>
                                <input type="text" class="form-control" id="txtprob" name="txtprob">
                        </div>
                        <div class="form-group">
                           <div class="row">
                            <div class="col-md-8">
                                <label>Location Of Task</label>
                                <input type="text" name="txtloc" id="txtloc">
                            </div>
                        
                           
                            <div class=" form-group col-md-4">
                                <label>City</label>
                                <input type="text" name="txtcity" id="txtcity">
                            </div>
                        </div>
                           </div>
                            <center>
                        <button type="button" class="btn btn-dark mt-3" id="prbtn" data-dismiss="modal">Post Requirement</button>
                        </center>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---for details req manager----->
    <div class="modal" tabindex="-1" role="dialog" id="modalreq">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REQUIREMENT MANAGER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <table width="100%" border="1">
                            <tr>
                                <td align="center" width="10%">Category</td>
                                <td align="center" width="20%">Date of Post</td>
                                <td align="center" width="20%">Problem</td>
                                <td align="center" width="20%">Location</td>
                                <td align="center" width="20%">City</td>
                                <td> </td>
                            </tr>
                            <tr ng-repeat="obj in jsonarray">
                                <td width="10%" align="center">
                                    {{obj.category}}
                                    <input type="hidden" value={{obj.rid}}></td>
                                <td width="20%" align="center">
                                       {{obj.date}}
                                </td>
                                <td width="20%" align="center">
                                 {{obj.problem}}
                                </td>
                                <td width="20%" align="center">
                                    {{obj.location}}
                                </td>
                                <td width="20%" align="center">
                                    {{obj.city}}
                                </td>
                                <td>
                                    <input type="button" ng-click="dodel(obj.rid);" value="Delete Record">
                                </td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,181.3C384,171,480,213,576,218.7C672,224,768,192,864,160C960,128,1056,96,1152,112C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>

</html>
