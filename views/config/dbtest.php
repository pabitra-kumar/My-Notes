<?php
require("db.php");

$username = "pabitra_kumar";
$query = "select * from curr_users;";

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