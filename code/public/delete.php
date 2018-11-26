<?php
    include_once "connection.php";
    $sql = new Sql;

    if(isset($_GET['id'])) {
        $sql->delete($_GET['id']);
    }
?>

<script typle="text/javascript">
    location.href='index.php'
</script>