
<?php
// delete.php
include("db_conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the record
    $sql = "DELETE FROM movie WHERE id = ?";
    
    // Prepare and execute the query
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);  // "i" is for integer
        if ($stmt->execute()) {
            // Redirect to the movie reservation page after successful deletion
            header("Location: addmin-panel.php?msg=Data deleted successfully");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
