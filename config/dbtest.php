<?php
require("db.php");

$username = "om";
$query = "CREATE TABLE `om` (`sl_no` INT(8) NOT NULL AUTO_INCREMENT , `heading` VARCHAR(100) NOT NULL , `content` TEXT NOT NULL , `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sl_no`));";

echo "$query <br>";

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