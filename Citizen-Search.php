<html>

<head>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <title>Document</title>
    <script>
        var module = angular.module("workermodule",[]);
        module.controller("workercontroller", function($scope,$http) {
            $scope.jsonarray;
            $scope.jsonarray1;
            $scope.jsonarrayselected;
            $scope.jsonarrayselecteddetails;
            $scope.dofetchcategory = function() {
                $http.get("JSON-FETCH-CATEGORY-CITIZENS.php").then(okfx, notokfx);

                function okfx(response) {
                    $scope.jsonarray = response.data;
                    $scope.selectedcategory = $scope.jsonarray[0];
                }

                function notokfx(response) {
                    alert(response.data);
                }
            }
            $scope.dofetchcity = function() {
                $http.get("JSON-FETCH-CITY-CITIZENS.php").then(okfx, notokfx);

                function okfx(response) {
                    $scope.jsonarray1 = response.data;
                    $scope.selectedcity = $scope.jsonarray1[0];
                }

                function notokfx(response) {
                    alert(response.data);
                }
            };
            $scope.dofetchselected = function() {
                $http.get("JSON-FETCH-SELECTED-CITIZENS.php?category=" + $scope.selectedcategory.category + "&city="+$scope.selectedcity.city).then(okfx, notokfx);

                function okfx(response) {
                    $scope.jsonarrayselected = response.data;
                }

                function notokfx(response) {
                    alert(response.data);
                }
            };
            $scope.showdetails=function(uid)
            {
                $http.get("JSON-FETCH-CITIZENS-DETAILS.php?uid="+uid).then(okfx, notokfx);

                function okfx(response) {
                    $scope.jsonarrayselecteddetails = response.data;
               alert(JSON.stringify($scope.jsonarrayselecteddetails));
                }

                function notokfx(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="workermodule" ng-controller="workercontroller" ng-init="dofetchcategory(); dofetchcity();">
   
     
    <center>
       <!----card--->
       <div class="modal fade" id="datamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Worker Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <center>
                            <table class="table table-striped table-light" style="width:100%;">
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].cname}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].address}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].city}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    State
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].state}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contact
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].phone}}
                                </td>
                            </tr>
 <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    {{jsonarrayselecteddetails[0].email}}
                                </td>
                            </tr>
                            </table>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
        <h2>SEARCH CITIZENS</h2>
        <br>
        <br>
        <br>
        <h5>SELECT CATEGORY</h5>
        <select ng-model="selectedcategory" ng-options="obj.category for obj in jsonarray"></select>
        <br>
        <br>
        <br>
        <h5>SELECT CITY</h5>
        <select ng-model="selectedcity" ng-options="obj.city for obj in jsonarray1"></select>
        <br>
        <br>
        <br>
        <button class="btn btn-outline-dark" ng-click="dofetchselected();">Search</button>
        <!-----cardstarts----->
        <div class="container">
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonarrayselected">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Customer Uid: {{obj.uid}}</h5>
                            <!---<p class="card-text">Contact: {{obj.contact}}</p>-->
                            <p class="card-text">Task : {{obj.problem}}</p>
                        <p class="card-text">Location : {{obj.location}}</p>
                            <div ng-click="showdetails(obj.uid)" class="btn btn-outline-dark" data-toggle="modal" data-target="#datamodal">Show Details</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,181.3C384,171,480,213,576,218.7C672,224,768,192,864,160C960,128,1056,96,1152,112C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>

</html>
