<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = "UPDATE posts SET title='$title', content='$content' WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Update Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="post-box">

<h2>Edit Post</h2>

<form method="POST">

<input type="text" name="title" value="<?php echo $row['title']; ?>" required>

<br><br>

<textarea name="content" rows="5" cols="40" required><?php echo $row['content']; ?></textarea>

<br><br>

<button type="submit" name="update">Update Post</button>

</form>

<br>

<a href="index.php">Back</a>
    </div>

</body>
</html>