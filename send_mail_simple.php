<?php
// Simple email solution without PHPMailer
// Allow CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Set content type to JSON
header('Content-Type: application/json');

// Email configuration
$to = 'mitchalingayao@gmail.com';
$subject = 'I Love You';
$message = 'Happy Valentine Day My Love. I love you so much. You are the best thing that has ever happened to me ❤';
$headers = "From: from@example.com\r\n";
$headers .= "Reply-To: from@example.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Try to send email
try {
    $success = mail($to, $subject, $message, $headers);
    
    if ($success) {
        echo json_encode([
            'success' => true, 
            'message' => 'Message has been sent'
        ]);
    } else {
        throw new Exception('mail() function returned false');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Message could not be sent. Error: ' . $e->getMessage() . 
                     '. Note: mail() function requires proper server configuration. ' .
                     'For Gmail, you should use PHPMailer with SMTP instead.'
    ]);
}
?>

