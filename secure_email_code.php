<?php
if(isset($_POST["submit"])){
    // Checking For Blank Fields..
    if($_POST["firstname"]==""||$_POST["lastname"]==""||$_POST["email"]==""||$_POST["phone"]==""||$_POST["message"]==""){
        echo "Fill All Fields..";
    }else{
        // Check if the "Sender's Email" input field is filled out
        $email=$_POST['email'];
        // Sanitize E-mail Address
        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate E-mail Address
        $email= filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email){
            echo "Invalid Sender's Email";
        } else{
//            $subject = $_POST['sub'];
//            $message = $_POST['msg'];
//            $headers = 'From:'. $email2 . "\r\n"; // Sender's Email
//            $headers .= 'Cc:'. $email2 . "\r\n"; // Carbon copy to Sender
            $from = "thedreamteam@gmail.com";
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            // Message lines should not exceed 70 characters (PHP rule), so wrap it
            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70);
            // Send Mail By PHP Mail Function
            mail($firstname, $lastname, $email, $phone, $message, "From:".$from);
            echo "Your mail has been sent successfuly!";
        }
    }
}


?>