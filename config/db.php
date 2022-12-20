<?php
$server = 'localhost';
$con = mysqli_connect($server,"root","","my_notes");

if(!$con)
{
    echo "failed to connect database";
}

?>