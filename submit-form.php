<?php
// Verify the reCAPTCHA response
$recaptcha_secret = '6LcD2PMlAAAAAOSBkY6Vm0DJ9CZdsYHMPYnannmo';
$recaptcha_response = $_POST['g-recaptcha-response'];
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_data = array(
    'secret' => $recaptcha_secret,
    'response' => $recaptcha_response
);
$recaptcha_options = array(
    'http' => array (
        'method' => 'POST',
        'content' => http_build_query($recaptcha_data)
    )
);
$recaptcha_context = stream_context_create($recaptcha_options);
$recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
$recaptcha_response_data = json_decode($recaptcha_result);

// Handle the form submission
if ($recaptcha_response_data->success) {
    $promo_code
