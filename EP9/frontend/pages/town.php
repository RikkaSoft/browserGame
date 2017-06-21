<?php
include(__ROOT__ . "/backend/stownFunctions.php");

getResources();
echo "<div id='townArea'>";
    getTown();
echo "</div>";

#createBuilding(0, 1);


?>