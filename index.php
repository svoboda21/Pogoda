<?php
    $file = "http://api.openweathermap.org/data/2.5/weather?id=524901&lang=ru&units=metric&APPID=39679d58e311e94a32d72cb553735dcc";
    $string=file_get_contents ($file);
 // file_put_contents("c:\prog\m.txt", $string);
    $pogoda = json_decode($string);
    $temp=$pogoda->main->temp;
    $davl=$pogoda->main->pressure;
    $osad=$pogoda->weather[0]->description;
    $icon=$pogoda->weather[0]->icon.".png";
    $city = $pogoda->name;
    $date = date("F j, Y");
    echo $city . " - " .$date . "<br>";
    echo "Температура: " . $temp ."&deg;C<br>";
    echo "Осадки: " . $osad ." <br>";
    echo "Давление: " . $davl ." мм рт ст <br>";
    echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";
