<?php
include("db_conn.php");

function validate($conn, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

$username = validate($conn, $_POST['username']);
$email = validate($conn, $_POST['email']);
$password = validate($conn, $_POST['password']);


$check_query = "SELECT * FROM names WHERE username=? OR email=?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Username or email already exists.";
} else {
 
    $insert_query = "INSERT INTO names (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
   
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    if ($stmt->execute()) {
       header("Location:Login-page.html");
    } else {
        echo "Error: " . $stmt->error;
    }
}


$stmt->close();
$conn->close();
?>

