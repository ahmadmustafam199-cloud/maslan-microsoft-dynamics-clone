<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptcha_secret = "6LcOJwEsAAAAAOqo3L2gGs2Wqb4vCQtuxc8ko3l3";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verify response with Google
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response"
    );
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        echo "✅ Verification successful. Form submitted!";
    } else {
        echo "❌ reCAPTCHA failed. Please try again.";
    }
}
?>
