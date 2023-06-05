<h2>Users</h2>
<hr>
<?php
require_once 'files/config.php';
$sql = "SELECT nickname FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<hr>";
        echo "<br>" . $row["nickname"];
    }
} else {
    echo "0 results";
}

$conn->close();





?>
<hr>