<footer>

<div id ="footerleft">
Mentions légales
<br/>
Breadcrumbs 

</div>

<div id ="footermiddle">
Domisep

</div>


<div id= "footerright">

<?php
//heure
function showtime(){
date_default_timezone_set("Europe/Paris");
echo "" . date("d/m/Y") . "<br>";
echo "" . date("h:i:s");
}
showtime();
?>
<br/>
<br/>
<strong>Contact</strong>
</div>

</footer>