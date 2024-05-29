<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Verify - PRO Check</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="js/instascan.js"></script>
        <script src="js/face-api.min.js"></script>
        <link rel="icon" type="image/x-icon" href="images/psa-philsys-logo.ico">
    </head>
    <body id="verify_wrapper">
        <div id="layoutVerification">
            <div id="layoutVerification_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"> 
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <img src="assets/img/pcheck2.png" width="250px" />   
                                            </div> 
                                            <div class="col-md-6">  
                                                <div style="text-align: right"><img src="assets/img/philsys-logo.png" width="150px" /></div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Put your face in front of the camera for verification.</div>
                                        <form>
                                            <div class="form-floating mb-3"> 
                                                <div class="container"> 
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div id="doc-scanner">
                                                                <center>
                                                                    <div id="video_preview">
                                                                        <video id="preview" width="550" height="550" ></video>
                                                                    </div><br />
                                                                    <select id="cameralist" style="display: none;"></select>
                                                                    <div id="result"></div>
                                                                </center>
                                                            </div>
                                                            <div id="face-scanner" style="display: none;">
                                                                <center>
                                                                    <div id="capture">
                                                                        <video id="inputVideo" width="550" height="550" autoplay muted></video>
                                                                        <canvas id="overlay" width="550" height="550"></canvas>
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            <div id="check-mark" style="display: none;">
                                                                <center>
                                                                    <img src="assets/gif/check-mark.gif"/> <br/>
                                                                    <span style="font-size: 72px">AUTHENTICATION SUCCESS!! YOU MAY CLAIM YOUR PRIZE!!</span>
                                                                </center>
                                                            </div>

                                                            <div id="alert-mark" style="display: none;">
                                                                <center>
                                                                    <img src="assets/gif/alert.gif"/><br/>
                                                                    <span style="font-size: 72px"><b style="color: #ff0000;">INTRUDER ALERT!! PLEASE CALL<br>PNP HOTLINE 117</b></span>
                                                                </center>
                                                            </div>
                                                            <div id="loading-mark" style="display: none;">
                                                                <center>
                                                                    <img src="assets/gif/tiger-loading.gif"/> <br/>
                                                                    <span style="font-size: 72px">Loading...</span>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div> 
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Not registered yet? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div> 
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/verify.js"></script>
    </body>
</html>
