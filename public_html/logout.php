<?php

session_start();

session_unset();
    echo'<link href="style.css" type="text/css" rel="stylesheet">';
    echo '<div class="log2">';
    echo '<div class="logout">';
    echo "<script>setTimeout(\"location.href = 'men.php'\",3000);</script>";
    echo "<b>You have been logged out.<br><br>";
    echo "Redirecting to homepage...</b>";
    echo '</div>';
    echo '</div>';
    exit();
session_destroy();

?>
