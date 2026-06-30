<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}


if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content) VALUES('$title','$content')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['msg'] = "Post Added Successfully";

        // yaha change kiya hai
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();

    } else {

        $msg = "Error";

    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>

    <link rel="stylesheet" href="css/style.css">

</head>


<body>


<div class="post-box">


<h2>Create Post</h2>


<?php
if($msg != ""){
    echo "<p>$msg</p>";
}
?>


<form method="POST">


<input type="text" name="title" placeholder="Enter Title" required>


<br><br>


<textarea name="content" placeholder="Enter Content" rows="5" cols="40" required></textarea>


<br><br>


<button type="submit" name="submit">Add Post</button>


</form>


<br>


<a href="dashboard.php">Back</a>


</div>


</body>

</html>