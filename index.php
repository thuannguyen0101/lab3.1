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
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
mysqli_close($conn);

if ($result->num_rows > 0) {
    $currencyArray = array();
    while($row = $result->fetch_assoc()) {
        $currency = array($row["id"], $row["name"], $row["price"],$row["thumbnail"]);
        $currencyArray[] = $currency;
    }
    print json_encode($currencyArray);
} else {
    echo "0 results";
}
?>
