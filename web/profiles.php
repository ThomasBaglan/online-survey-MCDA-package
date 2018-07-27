<?php
session_start();
 ?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Profile</title>
        <link rel="stylesheet" href="style.css" />
        

    </head>


    <body>
        <?php
            
        		include("online-survey-MCDA-package/web/fonction.php"); // all the important functions are in this file
            $key=save_key($_POST);
            
		
		
            if(check_nb_criteria($key)){
            	echo "<div style='text-align:center'><b>On this page, 25 profiles have been generated according to the criteria you chose.<br>Please choose whether they are bad, neutral or good contributor's profiles</b></div><br>";
            	$path_to_file="online-survey-MCDA-package/R/profil_generation.R";
            	$arg_profile=set_arg($_POST, $key, count($_POST));
            	$_SESSION["stageete"]["arg_profile"]=$arg_profile; //[Website-name][name of the data that we save]
            	$command=send_to_R($path_to_file, $arg_profile);
            	exec($command, $result); //execute the R program 
            	generate_profil_form("assignments.php");
         	}
         	
         	else {         		
         		echo "<p> You checked less than 5 criteria, please click the link to check 5 of them :<p><br>";
					echo "<a href='realform.php'>Check the form</a>";
         	}
            ?>
            
        
    </body>

</html>


