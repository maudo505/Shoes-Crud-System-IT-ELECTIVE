<?php
include("db_conn.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address=$_POST["address"];
    $movie_title = $_POST["movie_title"];
    $gcash_number = $_POST["gcash_number"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $QUANTITY = $_POST["QUANTITY"];

    
    $check_sql = "SELECT * FROM movie WHERE email='$email'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        header("Location: addmin-panel.php");
    } else {
     
        $sql = "INSERT INTO movie (email, password,address, movie_title, gcash_number, date, time, QUANTITY) VALUES ('$email', '$password','$address', '$movie_title', '$gcash_number', '$date', '$time', '$QUANTITY')";
        if ($conn->query($sql) === TRUE) {
            header("Location:addmin-table.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
