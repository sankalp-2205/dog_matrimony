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
$sql = "SELECT COUNT(*) FROM requests WHERE status = 'pending'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $pending = $rows['COUNT(*)'];
    }
}
$pendingpecent = ($pending/$total)*100;
$pendingpecent = floor($pendingpecent);
$pendingpecent .= "%";
echo "
<script>
$('#pendingbar').css({'width' : '$pendingpecent'});
</script>";
?>