<?php
session_start();
include 'connection.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM requests ORDER BY time DESC";
$count = 0;
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {  
                $sentfrom = $rows['fromdogid']; 
                $sentto = $rows['todogid'];
                $status = $rows['status'];
                $appointment_sender = $rows['appointment_sender'];
                $appointment_receiver = $rows['appointment_receiver'];
                $sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto' AND username ='$username'";          
                if($result2 = $link ->query($sql2))
                {
                    if($result2->num_rows == 1)
                    {
                        // request sent by other to the logged in user
                        while ($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                        {
                            $dognameto = $rows2['dogname'];                            
                        }
                         $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                         if($result3 = $link ->query($sql3))
                        {
                            while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                            {
                                $dognamefrom = $rows3['dogname'];                            
                            }
                            if($status == 'confirmed' && $appointment_receiver == 'booked')
                            {
                                $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
                                if($result4 = $link ->query($sql4))
                                {
                                    while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $report_generated = $rows4['report_generated'];                            
                                    }
                                    if($report_generated == false)
                                    {
                                        $appointmentstatus = "<span style = 'color:green'> ACTIVE</span>";
                                    }
                                    elseif($report_generated == true)
                                    {
                                        $appointmentstatus = "<span style = 'color:black'> COMPLETED</span>";
                                    }
                                }
                                $count++;
                                echo "<p><div class = 'row' style = 'border-color : black;'>
                                <div class = 'col-xs-12 col-sm-offset-3 col-sm-8'>
                                <h2 style = 'display: inline'>$dognamefrom - $dognameto</h2>$appointmentstatus
                                <div class='pull-right'>
                                <button type='button' id = 'showdetails' name= 'showdetails[$sentfrom][$sentto]' class='btn btn-lg btn-info'>Show Booking Details</button>
                                </div>
                                </div>
                                </div></p>
                                <hr>";;
                            }
                            if(($status == 'cancelled' || $status == 'declined') &&  $appointment_receiver == 'booked')
                            {
                                $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
                                if($result4 = $link ->query($sql4))
                                {
                                    while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $report_generated = $rows4['report_generated'];                            
                                    }
                                    if($report_generated == false)
                                    {
                                        $appointmentstatus = "<span style = 'color:green'> ACTIVE</span>";
                                    }
                                    elseif($report_generated == true)
                                    {
                                        $appointmentstatus = "<span style = 'color:black'> COMPLETED</span>";
                                    }
                                }
                                $count++;
                                echo "<p><div class = 'row' style = 'border-color : black;'>
                                <div class = 'col-xs-12 col-sm-offset-3 col-sm-8'>
                                <div class='input-group'>
                                <h2 style = 'display: inline'> $dognamefrom - $dognameto</h2>$appointmentstatus
                                </div>
                                <div class = 'pull-right'>
                                <button type='button' id = 'showdetails' name= 'showdetails[$sentfrom][$sentto]' class='btn btn-lg disabled'>$status</button>
                                </div>
                                </div>
                                </div></p>
                                <hr>";
                            }

                        }
                        else
                        {
                            echo "<div class = 'alert alert-warning'>Cannot run natural join query in case 2</div>";
                            exit;  
                        }
                    }
                    else
                    {
                        $sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom' AND username ='$username'";
                        if($result2 = $link ->query($sql2))
                        {
                            if($result2->num_rows == 1)
                            {
                                // request sent by the logged in user
                                while ($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                                {
                                    $dognamefrom = $rows2['dogname'];                            
                                }
                                $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                                if($result3 = $link ->query($sql3))
                                {

                                    while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $dognameto = $rows3['dogname'];                            
                                    }
                                    if($status == 'confirmed' && $appointment_sender == 'booked')
                                   {
                                    $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
                                    if($result4 = $link ->query($sql4))
                                    {
                                        while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $report_generated = $rows4['report_generated'];                            
                                        }
                                        if($report_generated == false)
                                        {
                                            $appointmentstatus = "<span style = 'color:green'> ACTIVE</span>";
                                        }
                                        elseif($report_generated == true)
                                        {
                                            $appointmentstatus = "<span style = 'color:black'> COMPLETED</span>";
                                        }
                                    }
                                    $count++;
                                    echo "<p><div class = 'row' style = 'border-color : black;'>
                                    <div class = 'col-xs-12 col-sm-offset-3 col-sm-8'>
                                    <h2 style = 'display: inline'>$dognamefrom - $dognameto</h2>$appointmentstatus
                                    <div class='pull-right'>
                                    <button type='button' id = 'showdetails' name= 'showdetails[$sentfrom][$sentto]' class='btn btn-info btn-lg'>Show Booking Details</button>
                                    </div>
                                    </div>
                                    </div>
                                    <hr></p>";
                                    }
                                    if(($status == 'cancelled' || $status == 'declined') && $appointment_sender == 'booked')
                                    {
                                        $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
                                        if($result4 = $link ->query($sql4))
                                        {
                                            while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                            {
                                                $report_generated = $rows4['report_generated'];                            
                                            }
                                            if($report_generated == false)
                                            {
                                                $appointmentstatus = "<span style = 'color:green'> ACTIVE</span>";
                                            }
                                            elseif($report_generated == true)
                                            {
                                                $appointmentstatus = "<span style = 'color:black'> COMPLETED</span>";
                                            }
                                        }
                                        $count++;
                                        echo "<p><div class = 'row' style = 'border-color : black;'>
                                        <div class = 'col-xs-12 col-sm-offset-3 col-sm-8'>
                                        <h2 style = 'display: inline'> $dognamefrom - $dognameto</h2>$appointmentstatus
                                        <div class = 'pull-right'>
                                        <button type='button' id = 'showdetails' name= 'showdetails[$sentfrom][$sentto]' class='btn btn-lg disabled'>$status</button>
                                        </div>
                                        </div>
                                        </div>
                                        <hr></p>";
                                    }
                                }
                                else
                                {
                                    echo "<div class = 'alert alert-warning'>Cannot run natural join query in case 4</div>";
                                    exit;  
                                }
                            }   
                        }
                        else
                        {
                            echo "<div class = 'alert alert-warning'>Cannot run natural join query in case 3</div>";
                            exit;  
                        }
                    }
                }
                else
                {
                    echo "<div class = 'alert alert-warning'>Cannot run natural join query in case 1</div>";
                    exit;  
                }
            }
}
else
{
    echo "<div class = 'alert alert-warning'>Cannot fetch data from requests table.</div>";
                exit;  
}
if($count == 0)
{
    echo "          <div class='container'>
	<div class='row'>
		<div class='col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-6'>
    	 <div class='well profile' style = 'background-color: transparent; border-color: transparent;'>
            <div class='col-xs-12'>
                <div class='col-xs-12 col-sm-8'>
                </div>             
                <div class='col-xs-12 text-center'>
                    <figure>
                        <img src='noresponse.jpg' alt='' class='img-square img-responsive'>
                    </figure>
                </div>
            </div>            
            <div class='col-xs-12 divider text-center'>
                <div class='col-xs-12 emphasis'>
                    <p>You have not booked any appointment yet</p>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>";
}

?>