<?php

//Function that saves the keys of an array

function save_key($array) { 
	if(isset($array)) {
		$key=[];
		while ($test = current($array)) {
          $key[]= key($array);
          next($array);
      }
      return $key;
	}
	else {
		echo "The array has no key";

	}

}

//Function to check is there were exactly 5 chosen criteria

function check_nb_criteria($key_list) { // $key_list is built using save_key()
	if(count($key_list)==5) {
		return TRUE;
	}
	
	else {
		return FALSE;
	}	
}

//Function that creates an argument string for the R program

function set_arg($array, $key, $nbr) { //$nbr = the $array length
	$arg="";
	for($i=0; $i<$nbr; $i++) {
		$add=$array[$key[$i]];
		$arg=$arg." '$add'";
	}
	return $arg;
}

//Function that create the $command that is used to call the R program (used in exec())
function send_to_R($path, $arg) {
	$command="Rscript ".$path;
	$command=$command.$arg;
	return $command;
}


//Function that generates a form using the 25 profiles created by the R program profil_generation.R

function generate_profil_form($action) { //$action=name of the next survey page (ex :$action="page.php") 
	echo "<form method='post' action='$action'>"; 
   for($i=1; $i<26; $i++) {
   	$profile="images/profile_".$i.".png";
   	echo "<br><div class='imgform'><img src='$profile' alt='profile'><br>";
      echo "<input type='radio' id='pro".$i."' name='profil".$i."' required value='Bad' />";
      echo "<label for='pro".$i."'><b>Bad</b></label>";
      echo "<input type='radio' id='pro".$i."' name='profil".$i."' required value='Neutral' />";
      echo "<label for='pro".$i."'><b>Neutral</b></label>";
      echo "<input type='radio' id='pro".$i."' name='profil".$i."' required value='Good' />";
      echo "<label for='pro".$i."'><b>Good</b></label>";
      echo "</div><br>";
   }
   echo "<div style='text-align:center'><input type='submit' value='Send your answers'/></div><br><br>";
   echo "</form>";
}















?>