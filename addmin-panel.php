<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Reservation Dashboard</title>
    <style type="text/css">
    
    </style>
    <link rel="stylesheet" href="admin-panel.css">
</head>
<body>

<div class="navbar">
    <div class="circular">
    <img src="Logo.jpg">
    </div>
    <a href="index.html">Home</a>
    <a href="shoes-list.html">Add New</a>
    <a href="print.php">Print</a>
    <a href="Log-out.php">Log Out</a>
</div>

<div class="content">
    <table>
        <thead>
            <tr>
                <th> ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>address</th>
                <th>add Shoes Name</th>
                <th>GCash Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("db_conn.php");

            $sql = "SELECT * FROM movie";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
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
                    echo "<td class='action-buttons'>";
                    echo "<button onclick='window.location.href=\"Update-form.php?id=" . $row["id"] . "\"'>Update</button>";
                    echo "<button onclick='window.location.href=\"delete.php?id=" . $row["id"] . "\"'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No reservations found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
