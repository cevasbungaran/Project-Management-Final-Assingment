<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="homepagestyle.css">

    <title>Home Page</title>
</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="">
                <img src="img/img1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/img2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/img3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>

        <div class="carousel-caption d-none d-md-block" id="konten">
            <div class="report">
                <a href="../manpro/Rentang Cuaca/RentangCuaca.php"> Weekly Report Weather</a>
            </div>
            <div class="matahari">
                <img src="img/sun-removebg-preview.png" style="width: 80px;">
            </div>
            <h1>Welcome to Australia Weather</h1>
            <h3>Your Daily Weather Report</h3>
            <br>
            <!--<div class="input">
                <div class="humi9am">
                    <label for="humi9am">Humidity 9AM</label>
                    <br>
                    <input class="btn btn-light" type="text" style="width: 160px;" placeholder="Humidity 9AM">
                </div>
                <div class="humi3pm">
                    <label for="humi3pm">Humidity 3PM</label>
                    <br>
                    <input class="btn btn-light" type="text" style="width: 160px;" placeholder="Humidity 3PM">
                </div>
                <div class="rainfall">
                    <label for="rainfall">Rainfall</label>
                    <br>
                    <input class="btn btn-light" style="width: 160px;" type="text" placeholder="Rainfall">
                </div>
                <div class="sunshine">
                    <label for="sunshine">Sunshine</label>
                    <br>
                    <input class="btn btn-light" type="text"style="width: 160px;" placeholder="Sunshine">
                </div>
                <br>
            </div>-->
            <a href="PrediksiCuaca/PrediksiCuaca.php">
                <button class="btn btn-light" id="check">Check Weather</button>
            </a>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="text">
        <p>Weather refers to the state of the atmosphere and includes temperature, precipitation, humidity, cloudiness, visibility, pressure, and winds. 
            Weather, as opposed to climate, includes the short-term variations of the atmosphere, ranging from minutes to months.
        In this website, you can check the weather of your location. You can also see weekly weather report.</p>
    </div>
</body>

</html>