<?php
    include_once "connection.php";

    if(!isset($_POST["visitor_nickname"]) && !isset($_POST["image_data_url"]) && isset($_POST["visitor_email"])) {
        $visitor_email = $_POST['visitor_email'];
        $sql = "SELECT * FROM registrant_table WHERE visitor_email = '$visitor_email'";

        $result = $conn->query($sql);

        echo $result->num_rows;
    }

    if(isset($_POST["visitor_nickname"]) && isset($_POST["image_data_url"]) && isset($_POST["visitor_email"])) {
        $inserted = 0;
        // $pcn = (string)rand(1000000000000000, 1999999999999999);
        while(!$inserted) {
            $pcn = (string)rand(1000000000000000, 1999999999999999);
            $pcn_value = rand(55000,60000);
            $visitor_nickname = $_POST["visitor_nickname"];
            $visitor_email = $_POST["visitor_email"];
            $image_data_url = $_POST["image_data_url"];
            
            $sql = "INSERT INTO registrant_table (pcn, visitor_nickname, visitor_email, photo_base64, pcn_value) VALUES ('$pcn', '$visitor_nickname', '$visitor_email', '$image_data_url', $pcn_value)";

            if ($conn->query($sql) === TRUE) {
                $inserted++;
            }
        }
        echo $pcn;
    }

    if(isset($_POST["pcn"])) {
        $pcn = $_POST["pcn"];
        $sql = "SELECT * FROM registrant_table WHERE pcn = '$pcn'";
        $result = $conn->query($sql);
        
        if($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            echo json_encode($result);
        }
    }

    if(isset($_GET["pcn"])) {
        $pcn = $_GET["pcn"];
        $sql = "SELECT * FROM registrant_table WHERE pcn = '$pcn'";
        $result = $conn->query($sql);
        
        if($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            echo json_encode($result);
        }
    }

    if(isset($_POST["verified_pcn"])) {
        $pcn = $_POST["verified_pcn"];
        $sql = "UPDATE registrant_table SET is_verified = 1 WHERE pcn = '$pcn'";
        $result = $conn->query($sql);
    }

    if(isset($_POST["qr_base64"]) && isset($_POST["pcn"]) && isset($_POST["visitor_email"]) && isset($_POST["visitor_nickname"])) {

        require('../PHPMailer/src/Exception.php');
        require('../PHPMailer/src/PHPMailer.php');
        require('../PHPMailer/src/SMTP.php');
        
        $qr_base64 = $_POST['qr_base64'];
        $visitor_email = $_POST['visitor_email'];
        $visitor_nickname = $_POST['visitor_nickname'];
        $pcn = $_POST['pcn'];

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();

        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'mail.philsys.gov.ph';
        $mail->Port = 587;
        $mail->Username = 'pro.siss@philsys.gov.ph';
        $mail->Password = 'p29gx5_4G8';
        
        $mail->SetFrom('pro.siss@philsys.gov.ph', 'PRO-Check-no-reply');
        $mail->AddAddress($visitor_email);
        
        $mail->Subject = 'PRO Check Registration Success';
        
        $mail->isHTML(true);
        $mailContent = "
            Dear $visitor_nickname:
            <br><br>
            Greetings from the PhilSys Registry Office!
            <br><br>
            Attached is your Electronic Identification. Present this to one of our Verification Officers to claim your reward.
            <br><br>
            To get more PRO Updates, check the links below:<br>
            <ol>
                <li><a href='https://sites.google.com/view/philsysstep1/home'>https://sites.google.com/view/philsysstep1/home</a></li>
                <li><a href='https://sites.google.com/view/philsys-check/home'>https://sites.google.com/view/philsys-check/home</a></li>
                <li><a href='https://sites.google.com/view/ephilid/home'>https://sites.google.com/view/ephilid/home</a></li>
            </ol>
        ";

        // $mail->addAttachment("../pdf/$pcn.pdf", "attachment.pdf");
        $mail->addAttachment("../pdf/".$pcn.".pdf", "attachment.pdf");

        $mail->Body = $mailContent;
        
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }

    if(isset($_POST['applicant_count'])) {
        $sql = "SELECT (SELECT SUM(pcn_value) FROM registrant_table) total_account_registered, (SELECT SUM(pcn_value) FROM registrant_table WHERE is_verified = 1) total_account_verified";
        $result = $conn->query($sql);
        
        if($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            echo json_encode($result);
        }
    }