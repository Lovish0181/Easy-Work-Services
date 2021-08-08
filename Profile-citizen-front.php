<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-1.8.2.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <style>
    #container{ 
        width:80%;
        height:100%;
        margin: auto;
        margin-top: 100px;
        }
        #previewprofilepic{
            width:200px;
            height: 200px;
            border: 2px solid grey;
            
        }
        
    </style>
    <script>
        function showpreview(file)
        {
            if(file.files && file.files[0])
                {
                    var reader= new FileReader();
                    reader.onload=function(ev)
                    {
                        $('#previewprofilepic').attr('src',ev.target.result);
                    }
                    reader.readAsDataURL(file.files[0]);
                }
        }
        </script>
        <script>
                $(document).ready(function(){
            $("#btnFetchProfile").click(function() {
                var uid = $("#txtuid").val();
                var url = "json-fetch-citizen-profile.php? uid=" + uid;
                $.getJSON(url, function(jsonaryresponse) {
                    alert(JSON.stringify(jsonaryresponse));

                    if (jsonaryresponse.length == 0)
                        alert("invalid id");
                    else {
                        $("#txtcname").val(jsonaryresponse[0].cname);
                        $("#txtphone").val(jsonaryresponse[0].phone);
                        $("#txtaddress").val(jsonaryresponse[0].address);
                        $("#txtcity").val(jsonaryresponse[0].city);
                        $("#txtstate").val(jsonaryresponse[0].state);
                        $("#txtemail").val(jsonaryresponse[0].email);
                        $("#previewprofilepic").attr(src, "uploads/" + jsonaryresponse[0].picname);
                        $("#hdn").val(jsonaryresponse[0].picname);
                        
                    }
                });
            });
        });

    </script>

</head>

<body>
    <div id="container">
       <div class="row-bg-danger">
                  <div class="col-md-12">
                      <center>
                          <h3>Profile-Citizen</h3>
                      </center>
                  </div>
              </div>
        <form action="profile-citizen-process.php" enctype="multipart/form-data" method="post">
               <input type="hidden" id="hdn" name="hdn">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >User Id</label>
                        <input type="text" name="txtuid" class="form-control" id="txtuid">
                        <span id="uidhelp">*</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">&nbsp;</label>
                        <input type="button" id="btnFetchProfile" class="form-control btn btn-secondary" value="Fetch Profile">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Citizen Name</label>
                        <input type="text" class="form-control" id="txtcname" name="txtcname">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="txtphone" name="txtphone">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="txtaddress"  id="txtaddress">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="txtcity" name="txtcity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">State</label>
                        <select id="txtstate" name="txtstate" class="form-control">
                            <option value="">--Select State--</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttaranchal">Uttaranchal</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Select Profile Pic</label>
                        <input type="file"  id="profilepic" name="profilepic" onchange="showpreview(this)">
                        <img src="Pics/download.png" id="previewprofilepic">
                    </div>
                    <div class="form-group col-md-5 mt-5">
                        <label for="">Email Id</label>
                        <input class="form-control" type="email" id="txtemail" name="txtemail" >
                    </div>
                </div>
                        <button type="submit" value="save" id="check" class="btn btn-outline-dark"  name="check" style="width:300px">Save</button>
                        <button type="submit" value="update"  name="check" id="check" class="  btn btn-outline-dark" style="width:300px">Update</button>
        </form>
    </div>

</body>

</html>
