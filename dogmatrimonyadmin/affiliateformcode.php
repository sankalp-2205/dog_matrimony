<?php
session_start();
include 'connection.php';
$username = $_POST["username"];
$password = $_POST["password"];
$contact = $_POST["contact"];
$name = $_POST['name'];
$state = $_POST['state'];
$city = $_POST['city'];
$locality = $_POST['locality'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$organisation = $_POST['organisation'];
$rate = $_POST['rate'];
$category = $_POST['category'];
$username = $link ->real_escape_string($username); 
$name = $link ->real_escape_string($name); 
$password = $link ->real_escape_string($password);
$passwordencryted = $password;
$email = $link ->real_escape_string($email);
$contact = $link ->real_escape_string($contact);
$state = $link ->real_escape_string($state);
$city = $link ->real_escape_string($city);
$locality = $link ->real_escape_string($locality);
$address = $link ->real_escape_string($address);
$zip = $link ->real_escape_string($zip);
$organisation =$link ->real_escape_string($organisation);
$category =$link ->real_escape_string($category);
$rate =$link ->real_escape_string($rate);
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
{
    if($result->num_rows > 0)
    {
        echo "usernameexists";
        exit;
    }
}
$activation_code = bin2hex(openssl_random_pseudo_bytes(16));
            $sql = "INSERT INTO affiliates (affiliation_username,affiliation_password,owner_name,affiliation_contact,affiliation_email,organisation_name,affiliation_state,affiliation_city,affiliation_locality,affiliation_address,zip,rateperdog,profile_picture,category,affiliation_activation) VALUES ('$username','$passwordencryted','$name','$contact','$email','$organisation','$state','$city','$locality','$address' ,'$zip','$rate','NULL','$category','$activation_code')";
            if($link->query($sql))
            {
                //sending mail 
                $message = '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title></title>
        </head>
        <body>
        <div style="font-family:&quot;Gotham&quot;,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;overflow-x:hidden;padding:2em 0 0 1.5em;color:#333;background-color:#fff">
        <div>
          <div>
            <span style="font-family:Gotham,Arial,sans-serif;font-size:30px;line-height:30px;color:#333333;padding-bottom:22px;font-weight:bold">
      Hey '.$name.', you’re at the finish line!
    </span>
    
    <p style="font-family:Noway,Arial,sans-serif;font-size:18px;line-height:22px;color:#333333">
      You’re one step away from being a part of Dog Matrimony Family. Click the link below to activate your account<br>
      So, what are you waiting for?
    </p>
    
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;border-spacing:0px;width:auto"><tbody><tr>
    <td align="center" height="50" style="background-clip:padding-box;padding:0 22px;display:inline-block">
          <table border="0" cellpadding="0" cellspacing="0" style="width:100%"><tbody>
    <tr>
    <td height="0" style="font-size:1px;line-height:1px">&nbsp;</td>
            </tr>
    <tr>
    <td align="left" style="font-family:Gotham,Arial,sans-serif;font-size:14px;line-height:17px;color:#ffffff;font-weight:bold;margin-left:11px;margin-right:11px">
                <a style = "color: black;" href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliationactivation.php?email='.urlencode($email).'&key='.$activation_code.'">ACTIVATE ACCOUNT</a>
              </td>
            </tr>
    </tbody></table>
    </td>
      </tr></tbody></table>
    <p style="font-family:Gotham,Arial,sans-serif;font-size:30px;line-height:30px;color:#333333;font-weight:bold">
      Once you activate your account, here’s how you can get started:
    </p>

    
    <ul style="font-family:Noway,Arial,sans-serif;font-size:18px;line-height:22px;color:#333333;padding-left:16px">
    <li>
        Login Using The Following Credentials
      </li>
      <li>
       <b> Username:</b> '.$username.'
      </li>
      <li>
        <b> Password:</b> '.$password.'
      </li>
    </ul>
    <p style="font-family:Noway,Arial,sans-serif;font-size:18px;line-height:22px;color:#333333">
                Make Sure You Change Your Password Once You Activate Your Account
    </p>
    
    <hr style="margin-bottom:26px">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="400" style="width:400px;text-align:center"><tbody>
    <tr>
    <td align="center" style="font-family:Gotham Book,Arial,sans-serif;font-size:14px;line-height:21px;color:#8f8f8f;padding-bottom:35px">
          <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:auto;text-align:center"><tbody><tr>
    <th align="center" valign="top" style="font-weight:normal;vertical-align:top;font-family:Gotham Book,Arial,sans-serif;font-size:14px;line-height:21px;color:#b6b6b6">
                <a href="#" rel="noopener noreferrer" style="color:#8f8f8f;text-decoration:underline" target="_blank" data-saferedirecturl="#">Privacy policy</a>
    </th>
              <th align="center" valign="top" style="font-family:Gotham Book,Arial,sans-serif;font-size:14px;line-height:21px;color:#8f8f8f">&nbsp;|&nbsp;</th>
            </tr></tbody></table>
    </td>
      </tr>
    <tr>
    <td>
        </td>
      </tr>
    </tbody></table><div class="yj6qo"></div><div class="adL">
    </div></div><div class="adL">
        </div></div><div class="adL">
      </div></div> </div>
        </body>
        </html>';
                $header = "Content-type : text/html;";
                
                    $sent_mail = mail($email, "Confirm your registration", $message, $header);
                     if($sent_mail)
                    {
                        echo "<div class = 'alert alert-success'>Affiliate Added Successfully</div>";
                    }
                    else
                    {
                        echo "<div class = 'alert alert-danger'>Unable to register right now. Please try later</div>";
                    }
                
            }
            else{

                echo "<div class = 'alert alert-danger'>Unable to run mail sending query</div>";
                    
            }
    

?>