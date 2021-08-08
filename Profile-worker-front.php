<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <script src="js/jquery-1.8.2.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <style>
    #container
    { width:80%;
        margin: auto;
        margin-top: 100px;
        }
        
    </style>
    <script>
        function showpreview2(file)
        {
        if(file.files && file.files[0])
            {
                var reader= new FileReader();
                reader.onload=function(ev){
                    $("#previewprofilepic").attr('src',ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        function showpreview1(file)
        {
        if(file.files && file.files[0])
            {
                var reader= new FileReader();
                reader.onload=function(ev){
                    $("#previewaadharpic").attr('src',ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
    </script>
    <script>
    $(document).ready(function(){
   
        $("#btnFetchProfile").click(function(){
            var uid=$("#txtuid").val();
            var url="json-fetch-worker-profile.php? uid="+uid;
            $.getJSON(url,function(jsonaryresponse){
                     /*alert(JSON.stringify(jsonaryresponse));*/
            if(jsonaryresponse.length==0)
                $("#uidhelp").html("Invalid Id");
                else
                    {
                        $("#txtemail").val(jsonaryresponse[0].email);
                        $("#txtwname").val(jsonaryresponse[0].wname);
                        $("#txtphone").val(jsonaryresponse[0].phone);
                        $("#txtfirm").val(jsonaryresponse[0].firm);
                        $("#txtcity").val(jsonaryresponse[0].city);
                        $("#txtaddress").val(jsonaryresponse[0].address);
                        $("#txtstate").val(jsonaryresponse[0].state);
                        $("#txtcategory").val(jsonaryresponse[0].category);
                        $("#txtspl").val(jsonaryresponse[0].spl);
                        $("#txtexp").val(jsonaryresponse[0].exp);
                        $("#txtinfo").val(jsonaryresponse[0].info);
                        $("#previewaadharpic").attr(src,"uploads/"+jsonaryresponse[0].aadharpic);
                        $("#previewprofilepic").attr(src,"uploads/"+jsonaryresponse[0].profilepic);
                        $("#hdn1").val(jsonaryresponse[0].aadharpic);
                        $("#hdn2").val(jsonaryresponse[0].profilepic);
                    }
            });
            
        });
        
    });
    </script>
    </head>
    <body>
        <div id="container">
                     <form action="profile-worker-process.php" method="post" enctype="multipart/form-data">

              <div class="row-bg-danger">
                  <div class="col-md-12">
                      <center>
                          <h3>Profile-Worker</h3>
                      </center>
                  </div>
              </div>
            <input type="hidden" id="hdn2" name="hdn1">
            <input type="hidden" id="hdn2" name="hdn2">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">User Id</label>
                        <input type="text" name="txtuid" class="form-control" id="txtuid">
                        <span id="uidhelp">*</span>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="">Email Id</label>
                        <input class="form-control" type="email" id="txtemail" name="txtemail">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">&nbsp;</label>
                        <input type="button" id="btnFetchProfile" class="form-control btn btn-secondary" value="Fetch Profile">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Worker Name</label>
                        <input type="text" class="form-control" id="txtwname" name="txtwname">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" id="txtphone" name="txtphone">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-12">
                        <label for="">Firm/Shop Name</label>
                        <input type="text" class="form-control" id="txtfirm" name="txtfirm">
                    </div>
                   </div>
                        
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="txtaddress" name="txtaddress">
                    </div>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="txtcity" name="txtcity">
                    </div>
                    <div class="form-group col-md-6">
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
                   <div class=" form-group col-md-4">
                    <label>category</label>
                    <select id="txtcategory" name="txtcategory" class="form-control">
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
                    <div class="form-group col-md-5">
                    <label>Specialization</label>
                    <input type="text" name="txtspl" id="txtspl" class="form-control">
                    </div>
                   <div class=" form-group col-md-3">
                    <label>Experience(In Years)</label>
                    <input type="number" id="txtexp" name="txtexp" class="form-control">
                    </div>
                    </div>
                    <div class="form-group col-md-12">
                    <label>Previous Work Experience / Other Info (250 Words)</label>
                    <textarea class="col-md-12" rows="10" cols="30" id="txtinfo" name="txtinfo">..................</textarea>
                    
                    </div>
                
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Upload Aadhar Pic</label>
                        <input type="file" class="form-control" id="aadharpic" name="aadharpic" onchange="showpreview1(this);">
                        <img src="Pics/adhar.png" id="previewaadharpic" style="width:200px;height:200px; border:1px solid black">
                    </div>
                       <div class="form-group col-md-6">
                        <label for="">Upload Profile Pic</label>
                        <input type="file" class="form-control" id="profilepic" name="profilepic" onchange="showpreview2(this);">
                        <img src="pics/download.png" id="previewprofilepic" style="width:200px;height:200px; border:1px solid black">
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <center>
                            <button type="submit" name="check" value="save" class="btn btn-outline-dark" style="width:200px" id="check">Save</button>
                            <button type="submit" name="check" value="update" class="  btn btn-outline-dark" id="check" style="width:200px">Update</button>
                        </center>
                    </div>
                </div>
        </form>
            </div>
    </body>
</html>