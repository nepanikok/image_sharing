<?php
require_once 'files/config.php';
$message = "";
if (isset($_POST['frmUser'])) {
   // $con = mysqli_connect('localhost', 'root', '', 'savarankiskas') or die('Unable To connect');
    $result = mysqli_query($conn, "SELECT * FROM user WHERE nickname='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['ID'];
        $_SESSION["name"] = $row['nickname'];
    } else {
        $message = "Neteisingi duomenys";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>
<html>

<head>
    <title>User Login</title>
</head>

<body>
    <form name="frmUser" method="post" action="" align="center">
        <div class="message"><?php if ($message != "") {
                                    echo $message;
                                } ?></div>
        Username:<br>
        <input type="text" name="user_name">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br>
        <input type="submit" name="frmUser" value="Log in">
        <input type="reset" value="Delete">
    </form>
</body>

</html>