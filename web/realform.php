<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>FORM</title>
        
        <!-- Javascript to be sure user can just check 5 checkbox at most -->
        
        <script language="JavaScript">
            var nbCheck = 0;
             
            function isChecked(elmt)
            {
                if( elmt.checked )
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
             
            function clickCheck(elmt)
            {
                if( (nbCheck < 5) || (isChecked(elmt) == false) )
                {
                    if( isChecked(elmt) == true )
                    {
                        nbCheck += 1;
                    }
                    else
                    {
                        nbCheck -= 1;
                    }
                }
                else
                {
                    elmt.checked = '';
                }
            }
        </script>

    </head>

    <!-- Form to choose 5 criteria out of the 10 -->
    <body>
        <form action="profiles.php" method="post">
                 
                 <p>According to you, choose the 5 most important criteria to be a good developer :
                 </p>
                 <p>
                     <input type="checkbox" name="commu" onclick="clickCheck(this);" value="Communication skills"><label>Communication skills</label>
                 </p>
                 <p>
                     <input type="checkbox" name="commi" onclick="clickCheck(this);" value="Commitment to the project"><label>Commitment to the project</label>
                 </p>
                 <p>
                     <input type="checkbox" name="work" onclick="clickCheck(this);" value="Working with others"><label>Working with others</label>
                 </p>
                 <p>
                     <input type="checkbox" name="press" onclick="clickCheck(this);" value="Pressure and stress \n related managing capacity"><label>Pressure and stress related managing capacity</label>
                 </p>
                 <p>
                     <input type="checkbox" name="crea" onclick="clickCheck(this);" value="Creativity"><label>Creativity</label>
                 </p>
                 <p>
                     <input type="checkbox" name="quan" onclick="clickCheck(this);" value="Quantity of code produced"><label>Quantity of code produced</label>
                 </p>
                 <p>
                     <input type="checkbox" name="qual" onclick="clickCheck(this);" value="Quality of code produced"><label>Quality of code produced</label>
                 </p>
                 <p>
                     <input type="checkbox" name="glob" onclick="clickCheck(this);" value="Global picture"><label>Global picture</label>
                 </p>
                 <p>
                     <input type="checkbox" name="docu" onclick="clickCheck(this);" value="Documentation and testing"><label>Documentation and testing</label>
                 </p>
                 <p>
                     <input type="checkbox" name="cont" onclick="clickCheck(this);" value="Contributions on other aspects"><label>Contributions on other aspects</label>
                 </p>
                 <p>
                         <input type="submit" value="Send">                 
                 </p>
        </form>
            
    

    </body>

</html>