<?php
    include_once "connection.php";
    $dbConfig = new dbConfig;

    if(isset($_GET['id'])) {
        $dbConfig->delete($_GET['id']);
    }
?>

<script typle="text/javascript">
    location.href='index.php'
</script>