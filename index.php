<?php
    $link = 'http://api.openweathermap.org/data/2.5/weather';
    $idcity = '524901';
    $appid = '39679d58e311e94a32d72cb553735dcc';
    $lang='ru';
    $units='metric';
    $file="$link?id=$idcity&lang=$lang&units=$units&appid=$appid";
    $string=file_get_contents ($file)or exit('Не удалось получить данные');
    $weather = json_decode($string);
    if ($weather === null) {
        exit('Ошибка декодирования json');
    }
    $temp=$weather->main->temp;
    $pressure=$weather->main->pressure;
    $description=$weather->weather[0]->description;
    $icon=$weather->weather[0]->icon.".png";
    $city = $weather->name;
    $date = date("F j, Y");
    ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Данные о погоде</title>
  </head>
  <body>
<?php
    echo $city . " - " .$date . "<br>";?>
    Температура: <?php echo(!empty($temp)) ? " $temp &deg;C<br>" : 'не удалось получить температуру';?>
    Осадки: <?php echo (!empty($description)) ? " $description <br>" : 'не удалось получить данные по осадкам'; ?>
    Давление: <?php echo (!empty($pressure)) ? "$pressure  мм рт ст <br>" : 'не удалось получить данные по давлению' ; ?>
    <?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >"; ?>

  </body>
</html>
