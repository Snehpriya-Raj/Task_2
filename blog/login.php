<?php
session_start();
require_once "db.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();

        } else {
            $error = "❌ Invalid Password";
        }

    } else {
        $error = "❌ User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>User Login</h2>

<?php
if($error != ""){
    echo "<div class='error'>$error</div>";
}
?>

<form method="POST">

    <input type="text" name="username" placeholder="Enter Username" required>

    <input type="password" name="password" placeholder="Enter Password" required>

    <button type="submit" name="login">Login</button>

</form>

<p>Don't have an account?
<a href="register.php">Register</a>
</p>

</div>

</body>
</html>