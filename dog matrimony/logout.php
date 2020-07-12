<?php

if(array_key_exists("username",$_SESSION) && $_GET['logout']==1)

   {
        session_destroy();
        setcookie("remember_me", "" , time()-3600);
   }
?>