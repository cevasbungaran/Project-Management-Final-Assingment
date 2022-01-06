<?php
    $humidity9am = $_GET['hum9'];
    $humidity3pm = $_GET['hum3'];
    $rainfall = $_GET['rainfall'];
    $sunshine = $_GET['sunshine'];

    $today = exec("python3 rainToday.py $humidity9am $humidity3pm $rainfall $sunshine");
    $tomorrow = exec("python3 rainTomorrow.py $humidity9am $humidity3pm $rainfall $sunshine");

    header("Location: PrediksiCuaca.php?resToday=" .$today[1]."&resTomorrow=" .$tomorrow[1]);
?>