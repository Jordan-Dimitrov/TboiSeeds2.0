<?php
mysqli_report(MYSQLI_REPORT_OFF);

$connect = @mysqli_connect("localhost", "root", "stormedbucket", "tboi");

if(mysqli_connect_errno())
{
    echo "Connection to the database failed!<BR>";
    echo "Reason: ", mysqli_connect_error();
    exit();
}
?>