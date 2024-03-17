<?php
if(isset($_POST['send'])){
   echo "<p>". $_POST['pseudonim'] ."</p>";
   echo "<p><b>". $_POST['kom'] ."</b></p>";
   echo "<p>".htmlspecialchars("<b>".$_POST['kom']."</b>") ."</p>";
}
?>