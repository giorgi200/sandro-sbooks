<?php 
$connect = mysqli_connect("localhost", "qomagi", "", "sandro");

if (!$connect) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}/* else {

echo 'Success... ' . mysqli_get_host_info($connect) . "\n";

}*/

if (!mysqli_set_charset($connect, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($connect));
    exit();
} else {
     mysqli_character_set_name($connect);
}

?>