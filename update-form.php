<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $movie_title = isset($_POST['movie_title']) ? $_POST['movie_title'] : '';
    $gcash_number = isset($_POST['gcash_number']) ? $_POST['gcash_number'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';
    $QUANTITY = isset($_POST['QUANTITY']) ? $_POST['QUANTITY'] : '';

    
    $sql = "UPDATE `movie` SET ";
    $updates = [];
    if ($email != '') $updates[] = "`email`='$email'";
    if ($password != '') $updates[] = "`password`='$password'";
    if ($address != '') $updates[] = "`address`='$address'";
    if ($movie_title != '') $updates[] = "`movie_title`='$movie_title'";
    if ($gcash_number != '') $updates[] = "`gcash_number`='$gcash_number'";
    if ($date != '') $updates[] = "`date`='$date'";
    if ($time != '') $updates[] = "`time`='$time'";
    if ($QUANTITY != '') $updates[] = "`QUANTITY`='$QUANTITY'";
    $sql .= implode(", ", $updates);

    $sql .= " WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: addmin-panel.php?msg=Data updated successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Reservation</title>
</head>
<link rel="stylesheet" type="text/css" href="update-form.css">
<body>
<div class="Movie">
<form method="post" action="update-form.php?id=<?php echo $id; ?>">
    <div class="input-box">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    </div>
    
    <div class="input-box">
    <label for="password">New Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
</div>
<div class="input-box">
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br><br>
        </div>
    <div class="input-box">
    <label for="movie_title">New shoes Name:</label><br>
    <input type="text" id="movie_title" name="movie_title"><br><br>
</div>
    
    <div class="input-box">
    <label for="gcash_number">New GCash Number:</label><br>
    <input type="text" id="gcash_number" name="gcash_number"><br><br>
</div>
    <div class="input-box">
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date"><br><br>
</div>
     <div class="input-box">
    <label for="time">Time:</label><br>
    <input type="time" id="time" name="time"><br><br>
</div>
    <div class="option">
    <label for="QUANTITY">Quantity:</label>
<input type="number" id="QUANTITY" name="QUANTITY" min="1" max="10" step="1" value="1">
    </div>
    <div class="btn">
    <input type="submit" name="submit" value="Update">
</div>
</form>
</div>
</body>
</html>
