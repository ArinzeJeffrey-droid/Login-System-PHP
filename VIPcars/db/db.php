<?php 
$db = mysqli_connect(
    "localhost",
    "root",
    "",
    "vipcars"
);
if(!$db){
    echo "Database Connection Failed!";
};

?>