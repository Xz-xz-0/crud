<?php
    include_once "connection.php";
    $user = new User;

    if(isset($_GET['id'])) {
        $user->delete($_GET['id']);
    }
?>

<script typle="text/javascript">
    location.href='index.php'
</script>