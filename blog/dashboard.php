<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard">  

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

<br>

<a href="create.php">
    <button>Create Post</button>
</a>

<br><br>

<a href="index.php">
    <button>View Posts</button>
</a>

<br><br>

<a href="logout.php">
    <button>Logout</button>
</a>
</div>

</body>
</html>