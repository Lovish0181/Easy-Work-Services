
  1
  2
  3
  4
  5
  6
  7
  8
  9
 10
 11
 12
 13
 14
 15
 16
 17
 18
 19
 20
 21
 22
 23
 24
 25
 26
 27
 28
 29
 30
 31
 32
 33
 34
 35
 36
 37
 38
 39
 40
 41
 42
 43
 44
 45
 46
 47
 48
 49
 50
 51
 52
 53
 54
 55
 56
 57
 58
 59
 60
 61
 62
 63
 64
 65
 66
 67
 68
 69
 70
 71
 72
 73
 74
 75
 76
 77
 78
 79
 80
 81
 82
 83
 84
 85
 86
 87
 88
 89
 90
 91
 92
 93
 94
 95
 96
 97
 98
 99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
217
218
219
220
221
222
223
224
225
226
227
228
229
230
231
232
233
234
235
236
237
238
239
240
241
242
243
244
245
246
247
248
249
250
251
252
253
254
255
256
257
258
259
260
261
262
263
264
265
266
267
268
269
270
271
272
273
274
275
276
277
278
279
280
281
282
283
284
285
286
287
288
289
290
291
292
293
294
295
296
297
298
299
300
301
302
303
304
305
306
307
308
309
310
311
312
313
314
315
316
317
318
319
320
321
322
323
324
325
326
327
328
329
330
331
332
333
334
335
336
337
338
339
340
341
342
343
344
345
346
347
348
349
350
351
352
353
354
<!DOCTYPE html>
<?php
    session_start();
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="CSS/Dash-citizen.css" rel="stylesheet" type="text/css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>

    <!--=-=-=-Ajax Request=-=-=-=--->
    <script>
        $(document).ready(function() {
            $("#btnpostwork").click(function() {
                var uid = $("#txtUid").val();
                var Category = $("#txtCategory").val();
                var workinfo = $("#txtWorkinfo").val();
                var Location = $("#txtLocation").val();
                var City = $("#txtCity").val();
                var url = "Ajax-citizen-postwork.php?uid=" + uid + "&Category=" + Category + "&workinfo=" + workinfo + "&Location=" + Location + "&City=" + City;
                $.get(url, function(response) {
                    alert(response);
                });

            });
        });

    </script>

    <!---=-=-=-=-Angular=-=-=-=-=-->
    <script>
        var Module = angular.module("RequirementModule", []);
        Module.controller("RequirementController", function($scope, $http) {
            $scope.jsonArray;
            $scope.doloadRequirements = function() {
                var activeuid = angular.element(document.getElementById("activeuid"));
                var uidvalue = activeuid.val();
                /*alert(uidvalue);*/
                $http.get("Json-Fetchall_Requirements.php?uid=" + uidvalue).then(okFx, notokFx);

                function okFx(response) {
                    /*alert(JSON.stringify(response.data));*/
                    $scope.jsonArray = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }

            }

            $scope.doDel = function(rid) {
                /*alert(rid);*/
                $http.get("Delete-Record-from-Requirement-Manager.php?rid=" + rid).then(okFx, notokFx);

                function okFx(response) {
                    alert(response);
                }

                function notokFx(response) {
                    alert(response);
                }
            }

        });

    </script>
</head>

<body ng-app="RequirementModule" ng-controller="RequirementController" ng-model="uid1">
    <svg id="top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#6C63FF" fill-opacity="0.93" d="M0,0L30,21.3C60,43,120,85,180,90.7C240,96,300,64,360,64C420,64,480,96,540,128C600,160,660,192,720,170.7C780,149,840,75,900,69.3C960,64,1020,128,1080,160C1140,192,1200,192,1260,176C1320,160,1380,128,1410,112L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
    </svg>
    <div id="overall-container">
        <!--=-=-=-=-=Navbar Start Here-=-=-=-=-=--->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="Dash-Citizen.php" style="font-size:40px; font-weight:500;">
                Mps.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:white;"><i class="fa fa-tachometer" style="font-size:20px; "></i> &nbsp;My Dashboard</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:white; float:right">Home</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="logout-process.php" style="font-size:20px; font-weight:500; color:white; float:right">Logout</a>
                    </li>
                    
                </ul>
            </div>

        </nav>
        <!--=-=-=-=-=Navbar Ends Here-=-=-=-=-=--->

        <!--=-=-=-=-=-=-=-Cards=-=-=-=-=-=-=--->
        <center>
            <div class="card-deck  mt-lg-5" style="width:90%;">
                <!--=-=-Profile Card=-=-=-->
                <div class="card">
                    <a href="Profile-citizen-front.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_profile_details_f8b7.svg">
                        </div>
                        <center>
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text">Edit Your Profile Information Here</p>
                            </div>
                        </center>

                    </a>
                </div>
                <!--=-=-Work Post Card=-=-=-->
                <div class="card">
                    <a href="#" data-toggle="modal" data-target="#PostworkModal">
                        <div class="cardimage">
                            <img src="Pics/undraw_publish_post_vowb.svg" class="card-img-top1" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Post Work</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                        </div>

                    </a>
                </div>
                <!--=-=-=-Requirement Manager Card=-=-=-=--->
                <div class="card">
                    <a href="#" data-toggle="modal" data-target="#RequirementModal" ng-click="doloadRequirements();">
                        <div class="cardimage">
                            <img src="Pics/undraw_file_manager_j85s.svg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Requirement Manager</h5>
                            <input type="hidden" value='<?php echo $_SESSION["activeuser"];?>' id="activeuid">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                        </div>

                    </a>
                </div>
                <!--=-=-Search Worker Card=-=-=-->

                <div class="card">
                    <a href="Worker-search-bycitizen.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_people_search_wctu.svg" class="card-img-top1" alt="...">
                        </div>
                        <center>
                            <div class="card-body">
                                <h5 class="card-title">Search Workers</h5>
                                <p class="card-text">Find Workers Here</p>
                            </div>
                        </center>

                    </a>
                </div>
            </div>
        </center>
        <center>
            <div class="mt-lg-5" style="width:80%;">
                <!--=-=-Raings Card=-=-=-->
                <div class="row">
                    <div style="width:50%;">
                        <div class="card" style="width:60%;">
                            <a href="Rate-worker-front.php">
                                <div class="cardimage">
                                    <img src="Pics/undraw_personal_goals_edgd.svg">
                                </div>
                                <center>
                                    <div class="card-body">
                                        <h5 class="card-title">Raings Manager</h5>
                                        <p class="card-text">Edit Your Ratings Information Here</p>
                                    </div>
                                </center>

                            </a>
                        </div>
                    </div>
                    <!--=-=-Settings Card=-=-=-->
                    <div  style="width:50%;">
                        <div class="card" style="width:60%;">
                            <a href="#" data-toggle="modal" data-target="#PostworkModal">
                                <div class="cardimage">
                                    <img src="Pics/undraw_personal_settings_kihd.svg" class="card-img-top1" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Settings</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--=-=-=-=Modal For Work Post Card-=-=--==-->
        <div class="modal fade " id="PostworkModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post Work Here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Category of Work</label>
                                    <select id="txtCategory" name="txtCategory" class="form-control" tabindex="5">
                                        <option selected>Choose...</option>
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
                                <label>Details of Work</label>
                                <input type="text" class="form-control" id="txtWorkinfo" name="txtWorkinfo">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Location of Task</label>
                                        <input type="text" class="form-control" id="txtLocation" name="txtLocation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="txtCity" name="txtCity">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <input type="button" value="Post Work" class="btn btn-success cen" id="btnpostwork">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--=-=-=-=-Requirement Manager Modal=-=-=-=--->
        <div class="modal fade" id="RequirementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Past Posts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <table width="100%" border="1">
                                <tr>
                                    <td width="10%" align="center">
                                        Category
                                    </td>
                                    <td width="20%" align="center">
                                        Problem
                                    </td>
                                    <td width="20%" align="center">
                                        Location
                                    </td>
                                    <td width="20%" align="center">
                                        City
                                    </td>
                                    <td width="20%" align="center">
                                        Date of Post
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr ng-repeat="obj in jsonArray">
                                    <td width="10%" align="center">
                                        {{obj.category}}
                                        <input type="hidden" value={{obj.rid}}>
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
                                    <td width="20%" align="center">
                                        {{obj.dop}}
                                    </td>
                                    <td>
                                        <input value="Delete Record" type="button" ng-click="doDel(obj.rid);">
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>