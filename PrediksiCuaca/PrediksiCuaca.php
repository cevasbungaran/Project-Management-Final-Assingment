<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="PrediksiCuaca.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>

    <div class="header">
        <img src="sun-removebg-preview.png" alt="sun">
        <a href="../homepage.php">
            <h1 id="title">AUSTRALIA WEATHER</h1>
        </a>
    </div>

    <div class="content">
        <form action="../PrediksiCuaca/prediksi.php" method="POST" class="form">

            <div id="hum9am">
                <input name="hum9" class="hum9" type="text" placeholder="Humidity 9 AM">
            </div>

            <div id="hum3pm">
                <input name="hum3" class="hum3" type="text" placeholder="Humidity 3 PM">

            </div>

            <div id="boxRainfall">
                <input name="rainfall" class="rainfall" type="text" placeholder="Rainfall">

            </div>

            <div id="boxSunshine">
                <input name="sunshine" class="sunshine" type="text" placeholder="Sunshine">

            </div>

            <input type="submit" class="submit" value="Check Weather">
        </form>

        <div class="predictRes">
            <?php
            if (isset($_GET['resToday'])) {
                if ($_GET['resToday'] == 1) {
                    echo '
                <div class="column" style="background-color:#aaa;">
                <h3 class="hari">Today</h3>
                <img class="gambar" src="png-transparent-thunderstorm-cloud-free-content-realistic-weather-s-angle-website-thunder-removebg-preview.png">
                <h4 class="text">Better stay inside</h4>
                </div>
                    ';
                } else if ($_GET['resToday'] == 0) {
                    echo '
                <div class="column" style="background-color:#aaa;">
                <h3 class="hari">Today</h3>
                <img class="gambar" src="png-transparent-look-at-weather-free-content-of-hot-weather-cloud-weather-forecasting-computer-wallpaper-removebg-preview.png">
                <h4 class="text">its not raining today, good day to go out</h4>
                </div>
                    ';
                }
            }

            if (isset($_GET['resTomorrow'])) {
                if ($_GET['resTomorrow'] == 1) {
                    echo '
                <div class="row">
                <div class="column" style="background-color:#aaa;">
                <h3 class="hari">Tomorrow</h3>
                <img class="gambar" src="png-transparent-thunderstorm-cloud-free-content-realistic-weather-s-angle-website-thunder-removebg-preview.png">
                <h4 class="text">Better stay inside</h4>
                </div>
                </div>
                    ';
                } else if ($_GET['resTomorrow'] == 0) {
                    echo '
                <div class="row">
                <div class="column" style="background-color:#aaa;">
                <h3 class="hari">Tomorrow</h3>
                <img class="gambar" src="png-transparent-look-at-weather-free-content-of-hot-weather-cloud-weather-forecasting-computer-wallpaper-removebg-preview.png">
                <h4 class="text">its not raining tomorrow, good day to go out</h4>
                </div>
                </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
    <!--<div class="row">
        <div class="column" style="background-color:#aaa;">
            <h3 class="hari">Today</h3>
            <img class="gambar" src="png-transparent-look-at-weather-free-content-of-hot-weather-cloud-weather-forecasting-computer-wallpaper-removebg-preview.png">
            <h4 class="text">it's not raining today, good day to go out</h4>
        </div>
        <div class="column" style="background-color:#bbb;">
            <h3 class="hari1">Tomorrow</h3>
        </div>
        <img class="gambar1" src="png-transparent-thunderstorm-cloud-free-content-realistic-weather-s-angle-website-thunder-removebg-preview.png">
        <h4 class="text1">There's gonna be a storm tomorrow
            better stay inside </h4>
    </div>-->
</body>

</html>