<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
if(isset($_POST["state"])){
    // Capture selected country
    $state = $_POST["state"];
    $stateArr = array(
        "Bihar" => array("Patna"),
        "Delhi" => array("New Delhi"),
        "Uttar Pradesh" => array("Noida","Greater Noida","Ghaziabad"),
        "Haryana" => array("Gurugram")
    );
    if($state == "Bihar" || $state == "Delhi" || $state == "Uttar Pradesh" || $state == "Haryana"){
        echo "<label id = 'citylabel' for='city'>City:</label><span id = 'citylabelstar' class='required'>*</span>";
        echo "<select id='city' class='form-control city' name = 'city'>
        <option selected>Select city</option>";
        foreach($stateArr[$state] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>
        <div class='valid-feedback mb3' id = 'cityerror' style = 'color: red'></div>
        <div class='form-group'>
                     <label id = 'localitylabel' for='locality'>Locality:</label><span id = 'localitylabelstar' class='required'>*</span>
                        <input type='text' id = 'locality' class='form-control' name = 'locality' placeholder='Locality'>
                        <div class='valid-feedback mb3' id = 'localityerror' style = 'color: red'></div>
                     </div>";
    }
}
?>