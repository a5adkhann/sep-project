<?php
session_start();
session_unset();

echo "<script>
    alert('Logout Successfully');
    location.assign('../login.php');
</script>";
?>