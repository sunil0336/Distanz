<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registered vehicles</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        header {
            background-color: rgb(30, 30, 30);
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        nav {
            display: flex;
            justify-content: center;
            margin: 25px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            background-color: whitesmoke;
            padding: 20px 30px;
            margin: 10px 10px;
            border-radius: 5px;
            /* font-weight: ; */
            font-size: 20px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: grey;
        }

        .display-container {
            display: flexbox;
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
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 65px;
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
            font-size: 20px;
            font-weight: lighter;
        }

        tr:hover {
            background-color: #d1cece;
        }
    </style>
</head>

<body>

    <header>
        <h1>Registered Vehicles</h1>
        <a href="aindex1.php">
            <img src="home.png" alt="Header Image"></a>
    </header>

    <nav>
        <a href="#">4 Seater</a>
        <a href="#">7 Seater</a>
        <a href="#">14 Seater</a>
    </nav>
    <div class="display-container">
        <table>
            <tr>
                <th>Vehicle id</th>
                <th>Company & Model</th>
                <th>Year of Manufacture</th>
                <th>Seater</th>
                <th>Driver id</th>
            </tr>
            <?php
            $conn = pg_connect("host=192.168.16.1 port=5432 dbname=tya17 user=tya17");
            if (!$conn) {
                die("Error.");
            }

            $q = "select * from vehicle";
            // $str = 4;
            // $q ="select * from vehicle where seater='$str'";
            $result = pg_query($conn, $q);
            while ($row = pg_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["vehicle_id"] ?></td>
                    <td><?php echo $row["company_model"] ?></td>
                    <td><?php echo $row["year"] ?></td>
                    <td><?php echo $row["seater"] ?></td>
                    <td><?php echo $row["driver_id"] ?></td>

                </tr>
                <!-- </table> -->
            <?php
            }
            pg_close($conn);
            ?>
        </table>
    </div>
</body>

</html>
