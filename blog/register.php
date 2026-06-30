<?php
include "db.php";

$msg = "";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username, password)
            VALUES('$username', '$password')";

    if(mysqli_query($conn, $sql))
    {
        $msg = "Registration Successful";
    }
    else
    {
        $msg = "Registration Failed";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>User Registration</h2>


<?php
if($msg != "")
{
    echo "<p>$msg</p>";
}
?>


<form method="POST">

    <input type="text" name="username" placeholder="Enter Username" required>

    <br><br>

    <input type="password" name="password" placeholder="Enter Password" required>

    <br><br>

    <button type="submit" name="register">Register</button>

</form>

</div>

</body>
</html>