<?php
require("db.php");

$username = "pabitra_kumar";
$query = "INSERT INTO `pabitra_kumar` (`heading`, `content`, `date`) VALUES ('hello everyone,', 'This is my First Backend Software', current_timestamp());";

echo $query;
$t = $con->query($query);
require("dbget.php");
echo print_r($posts);
if($con->query($query) == true)
{
    echo "success";
}
else
{
    echo "not success";
}

mysqli_close($con);

?>