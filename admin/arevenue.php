<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>revenue</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f0f0f0;
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
    .display-container {
      display:flexbox;
      align-items: center;
      margin: 20px;
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
      flex-wrap: wrap;
      margin-left: 94px;
      margin-top: 50px;
      /* border: 1px solid black; */
      width: 1350px;
      height: 800px;
      flex-direction: column;
      max-height: 500px; 
      overflow-y: scroll;
      background-color: #fff; 
      border-radius: 20px;  
    }
    /* table,th,tr,td{
        border: 1px solid;
    } */
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th{
        height: 50px;
        padding: 15px;
        border-bottom: 1px solid #ada9a9;
        background-color: #d8d7d7;
    }
    td{
        height: 40px;
        text-align: center;
        padding: 15p;
        border-bottom: 1px solid #ada9a9;
    }
    tr:hover{
        background-color: #d1cece;
    }
    header img{
        width: 40px;
        height: auto;
        float: left;
        margin-top: -35px;
    }
    </style>
</head>
<body>
    <header>
        <h1>Revenue</h1>
        <a href="index.html">
        <img src="home.png" alt="Header Image"></a>
    </header>
    <div class="display-container">
        <table>
            <tr>
                <th>Transaction id</th>
                <th>Amount</th>
                <th>Date & Time</th>
                <th>Method</th>
                <th>Status</th>
                <th>Booking id</th>
            </tr>
            <?php
            $conn = pg_connect("host=192.168.16.1 port=5432 dbname=tya17 user=tya17");
            if (!$conn) {
                die("Error.");
            }

            $q = "select * from transaction";
            // $str = 4;
            // $q ="select * from vehicle where seater='$str'";
            $result = pg_query($conn, $q);
            while ($row = pg_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["t_id"] ?></td>
                    <td><?php echo $row["amount"] ?></td>
                    <td><?php echo $row["date_time"] ?></td>
                    <td><?php echo $row["method"] ?></td>
                    <td><?php echo $row["status"] ?></td>
                    <td><?php echo $row["booking_id"] ?></td>

                </tr>
            <?php
            }
            pg_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
