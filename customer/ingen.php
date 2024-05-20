<?php
                      session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="ingen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>

.book {
    height: 100vh;
    width: 28%;
    position: fixed;
    top: 0;
    right: 0;
    z-index: 1;
    padding: 7% 2%;
    background: #fff;
    display: none;
    /* border: 2px solid; */
    box-shadow: -20px 0px 150px 150px #fe5b3d;
}


.book span {
    font-size: 16px;
    margin: 5px 0;
    display: inline-block;
    color: #a71830;
    font-weight: 300;
    letter-spacing: 1px;

}

.book form input {
    width: 100%;
    padding: 10px 20px;
    outline: none;
    font-weight: 400;
    border: 1px solid #607d8b;
    font-size: 16px;
    letter-spacing: 1px;
    color: #607d8b;
    background: transparent;
    border-radius: 30px;
}

.book .s-btn {
    margin-top: 10px;
    /* margin: 15px 10px; */
    /* width: 100%; */
}

.book .s-btn input {
    background: #c00606;
    color: #fff;
    outline: none;
    border: none;
    font-weight: 500;
    cursor: pointer;
}

.book .s-btn input:hover {
    background: #4d0404;
}

.book .lb {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.book .lb img{
    font-size: 20px;
    cursor: pointer;
}

.display-container{
	margin-top: 6rem;
}

h1 {
            margin: 0;
            top: 0;
            width: 100%;
            font-size: 24px;
        }

        .display-container {
            display: flexbox;
            align-items: center;
            margin: 20px;
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            flex-wrap: wrap;
            margin-left: 5%;
            margin-top: 80px;
            width: 1350px;
            height: 800px;
            flex-direction: column;
            max-height: 500px;
            overflow-y: scroll;
            border-radius: 8px;
            background-color: whitesmoke;

        }

        header img {
            width: 40px;
            height: auto;
            float: left;
            margin-top: -35px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        th {
            height: 50px;
            padding: 15px;
            /* border-bottom: 1px solid #ada9a9; */
            background-color: #d8d7d7;
        }

        td {
            height: 40px;
            text-align: center;
            padding: 15p;
            /* border-bottom: 1px solid #ada9a9; */
        }

        th,
        td {
            border: 1px solid black;
        }

        tr:hover {
            background-color: #d1cece;
        }

        .date-form {
            background-color: whitesmoke;
            /* border: 1px solid #ccc; */
            padding: 20px;
            text-align: center;
            top: 40px;
            height: 90px;
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
            margin-inline-start: 35px;
        }

        .form-group label {
            display: contents;
            font-weight: 600;
            margin-bottom: 5px;
            color: black;
        }

        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid orangered;
        }

        .button1 {
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

        .button1:hover {
            background-color: #fff;
            border: 2px solid rgb(235, 84, 29);
            color: rgb(235, 84, 29);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="./img/jeep.png" alt="logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="cindex.php">Home</a></li>
        </ul>
        <div class="header-btn">
            <a href="logout.php" class="logout">SignOut</a>
        </div>
    </header>

	<div class="display-container">
        <table>
            <tr>
                <th>Booking id</th>
                <th>Fare</th>
                <th>Route Id</th>
                <th>Customer id</th>
                <th>Vehicle id</th>
                <th>source</th>
                <th>destination</th>
                <th>dateofpickup</th>
                <th>dropdate</th>
                <th>pickupaddress</th>
                <th>name</th>
                <th>contact</th>
            </tr>
            <?php
            $db = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
            if (!$db) {
                die("Error.");
            }
	$c=$_SESSION['contact'];
            $q = "select * from booking where contact=$c";
            // $str = 4;
            // $q ="select * from vehicle where seater='$str'";
            $result = pg_query($db, $q);
            while ($row = pg_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["booking_id"] ?></td>
                    <td><?php echo $row["fare"] ?></td>
                    <td><?php echo $row["route_id"] ?></td>
                    <td><?php echo $row["cust_id"] ?></td>
                    <td><?php echo $row["vehicle_id"] ?></td>
                    <td><?php echo $row["source"] ?></td>
                    <td><?php echo $row["destination"] ?></td>
                    <td><?php echo $row["dateofpickup"] ?></td>
                    <td><?php echo $row["dropdate"] ?></td>
                    <td><?php echo $row["pickupaddress"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["contact"] ?></td>

                </tr>
                <!-- </table> -->
            <?php
            }
            pg_close($db);
            ?>
        </table>
    </div>
	

    <script src="main.js"></script>
</html>
