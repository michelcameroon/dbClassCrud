
<h1> insert </h1>

<?php
echo "begin insert";

print ("<form action='insert1.php' method= 'POST' >" );

//	print (" give here the firstName : <br />");
print ("<br>id= <br>");
print ("<input type= 'text' name= 'id' placeholder= '' />");
print ("<br>firstName= <br>");

print ("<input type= 'text' name= 'firstName' placeholder= 'type the firstName' />");

print ("<br>lastName= <br>");

print ("<input type= 'text' name= 'lastName' placeholder= 'type the lastName' />");


print ("<br><input type= 'submit' value= 'insert' />");


print ("</form>" );


?>
