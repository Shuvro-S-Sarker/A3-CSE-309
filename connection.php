<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO details (Fullname, Email, Message) VALUES ('$fullname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
