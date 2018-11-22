<a href="create.php" style="border: 1px solid black; color: black; padding: 3px 10px; text-decoration: none">Create</a>
<?php

include_once "connection.php";

$user = new User;
$result = $user->getRecords();

echo "<table width='50%' border='0' cellpadding='3' cellspacing='1' bgcolor='#000' style='margin-top: 10px'>";
echo "<tr>";
echo "<th bgcolor='#FFFFFF'>Id</th><th bgcolor='#FFFFFF'>First name</th><th bgcolor='#FFFFFF'>Last name</th><th bgcolor='#FFFFFF'>Email</th><th bgcolor='#FFFFFF'>Permissions</th><th bgcolor='#FFFFFF' colspan = '2'></th>";
echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        extract ($row);
        echo "<tr>";
        echo "<td bgcolor='#FFFFFF'>" .$id. "</td>";
        echo "<td bgcolor='#FFFFFF'>" .$firstname. "</td>";
        echo "<td bgcolor='#FFFFFF'>" .$lastname. "</td>";
        echo "<td bgcolor='#FFFFFF'>" .$email. "</td>";
        echo "<td bgcolor='#FFFFFF'>" .$permission. "</td>";
        echo "<td bgcolor='#FFFFFF' align='center'><input type = 'button' value = 'Update' onclick='_update($id)'/></td>";
        echo "<td bgcolor='#FFFFFF' align='center'><input type = 'button' value = 'Delete' onclick='_delete($id)'/></td>";
        echo "</tr>";
    }
echo "</table>";

?>

<script type="text/javascript">
    function _update(id) {
        location.href='update.php?id=' +id;
    }

    function _delete(id) {
        if (confirm("Delete?"))
        {
            location.href = 'delete.php?id=' +id;
        }
    }
</script>