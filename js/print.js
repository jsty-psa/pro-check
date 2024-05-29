$(document).ready(function() {
    // alert($('#pcn').val());
    generateQRCode($('#pcn').val());

    // let link_string = "https://www.ixxx.com";
    // generateQRCode(link_string);    
});

function generateQRCode(value) {
    let visitor_photo = document.getElementById("visitor_photo");
    if (value) {
        /*With some styles*/
        let qrcodeContainer2 = document.getElementById("qrcode");
        qrcodeContainer2.innerHTML = "";
        new QRCode(qrcodeContainer2, {
            text: value,
            width: visitor_photo.width,
            height: visitor_photo.height,
            // colorDark: "#104a8e",
            // colorLight: "#e6cc00",
            correctLevel: QRCode.CorrectLevel.H,
        });

        document.getElementById("qrcode-container").style.display = "block";
        // console.log(qrcodeContainer2.children[0].toDataURL("image/png"));
    } else {
        alert("Please enter a valid URL");
    }
}