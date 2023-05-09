<?php
    // check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // check if the recaptcha response has been received
        if (isset($_POST['g-recaptcha-response'])) {
            // your site secret key
            $secret = "6LcD2PMlAAAAABEK36qRbTkCdg-3F5jDSDIg8fnW";
            // get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            
            // if the response is valid
            if ($responseData->success) {
                // process the form data
                $promoCode = $_POST["promo-code"];
                
                if ($promoCode === "ENVIRO500\$X48F9Z" || $promoCode === "toiletdooristheworst") {
                    echo "Code Redeemed! https://bit.ly/3BlS71b";
                } else {
                    echo "Invalid Code";
                }
                
            } else {
                // if the response is invalid
                echo "reCAPTCHA verification failed, please try again.";
            }
            
        } else {
            // if the recaptcha response has not been received
            echo "reCAPTCHA verification failed, please try again.";
        }
        
    } else {
        // if the form has not been submitted
        echo "Please submit the form first.";
    }
?>
