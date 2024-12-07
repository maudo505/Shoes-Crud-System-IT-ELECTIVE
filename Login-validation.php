<?php
include("db_conn.php");


function validate($conn, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = $conn->real_escape_string($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username_email = validate($conn, $_POST['username_email']); 
    $password = validate($conn, $_POST['password']);

    
    $query = "SELECT * FROM names WHERE username=? OR email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username_email, $username_email); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            header("Location: addmin-panel.php");
            
        } else {
            echo "Invalid username/email or password.";
        }
    } else {
        echo "Invalid username/email or password.";
    }

    
    $stmt->close();
}
?>
