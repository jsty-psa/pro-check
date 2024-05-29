<?php
    include_once "includes/print.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PRO Check - Print Data</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="images/psa-philsys-logo.ico">
    </head>
    <body>
        <br />
        <center>
            <div id="print_table">
                <table id="print_table_data">
                    <tr>
                        <td colspan="2">
                            <center><div class="npw-id-header"><b>National Planning Workshop eID</b></div></center>
                            <!-- <center><div class="npw-id-header"><b>National Book Store Membership Card</b></div></center> -->
                            <!-- <center><img src="images/logo.jpg" /></center> -->
                            <!-- <center><img src="gif/tick-tick-verified.gif" /></center> -->
                        </td>
                    </tr>
                    <!-- <tr>
                        <td colspan="2">
                            <center><div class="npw-id-header"><b>Membership Card</b></div></center>
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <img id="visitor_photo" src="<?php echo $result['photo_base64']; ?>" width="310" height="350"/>
                        </td>
                        <td>
                            <div id="qrcode-container">
                                <div id="qrcode" class="qrcode"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font style="font-size: 26px">Visitor Nickname:</font>
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
                </table>
            </div>
        </center>
        <script type="text/javascript" src="js/print.js"></script>
    </body>
</html>