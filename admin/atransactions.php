<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>transactions</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
      height: 100vh;
    }

    header {
      background-color: rgb(30,30,30);
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
      top: 0;
      width: 100%;
      font-size: 24px;
    }
    .date-form {
      background-color: whitesmoke;
      /* border: 1px solid #ccc; */
      padding: 20px;
      text-align: center;
      top:40px;
      height:90px;
      width: 600px;
      margin-left: 28%;
      position: relative;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
      display: inline-flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-inline-start: 40px;
    }
    .form-group label {
      display: contents;
      font-weight: 600;
      margin-bottom: 5px;
    }
    .form-group input[type="date"] {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border-radius: 5px;
      border: 1px solid orangered;
    }

    button {
      background-color: rgb(235, 84, 29);
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      position: absolute;
      bottom: 0%;
      margin-left: -215px;
    }
    .button1:hover{
      background-color:#fff;
      border: 2px solid rgb(235, 84, 29);
      color: rgb(235, 84, 29);
      font-weight: bold;
    }
    .display-container {
      display:flexbox;
      align-items: center;
      margin: 20px;
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
      flex-wrap: wrap;
      margin-left: 94px;
      margin-top: 100px;
      /* border: 1px solid black; */
      width: 1350px;
      height: 800px;
      flex-direction: column;
      max-height: 500px; 
      overflow-y: scroll;
      border-radius: 8px; 
      background-color: whitesmoke;  
    }
    header img{
        width: 40px;
        height: auto;
        float: left;
        margin-top: -35px;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0 ,0 ,0 ,0.19);
    }
    th{
        height: 50px;
        padding: 15px;
        /* border-bottom: 1px solid #ada9a9; */
        background-color: #d8d7d7;
    }
    td{
        height: 40px;
        text-align: center;
        padding: 15p;
        /* border-bottom: 1px solid #ada9a9; */
    }
    th,td{
        border: 1px solid black;
    }
    tr:hover{
        background-color: #d1cece;
    }
</style>
</head>
<body>

  <header>
    <h1>Transactions</h1>
    <a href="index.html">
    <img src="home.png" alt="Header Image"></a>
  </header>
  <div class="date-form">
    <div class="form-group">
      <label for="fromDate">From:</label>
      <input type="date" id="fromDate" name="fromDate" required>
    </div>

    <div class="form-group">
      <label for="toDate">To:</label>
      <input type="date" id="toDate" name="toDate" required>
    </div>

    <button type="button" class="button1">Search</button>
  </div>
  <div class="display-container">
    <table>
      <tr>
          <th>Booking id</th>
          <th>Route id</th>
          <th>Date & Time</th>
          <th>Driver payment</th>
          <th>Customer id</th>
          <th>Driver id</th>
          <th>Vehicle id</th>
      </tr>
      <?php
            $conn = pg_connect("host=192.168.16.1 port=5432 dbname=tya17 user=tya17");
            if (!$conn) {
                die("Error.");
            }

            $q = "select * from booking";
            // $str = 4;
            // $q ="select * from vehicle where seater='$str'";
            $result = pg_query($conn, $q);
            while ($row = pg_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["booking_id"] ?></td>
                    <td><?php echo $row["route_id"] ?></td>
                    <td><?php echo $row["date_time"] ?></td>
                    <td><?php echo $row["dprice"] ?></td>
                    <td><?php echo $row["cust_id"] ?></td>
                    <td><?php echo $row["driver_id"] ?></td>
		    <td><?php echo $row["vehicle_id"] ?></td>
                </tr>
            <?php
            }
            pg_close($conn);
            ?>
     </table>
      
  </div>
  </body>
  </html>
