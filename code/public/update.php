<?php
    include_once "connection.php";
    $dbConfig = new dbConfig;

    if(isset($_GET['id'])) {
        $result = $dbConfig->getSignleRec($_GET['id']);
        $row = mysqli_fetch_array($result);
        extract($row);
    }
?>

<a href="index.php" style="border: 1px solid black; color: black; padding: 3px 10px; text-decoration: none; margin-bottom: 10px">Back</a>

<form action="" method="post" style="margin-top: 10px">
    <input type="text" placeholder="first name" name="firstname" value="<?php echo $firstname; ?>" require> <br> <br>
    <input type="text" placeholder="last name" name="lastname"  value="<?php echo $lastname; ?>" require> <br> <br>
    <input type="text" placeholder="email" name="email" value="<?php echo $email; ?>" require> <br> <br>
    <input type="text" placeholder="permission" name="permission" value="<?php echo $permission; ?>" require> <br> <br>
    <input type="submit" value="Add" name="submit">
</form>

<?php
    if(isset($_POST['submit'])) {
        $dbConfig->update($id);
        echo "<script typle='text/javascript'>location.href='index.php'</script>";
    }
?>