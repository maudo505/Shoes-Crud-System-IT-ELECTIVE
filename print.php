
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
</head>
<link rel="stylesheet" type="text/css" href="print.css">

<body>
<?php
include("db_conn.php");

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Email</th><th>Password</th><th>address</th><th>Movie Title</th><th>GCash Number</th><th>Date</th><th>Time</th><th>Buy or Rent</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["movie_title"] . "</td>";
        echo "<td>" . $row["gcash_number"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["QUANTITY"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No reservations found.";
}

$conn->close();
?>
</body>
</html>
