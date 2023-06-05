
<h2>Photos</h2>

<hr>
<hr><?php
if ($_SESSION["name"]) {
echo '<form action="upload.php" method="post" enctype="multipart/form-data">
    Photo title:
    <input type="text" id="pavadinimas" name="pavadinimas"><br><br>
    Photo description:
    <textarea rows="4" cols="50" id="aprasymas" name="aprasymas"></textarea><br><br>
    Select photo:
    <input type="file" name="image" id="file">
    <input type="submit" value="Upload Image" name="submit">
</form>';}?>
<br>

<hr>
<p>-------------------------------</p>
<hr>

<?php
  require_once 'config.php';

$sql = "SELECT ID, nick, pavadinimas, aprasymas, laikas, adresas FROM photo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<hr>";
        echo "<br> Uploader: " . $row["nick"];
        echo "<br> Photo title: " . $row["pavadinimas"];
        echo "<br> Photo description: " . $row["aprasymas"];
        echo "<br> Date: " . $row["laikas"];

        echo "<br> <a href=\"{$row['adresas']}\"> <img src=\"{$row['adresas']}\" height='150'></a><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>