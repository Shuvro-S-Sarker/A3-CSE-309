<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM details";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error in fetching data: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <link rel="stylesheet" type="text/css" href="dstyles.css">
</head>
<body>

<div class="container">
    <h1>Data Display</h1>
    <a href="index.html">Back to Home</a>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Message</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . (isset($row["ID"]) ? ($row["ID"]) : '') . "</td>";
            echo "<td>" . (isset($row["Fullname"]) ? ($row["Fullname"]) : '') . "</td>";
            echo "<td>" . (isset($row["Email"]) ? ($row["Email"]) : '') . "</td>";
            echo "<td>" . (isset($row["Message"]) ? ($row["Message"]) : '') . "</td>";
            echo "</tr>";
        }
        

        echo "</table>";
    } else {
        echo "No records found";
    }
    ?>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
