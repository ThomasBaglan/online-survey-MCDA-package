<?php session_start();?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Profile</title>
        <link rel="stylesheet" href="style.css" />
        

    </head>


    <body>
        <?php
        		include("online-survey-MCDA-package/web/fonction.php");
            $arg_profile=$_SESSION["stageete"]["arg_profile"];
            $key=save_key($_POST);
            
            $arg_assignement=set_arg($_POST, $key, count($_POST));
            
            $arg_complete=$arg_assignement." ".$arg_profile;
            
            $path="online-survey-MCDA-package/R/assignments.R";
            $command=send_to_R($path, $arg_complete);
            
            exec($command, $result);
            for($i=0; $i<count($result); $i++) {
            	echo $result[$i]."<br>"; //Not usefull yet, just to try to see if the R program is run (particularly the MCDA library)
            
            }
        ?>
            
        
    </body>

</html>