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
$sql = "SELECT COUNT(*) FROM requests WHERE status = 'confirmed'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $confirmed = $rows['COUNT(*)'];
    }
}
$confirmedpercent = ($confirmed/$total)*100;
$confirmedpercent = floor($confirmedpercent);
$confirmedpercent .= "%";
echo "
<script>
$('#confirmedbar').css({'width' : '$confirmedpercent' });
</script>";
?>