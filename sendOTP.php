<?php
	require_once('function.php');
    function generateNumericOTP($n) {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }

	if(isset($_POST['email']) && isset($_POST['nama']) && isset($_POST['strfor']))
	{
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $strfor = $_POST['strfor'];
        $otp = generateNumericOTP(6);
        $to = $email;
        
        if ($strfor=='forgot'){
            $subject  = "[To Do List] Forget your password?";
            $message1 = "<h4>You are claiming that you have forgotten your password.</h4>
            <p>Please verify the verification code below to reset your password. Don't give this verification code to anyone else.</p>";
            $message2 = "<p>If this is not you, please change your password directly.</p><br>";
        } else if ($strfor == 'regis'){
            $subject  = "[To Do List] Please verify your account";
            $message1 = "<h4>Thank you for creating a To Do List account.</h4>
            <p>Please check the verification code below to complete your email address verification. Don't give this verification code to anyone else.</p>";
            $message2 = "";
        }
        if ($strfor != null){
            $message  = "<h4>Hello, ".$nama."</h4>".$message1."<hr>
            <p>To Do List Account: ".$email."</p>
            <p>Verification Code: ".$otp."</p>
            <hr>".$message2."<p>Regards,</p>
            <p>To Do List</p>";
            
            $send = smtp_mail($to, $subject, $message, '', '', 0, 0, false);
            if ($send == 0){
              echo $otp;
            } else{
              echo "We can't send you an email, please give a valid email.";
            }
        }
	}
?>