<!DOCTYPE html>
<html>

<head>
  <title>Rentang Cuaca</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="RentangCuaca.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>
</head>

<body>
  <div class="header">
    <img src="sun-removebg-preview.png" alt="sun">
    <a href="../homepage.php">
      <h1 id="title">AUSTRALIA WEATHER</h1>
    </a>
  </div>
  <div id="boxTanggal">
    <input name="tanggal" class="tanggal" type="date">
  </div>
  <div class="form">
    <form action="">


      <div id="boxKota">
        <input list="country" name="kota" class="kota" placeholder="Country">
        <datalist id="country">

          <option value="Albury"></option>
          <option value="BadgerysCreek"></option>
          <option value="Cobar"></option>
          <option value="CoffsHarbour"></option>
          <option value="Moree"></option>
          <option value="Newcastle"></option>
          <option value="NorahHead"></option>
          <option value="NorfolkIsland"></option>
          <option value="Penrith"></option>
          <option value="Richmond"></option>
          <option value="Sydney"></option>
          <option value="Wollongong"></option>
          <option value="Tuggeranong"></option>
          <option value="MountGinini"></option>
          <option value="Ballarat"></option>
          <option value="Bendigo"></option>
          <option value="Sale"></option>
          <option value="MelbourneAirport"></option>
          <option value="Mildura"></option>
          <option value="Nhil"></option>
          <option value="Portland"></option>
          <option value="Watsonia"></option>
          <option value="Dartmoor"></option>
          <option value="Brisbane"></option>
          <option value="Cairns"></option>
          <option value="GoldCoast"></option>
          <option value="Townsville"></option>
          <option value="Adelaide"></option>
          <option value="MountGambier"></option>
          <option value="Nuriootpa"></option>
          <option value="Woomera"></option>
          <option value="Albany"></option>
          <option value="Witchcliffe"></option>
          <option value="PearceRAAF"></option>
          <option value="PerthAirport"></option>
          <option value="Perth"></option>
          <option value="SalmonGums"></option>
          <option value="Walpole"></option>
          <option value="Hobart"></option>
          <option value="Launceston"></option>
          <option value="AliceSprings"></option>
          <option value="Darwin"></option>
          <option value="Katherine"></option>
          <option value="Uluru"></option>
        </datalist>
      </div>
      <!--Sunday-->
      <div id="sunday">
        <h4>07.00</h4>
        <h4>Sunday</h4>
        <span class="bi bi-cloud-sun-fill" style="font-size: 50px">
          <h4>SUNSHINE</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Monday-->
      <div id="monday">
        <h4>14.00</h4>
        <h4>Monday</h4>
        <span class="bi bi-cloud-sun-fill" style="font-size: 50px">
          <h4>SUNSHINE</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Tuesday-->
      <div id="tuesday">
        <h4>18.00</h4>
        <h4>Tuesday</h4>
        <span class="bi bi-cloud-lightning-fill" style="font-size: 50px">
          <h4>THUNDERSTROM</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Wednesday-->
      <div id="wednesday">
        <h4>22.00</h4>
        <h4>Wednesday</h4>
        <span class="bi bi-cloud-lightning-fill" style="font-size: 50px">
          <h4>STROM</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Thursday-->
      <div id="thursday">
        <h4>12.00</h4>
        <h4>Thursday</h4>
        <span class="bi bi-cloud-sun-fill" style="font-size: 50px">
          <h4>SUNSHINE</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Friday-->
      <div id="friday">
        <h4>15.00</h4>
        <h4>Friday</h4>
        <span class="bi bi-cloud-lightning-fill" style="font-size: 50px">
          <h4>STROM</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <!--Saturday-->
      <div id="saturday">
        <h4>15.00</h4>
        <h4>Saturday</h4>
        <span class="bi bi-cloud-lightning-fill" style="font-size: 50px">
          <h4>STROM</h4>
        </span>
        <p>Min Temp : 24 C</p>
        <p>Max Temp : 28 C</p>
        <p>Rainfall : 0</p>
      </div>
      <div id="boxgrafik">
        <canvas id="grafik" style="width:100%;max-width:700px"></canvas>
        <script>
          var xValues = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
          new Chart("grafik", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{ 
              data: [24,24,24,24,24,24,24],
              borderColor: "green",
              fill: false
            }, { 
                data: [28,28,28,28,28,28,28],
                borderColor: "red",
                fill: false
            }, { 
                data: [0,0,0,0,0,0,0,0],
                borderColor: "blue",
                fill: false
            }]
          },
          options: {
            legend: {display: false}
          }
        });
        </script>
      </div>
</body>
</html>