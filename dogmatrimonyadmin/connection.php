<?php

    $link = new mysqli("localhost","webshoff_dogmatrimony","hTnqAgbzG3","webshoff_dogmatrimony");
           if($link -> connect_errno > 0)
    {
        die ("Unable to connect to database : " . $link ->connect_error);
    }

?>