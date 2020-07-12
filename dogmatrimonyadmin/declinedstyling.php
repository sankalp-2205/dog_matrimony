<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM requests";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $total = $rows['COUNT(*)'];
    }
}
$sql = "SELECT COUNT(*) FROM requests WHERE status = 'declined'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $declined = $rows['COUNT(*)'];
    }
}
$declinedpercent = ($declined/$total)*100;
$declinedpercent = floor($declinedpercent);
$declinedpercent .= "%";
echo "
<script>
$('#declinedbar').css({'width' : '$declinedpercent' });
</script>";
?>