<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <script>
    var module=angular.module("adminmodule",[]);
        module.controller("admincontroller",function($scope,$http){
           $scope.jsonarray;
            $scope.category;
            $scope.check;
            $scope.dofetch=function()
            {
                $http.get("Json-Fetch-Users-for-Admin.php?category="+$scope.category).then(okfx,notokfx);
                function okfx(response)
                {
                    $scope.jsonarray=response.data;
                    
            }
                function notokfx(response)
                {
                    alert(response.data);
                }
            };
            $scope.doblock=function(uid)
            {
                $scope.check="Block";
                $http.get("Ajax-Block-User-forAdmin.php?uid="+uid+"&check="+$scope.check).then(okfx,notokfx);
                function okfx(response)
                {
                 alert(response.data);
                }
                function notokfx(response)
                {
                    alert(response.data);
                }
            };
            $scope.doresume=function(uid)
            {
                $scope.check="Resume";
                $http.get("Ajax-Block-User-forAdmin.php?uid="+uid+"&check="+$scope.check).then(okfx,notokfx);
                function okfx(response)
                {
                 alert(response.data);
                }
                function notokfx(response)
                {
                    alert(response.data);
                }
            };
            $scope.dodelete=function(uid)
            {
                $scope.check="Delete";
                $http.get("Ajax-Block-User-forAdmin.php?uid="+uid+"&check="+$scope.check).then(okfx,notokfx);
                function okfx(response)
                {
                 alert(response.data);
                }
                function notokfx(response)
                {
                    alert(response.data);
                }
            };
        });
    </script>
    <style>
    #content{
            margin: auto;
            margin-top: 10%;
            width: 90%;
            
        }
    </style>
</head>
<body ng-app="adminmodule" ng-controller="admincontroller">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,213.3C384,192,480,96,576,69.3C672,43,768,85,864,133.3C960,181,1056,235,1152,240C1248,245,1344,203,1392,181.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div id="container">
       <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#" style="font-size:30px; font-weight:500;">
                Manpowerservices.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Admin-Dash.php" style="font-size:20px; font-weight:500; color:grey; float:right;">Admin Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout-process.php" style="font-size:20px; font-weight:500; color:grey; float:right">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <div id="content">
            <center>
                <select ng-model="category">
                    <option value="Citizen">Citizen</option>
                    <option value="Worker">Worker</option>
                    </select>
                <div class=" btn btn-outline-dark" ng-click="dofetch();">Fetch Records</div>
                <br>
                <br>
                <br>
                 <br>
                <br>
                 <table width="90%" class="table table-striped">
                 <tr>
                     <td>
                         Name
                     </td>
                        <td>
                         Mobile
                     </td>
                        <td>
                         Date of Signup
                     </td>
                        <td>
                         Status
                     </td>
                     <td>
                         Block User
                     </td>
                     <td>
                         Resume User
                     </td>
                     <td>
                         Delete User
                     </td>
                 </tr>
                 <tr ng-repeat="obj in jsonarray">
                     <td>
                         {{obj.uid}}
                     </td>
                     <td>
                         {{obj.mob}}
                     </td>
                     <td>
                         {{obj.dos}}
                     </td>
                     <td>
                         {{obj.status}}
                     </td>
                     <td>
                         <div class="btn btn-outline-dark" ng-click="doblock(obj.uid);">Block</div>
                     </td>
                     <td>
                         <div class="btn btn-outline-dark" ng-click="doresume(obj.uid);">Resume</div>
                     </td>
                     <td>
                         <div class="btn btn-outline-dark" ng-click="dodelete(obj.uid);">Delete</div>
                     </td>
                 </tr>
                </table>
            </center>
        </div>
    </div>
 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,181.3C384,171,480,213,576,218.7C672,224,768,192,864,160C960,128,1056,96,1152,112C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>
</html>