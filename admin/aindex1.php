<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Example</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #fff;
    }
    .navbar {
      background-color: #1c1b1b;
      color: #fff;
      padding: 10px 20px;
      height: 45px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .logo {
      font-size: 30px;
      font-weight: bolder;
    }
    .hamburger-menu {
      cursor: pointer;
    }
    .menu-items {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    .menu-items a{
      margin-right: 20px;
      font-size: 20px;
      font-weight: normal;
      border-bottom:2px solid #fc5902;
      padding: 10px 12px; 
      text-transform:capitalize;
      color: #fc5902;
      text-decoration: none;
      line-height: 30px;
    }
    .logout-button {
      background-color:#fc5902 ;
      color: #fff;
      font-weight: bolder;
      padding: 10px 17px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: medium;
    }
    .logout-button:hover{
      background-color: #fff;
      color: #fc5902;
      border: 2px solid #fc5902;

    }
    .menu-items {
      display: none; 
      flex-direction: column;
      position: absolute;
      top: 65px; 
      left: 0;
      background-color: whitesmoke;
      width: 18%;
      height: 670px;  
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0 ,0 ,0 ,0.19);
    }
    .menu-item{
        margin: 10px 20px;
    }
    @media screen and (max-width: 768px) {
      .menu-items {
        display: flex;  
      }
    }
    .menu-items.active {
        display: flex;
    }
    nav {
      display: flex;
      justify-content: center;
      margin: 35px;
    }

    nav a {
      text-decoration: none;
      color: rgb(39, 39, 39);
      background-color: whitesmoke;
      padding: 10px 25px;
      margin: 8px 8px;
      border-radius: 8px;
      font-weight:normal;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }

    nav a:hover {
      background-color:grey;
      color: #fff;
    }
    .num{
      text-align: center;

    }
    .display-container {
      display:flexbox;
      align-items: center;
      margin: auto;
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
      flex-wrap: wrap;
      margin-left: 430px;
      margin-top: 80px;
      /* border: 2px solid grey; */
      width: 700px;
      height: 400px;
      flex-direction: column;
      max-height: 500px; 
      overflow-y: scroll;
      background-color: whitesmoke;
      border-radius: 20px;  
      /* box-shadow: 12px 12px 5px 5px rgb(209, 208, 208); */
    }
    .box{
      width: 500px;
      height: 80px;
      box-sizing: border-box;
      text-align:center;
     margin: 25px 85px  ;
      /* margin: 30px 30px; */
      background-color: #fff; 
      border-radius: 15px; 
      font-size: 20px;
      box-shadow: 12px 12px 5px 5px rgb(209, 208, 208);
      
    }
    /* #iframeContainer {
      position: absolute;
      top: 150px; 
      left: 494px; 
      width: 750px; 
      height: 550px; 
      border: 2px solid #ccc;
      display: none;  
    } */
  </style>
</head>
<body>
  <div class="navbar">
     <div class="hamburger-menu" onclick="toggleMenu()">&#9776;</div>
    <div class="logo">Distanz</div>
    <div class="menu-items">
        <a href="profile.html">Profile</a>
        <!-- <a href="#" id="toggleLink" onclick="toggleIframe()">Profile</a> -->
        <a href="arvehicle.php">Registered vehicles</a>
        <a href="abooking.php">Bookings</a>
        <a href="transactions.html">Transactions</a>
        <a href="revenue.html">Revenue</a>
    </div> 
    <button class="logout-button">Logout</button>
  </div>
  <?php
        $conn = pg_connect("host=localhost port=5432 dbname=New user=postgres password=Sunil24");
        if (!$conn) {
            die("Connection failed");
        }
        $b = "SELECT COUNT(*) FROM booking";
        $c = "SELECT COUNT(*) FROM customer";
        $rv = "SELECT COUNT(*) FROM vehicle";
        $rd = "SELECT COUNT(*) FROM driver";

        $result = pg_query($conn, $b);
        if (!$result) {
          echo "Error";
        }
        $cresult = pg_query($conn, $c);
        if (!$cresult) {
          echo "Error";
        }
        $rvresult = pg_query($conn, $rv);
        if (!$rvresult) {
          echo "Error";
        }
        $rdresult = pg_query($conn, $rd);
        if (!$rdresult) {
          echo "Error";
        }

        $row = pg_fetch_row($result);
        $bcount = $row[0];
        $row = pg_fetch_row($cresult);
        $ccount = $row[0];
        $row = pg_fetch_row($rvresult);
        $vcount = $row[0];
        $row = pg_fetch_row($rdresult);
        $dcount = $row[0];


        pg_close($conn);
?>

  <nav>
    <a href="abooking.php">Total bookings<p class="num"><?php echo "$bcount"?></p></a>
    <a href="arcustomers.php">Registered Customers<p class="num"><?php echo "$ccount"?></p></a>
    <a href="arvehicle.php">Registered Vehicles<p class="num"><?php echo "$vcount"?></p></a>
    <a href="ardriver.php">Registered Drivers<p class="num"><?php echo "$dcount"?></p></a>
  </nav>
  <div class="display-container">
    <div class="box box1">
      <p>Box 1 Text</p>
    </div>
      <div class="box box2"> 
      <p>Box 2 Text</p>
    </div>
    <div class="box box3">
      <p>Box 3 Text</p>
    </div>
    <div class="box box4">
      <p>Box 4 Text</p>
    </div> 
    <div class="box box5">
      <p>Box 5 Text</p>
    </div>
  </div>
  <div id="iframeContainer">
  </div>
<script>
    function toggleMenu() 
    {
      var menu = document.querySelector('.menu-items');
      menu.classList.toggle('active');
       }
    // function toggleIframe() 
    // {
    //   var iframeContainer = document.getElementById('iframeContainer');
    //   if (iframeContainer.style.display === 'none') 
    //  {
    //     iframeContainer.style.display = 'block';
    //     document.querySelector('iframe').src = 'profile.html';
    //  }
    //  else
    //  {
    //   iframeContainer.style.display = 'none';
    //  }
    // }
</Script>
</body>
</html>
