<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible"
content="IE=edge">
<meta name="viewport" content="width=device-width,
initial-scale=1">
<title>Account activation</title>
<link href="css/bootstrap.min.css"
rel="stylesheet">
<link href=".css" rel="stylesheet">
<style>
h1{
color:purple;
}
h3{
color: #5ee875;
}
.container-fluid
    {
        margin-top: 20px;
    }
.containingDiv{
border:1px solid #7c73f6;
margin-top: 100px;
border-radius: 15px;
}
</style>

</head>

<body>

<div class="container-fluid" >

<div class="row">

        <div  class = " col-xs-offset-2 col-xs-9 containingDiv">

            <h1>Account activation</h1>

<?php
 session_start();
include ('connection.php');
if(!isset($_GET['email']) || (!isset($_GET['key'])))
{
    echo "<div class = 'alert alert-warning'>Something went wrong. Please try again later </div>";
}
 else
{
    $email = $_GET['email'];  
    $key = $_GET['key'];
    $email = $link ->real_escape_string($email);
    $key = $link->real_escape_string($key);
    $sql = "UPDATE affiliates SET affiliation_activation = 'active' WHERE affiliation_email = '$email' AND affiliation_activation = '$key' LIMIT 1";
    if($link-> query($sql))
    {
                if($link->affected_rows == 1)
                {
                   echo "<div class = 'alert alert-success'>Congratulations.You are now a member of Dog Matrimony Family. </div>"; 
                    echo '<a href = "index.php" class = "button btn-small btn-success"> Login </a>';
                }
            }
            else
            {
                echo "<div class = 'alert alert-danger'>You account could not be activated </div>"; 
            }

            

                }

            

        ?>    

    </div>

    </div>

</div>

<script

src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j

query.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>