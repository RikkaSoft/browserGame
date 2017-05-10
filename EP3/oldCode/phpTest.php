<?php
   
$name = "Rikko";
$level = 4;
$armyStrength = 241;

$array = ["name"=>$name,"armyStrength"=>$armyStrength, "level"=>$level];

echo "Your name is " . $array["name"] . "<br>";
echo "Your level is " . $array["level"] . "<br>";
echo "Your army strength is " . $array["armyStrength"] . "<br>";


if($array["name"] === "Rikka"){
    echo "Your name is awesome";
}
elseif($array["name"] === "Rikko" && $array["level"] > 5){
    echo "Your name is pretty good";
}
else{
    echo "You should switch your name to Rikka";
}
echo "<br>";

if($array["level"] > 5 || $array["armyStrength"] > 300){
    echo "You are gonna win this";
}
else{
    echo "You suck";
}

echo "<br>";
$array = [11,2,3,41,25,38];

for($i = 0; $i < count($array);$i++){
    if($array[$i] < 10){
        echo $array[$i] . " is lower than 10<br>";
    }
}

    
?>