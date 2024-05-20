<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registered customers</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            height: 100vh;
        }

        header {
            background-color: rgb(30, 30, 30);
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
            display: flexbox;
            align-items: center;
            margin: 20px;
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            flex-wrap: wrap;
            margin-left: 5%;
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
    </style>
</head>

<body>

    <header>
        <h1>Registered customers</h1>
        <a href="aindex1.php">
            <img src="home.png" alt="Header Image"></a>
    </header>
    <div class="display-container">
        <table>
            <tr>
                <th>Customer id</th>
                <th>Customer name</th>
                <th>Email id</th>
                <th>Contact number</th>
                <th>Address</th>
            </tr>
            <?php
            $conn = pg_connect("host=192.168.16.1 port=5432 dbname=tya17 user=tya17");
            if (!$conn) {
                die("Error.");
            }

            $q = "select * from customer";
            // $str = 4;
            // $q ="select * from vehicle where seater='$str'";
            $result = pg_query($conn, $q);
            while ($row = pg_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["cust_id"] ?></td>
                    <td><?php echo $row["cust_name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["contact_no"] ?></td>
                    <td><?php echo $row["address"] ?></td>
                

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
