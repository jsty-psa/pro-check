let video = document.getElementById("video");
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var submit = document.getElementById("mySubmit");
var reset = document.getElementById("myReset");
var span = document.getElementById("modalClose");

let click_photo = document.querySelector("#click-photo");
let click_recapture = document.querySelector("#click-recapture");
// let canvas = document.querySelector("#canvas");
// let canvas2 = document.querySelector("#canvas2");
let video_canvas = document.querySelector("#video_canvas");
let image_data_url = null;
let qr_base64 = null;

var img_background  = new Image();
getBase64Image("/pro-check-legit/images/download-793x597.png");

start_camera();

async function start_camera() {
    let stream = null;

    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
    }
    catch(error) {
        alert(error.message);
        return;
    }

    video.srcObject = stream;
}

function getBase64Image(data_url) {
    var myCanvas = document.createElement('canvas');
    myCanvas.width = 793;
    myCanvas.height = 597;
    var ctx = myCanvas.getContext('2d');
    ctx.width = 793;
    ctx.height = 597;
    var img = new Image();
    img.onload = function() {
        ctx.drawImage(img,0,0);
        img_background.src = myCanvas.toDataURL('image/png');
    };
    img.src = data_url;
}

click_photo.addEventListener('click', function() {
    // canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    // canvas2.getContext('2d').drawImage(video, 0, 0, canvas2.width, canvas2.height);
    video_canvas.getContext('2d').drawImage(video, 0, 0, video_canvas.width, video_canvas.height);
    image_data_url = video_canvas.toDataURL('image/png');
    // canvas.style.display = "block";
    // canvas2.style.display = "block";
    video.style.display = "none";
    video_canvas.style.display = "block";

    click_photo.style.display = "none";
    click_recapture.style.display = "block";
    // span.click();
});

click_recapture.addEventListener('click', function() {
    image_data_url = null;

    video_canvas.style.display = "none";
    video.style.display = "block";
    
    click_recapture.style.display = "none";
    click_photo.style.display = "block";
});


resetFields = () => {
    $("#visitor_nickname").val("");
    $("#visitor_email").val("");
    $("#image_data_url").val("");

    click_recapture.click();
}

generatePDF = (visitor_nickname, pcn) => {
    var img_qr = new Image();
    var img_picture  = new Image();
    
    img_qr.src = qr_base64;
    img_picture.src = image_data_url;

    var doc = new jsPDF();
    doc.addImage(img_background, 'png', 13, 10, 185, 145);
    doc.setFontType("bold").setFontSize(25);
    doc.text("National Planning Workshop eID", 37, 30);
    doc.addImage(img_picture, 'png', 25, 35, 80, 80);
    doc.addImage(img_qr, 'png', 107, 35, 80, 80);
    doc.setFontType("normal").setFontSize(18);
    doc.text("Visitor Name:", 25, 125);
    doc.text(visitor_nickname, 107, 125);
    doc.text("PRO Check Number:", 25, 135);
    doc.text(pcn, 107, 135);
    doc.setFontType("italic").setFontSize(7);
    doc.text("Dislaimer: For NPW purposes only and cannot be used for any official/legal transactions.", 58, 145);
    doc.save(pcn + '.pdf');
}

submit.addEventListener('click', function() {
    let visitor_nickname = $("#visitor_nickname").val();
    let visitor_email = $("#visitor_email").val();
    // alert(visitor_nickname);
    // alert(image_data_url);
    if(visitor_nickname.trim() == null || visitor_nickname.trim() == "" || visitor_email.trim() == null || visitor_email.trim() == "" || image_data_url.trim() == null || image_data_url.trim() == "") {
        alert("Please complete the form.");
    }
    else {
        $.ajax({
            url: "includes/ajax.php",
            method: "POST",
            data: {
                visitor_email: visitor_email,
            },
            success: function(number) {
                if(number > 0) {
                    alert("Email Address has already been used.")
                }
                else {
                    $.ajax({
                        url: "includes/ajax.php",
                        method: "POST",
                        data: {
                            visitor_nickname: visitor_nickname,
                            visitor_email: visitor_email,
                            image_data_url: image_data_url,
                        },
                        success: function(pcn) {
                            
                            generateQRCode(pcn);
                            var img = new Image()
                            img.src = qr_base64;
                
                            generatePDF(visitor_nickname, pcn);
                
                            sleep(1000).then(() => { 
                                $.ajax({
                                    url: "includes/ajax.php",
                                    method: "POST",
                                    data: {
                                        qr_base64: qr_base64,
                                        pcn: pcn,
                                        visitor_email: visitor_email,
                                        visitor_nickname: visitor_nickname,
                                    },
                                    success: function() {
                                        resetFields();
                                        // location.replace("/pro-check-legit/print.php?pcn=" + pcn);
                                        window.open("/pro-check-legit/pdf/" + pcn + ".pdf");
                                    }
                                })
                            });
                        }
                    });
                }
            }
        });
    }
});

function generateQRCode(value) {
    if (value) {
        /*With some styles*/
        let qrcodeContainer2 = document.getElementById("qrcode2");
        qrcodeContainer2.innerHTML = "";
        new QRCode(qrcodeContainer2, {
            text: value,
            width: 250,
            height: 250,
            // colorDark: "#104a8e",
            // colorLight: "#e6cc00",
            correctLevel: QRCode.CorrectLevel.H
        });

        qr_base64 = qrcodeContainer2.children[0].toDataURL("image/png");
    } else {
        alert("Please enter a valid URL");
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}