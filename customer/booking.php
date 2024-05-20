<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
                .book {
                    
                    width: 28%;
                    position: absolute;
                    top: 2rem;
                    left: 35%;
                    padding: 2rem;
                    padding: 5% 2%;
                    background: #fff;
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
                    width: 88%;
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
                    width: 98%;
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

                .book textarea {
                    height: 5rem;
                    padding: .5rem;
                    width: 86%;
                    margin: 0px 15px;
                }

                .hidee{
                    display: none;
                }
    </style>
</head>
<body>
<?php
    session_start();
    if (isset($_GET['id'])){
        // echo "<script>alert('HELLO');</script>";
        $db = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
        if (!$db) {
            die("Error.");
        }
        
        $carid = $_GET['id'];
        $s = $_GET['s'];
        $d = $_GET['d'];
        $pd = $_GET['pd'];
        $dd = $_GET['dd'];
        $p = $_GET['price'];
        
        $q = "select * from routes where sname = '$s' and dname = '$d'";
        $rst = pg_query($db ,$q);
        if(!$rst){
            echo "Can't run query";		 	
        }
        else{
            $anr = pg_fetch_row($rst);
            $rout_id = $anr[0];
        }
        
    }
    ?>
<div class="book">
    <div class="lb">
        <h2>Booking Form</h2>
    </div>
    <form name="bform" action="ccc.php" method="post">
        
        <span><b>Your Name:</b></span>
        <input type="text" name="name">
            
            <span><b>Phone Number:</b></span>
            <input type="text" name="contact">
            
            <div class="hidee">
                <input type="text" name="price" value="<?php echo $p ?>">
                <input type="text" name="routid" value="<?php echo $rout_id ?>">
                <input type="text" name="carid" value="<?php echo $carid ?>">
                <input type="text" name="source" value="<?php echo $s ?>">
                <input type="text" name="destination" value="<?php echo $d ?>">
                <input type="text" name="pdate" value="<?php echo $pd ?>">
                <input type="text" name="ddate" value="<?php echo $dd ?>">
            </div>

            <span><b>Pickup Address:</b></span><br>
            <textarea id="address" name="paddress" required></textarea>

            <div class="s-btn">
                <input type="submit" value="Comform Booking" name="submit">
            </div>
        </form>
    </div>
</body>
</html>