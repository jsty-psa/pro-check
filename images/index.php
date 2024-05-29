<?php
    include_once "../includes/print.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PRO Check - Print Data</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
            p {
                background-image: url('image_template.png');
            }
        </style>
    </head>
    <body>
        <center>
            <!-- <table>
                <tr>
                    <td>
                        <img id="visitor_photo" src="<?php echo $result['photo_base64']; ?>" width="310" height="350" />
                    </td>
                    <td>
                        <div id="qrcode-container">
                            <div id="qrcode" class="qrcode"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font style="font-size: 26px">Visitor Name:</font>
                    </td>
                    <td>
                        <font style="font-size: 26px"><?php echo $result["visitor_nickname"]; ?></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font style="font-size: 26px">PRO Check Number:</font>
                    </td>
                    <td>
                        <font style="font-size: 26px"><input type="hidden" id="pcn" value="<?php echo $result["pcn"]; ?>" /><?php echo $result["pcn"]; ?></font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><font style="font-size: 9px"><i>Dislaimer: For NPW purposes only and cannot be used for any official/legal transactions.</i></font></center>
                    </td>
                </tr>
            </table> -->
            <!-- <img src="image_template.png" width="100%" height="100%"> -->
            <canvas id="viewport"></canvas>
        </center>
        <script type="text/javascript" src="index.js"></script>
    </body>
</html>