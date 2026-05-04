<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "Please fill in all fields correctly."
        ]);
        exit;
    }
    usleep(800000); 
    echo json_encode([
        "status" => "success",
        "message" => "Thank you, $name! Mustafa Khizar will get back to you shortly."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
?>
