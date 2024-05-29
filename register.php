<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - PRO Check</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <script src="js/jspdf.min.js"></script>
        <link rel="icon" type="image/x-icon" href="images/psa-philsys-logo.ico">
    </head>
    <body class="bg-light">
        <div id="reg_wrapper">  
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-8"> 
                                                    <img src="assets/img/pcheck2.png" width="250px" />   
                                                </div> 
                                                <div class="col-md-4">  
                                                    <div style="text-align: right"><img src="assets/img/philsys-logo.png" width="150px" /></div>
                                                </div>
                                            </div> 
                                            <!-- <h3 class="text-center font-weight-light my-4">PRO Check Registration</h3> -->
                                        </div>
                                        <div class="card-body"> 
                                            <div class="small mb-3 text-muted">To register, provide your nickname, email address, and take a photo.</div>
                                       
                                            <!-- <form>  -->
                                                <!-- <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputNickname" type="text" />
                                                    <label for="inputNickname">Nickname</label>
                                                </div>    -->
                                                <div class="row">   
                                                    <div class="col-md-6">   
                                                        <label for="inputNickname">Nickname</label>
                                                        <input class="form-control" name="visitor_nickname" id="visitor_nickname" type="text" />
                                                    </div> 
                                                    <div class="col-md-6">        
                                                        <label for="capture">Image</label> <br/>   
                                                        <button type="button" id="capture" onclick="camera()" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg"> 
                                                            <i class="fa-solid fa-camera"></i> Capture Image
                                                        </button>  
                                                    </div> 
                                                    <div class="col-md-6">   
                                                        <label for="inputEmail">Email</label>
                                                        <input class="form-control" name="visitor_email" id="visitor_email" />
                                                    </div> 
                                                    <div id="qrcode-container" style="display: none;">
                                                        <div id="qrcode2" class="qrcode2"></div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-3 mb-md-0">
                                                                <label for="inputPassword">Capture Image</label> 
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
                                                        </div>
                                                    </div> 
                                                </div> -->
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid"><button class="btn btn-primary btn-block" id="mySubmit">Register</button></div>
                                                </div>
                                            <!-- </form> -->
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div> 
            </div> 
        </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script> 
    </body>
    
    
    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration - Capture Image</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <center><video id="video" width="720" height="540" autoplay></video></center>
                            <center><canvas id="video_canvas" width="720" height="540" style="display: none;"></canvas></center>
                            <!-- <textarea id="dataurl" style="display: none;" readonly></textarea> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="click-photo">Capture Image</button>
                        <button type="button" class="btn btn-primary" id="click-recapture" style="display: none;">Recapture Image</button>
                    </div>
            </div>
        </div>
    </div>
</html>
<script type="text/javascript" src="js/register.js"></script>
<script> 
    function camera () {
        $('#myModal').modal('show'); 
    } 
   
</script>