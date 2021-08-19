<?php
header('Access-Control-Allow-Origin: *');

$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "demo_php";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die('Không thể kết nối: ' . mysqli_error($conn));
    exit();
}

$name = "";
$price = "";
$thumbnail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"])) {
        $name = $_POST['name'];
    }
    if (isset($_POST["price"])) {
        $price = $_POST['price'];
    }
    if (isset($_POST["thumbnail"])) {
        $thumbnail = $_POST['thumbnail'];
    }
    $sql = "INSERT INTO products (name , price, thumbnail)
    VALUES ('$name', '$price', '$thumbnail')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "error" . $conn->error;
    }
}
mysqli_close($conn);
?>