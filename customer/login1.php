<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
        body{
            background-image: url(bg.jpg);
        }
        .login {
            height: 50vh;
            width: 30%;
            position: absolute;
            top: 3rem;
            right: 32%;
            z-index: 1;
            padding: 8% 2%;
            background: #fff;
            /* display: none; */
            /* border: 2px solid; */
            /* box-shadow: -20px 0px 150px 150px #fe5b3d; */
        }


        .login span {
            font-size: 16px;
            margin: 10px 0;
            display: inline-block;
            color: #a71830;
            font-weight: 300;
            letter-spacing: 1px;

        }

        .login form input {
            width: 89%;
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

        .login .s-btn {
            margin-top: 20px;
        }

        .login .s-btn input {
            background: #c00606;
            color: #fff;
            outline: none;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }

        .login .s-btn input:hover {
            background: #4d0404;
        }

        .login .lb {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .login .lb i {
            font-size: 25px;
            cursor: pointer;
        }


        .login h1{
            margin: 0 9rem;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1>Distanz</h1>
        <div class="lb">
            <h2>Sign In</h2>
            <!-- <i class='bx bx-arrow-back' onclick="return hide()"></i> -->
            <img src="img/arrow-back-regular-24.png" alt="Back" onclick="return hide()">
        </div>
        <form name="lform" action="login1.php" method="post">
            <span><b>Username</b></span>
            <input type="text" name="username">
            <span><b>Password</b></span>
            <input type="password" name="pwd" id="pwd">
            <div class="s-btn">
                <input type="submit" value="sign in" name="submit" onclick="return lvalidation()">
                <p>Dont't have an account?<a href="signup.html">Register Now</a></p>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])){
        $u = $_POST['username'];
        $p = $_POST['pwd'];

        $conn = pg_connect("host= dbname= user= password=");
        if(!$conn){
            die ("Error.");
        }

        $q = "SELECT * FROM customer WHERE username='$_POST[username]'AND password='$_POST[pwd]'";
        $r = pg_query($conn,$q);
        if (!$r) {
            echo "ERROR";
        }
        else{
            $row = pg_fetch_assoc($r);
            if($row){
                $user = $row['username'];
                $pwd = $row['password'];
                if($u == $user && $p == $pwd){
                    session_start();
                    $_SESSION['username'] = $user;
                    // $_SESSION['pwd'] = $pwd;

                    header("Location: index.php");
                }
                else{
                    echo "Wrong user or pwd";
                }
            }
            else{
                echo "user not found";
                echo "<script>
                        alert('Wrong Password');
                        </script>";
            }
        }

        pg_close($conn);
    }
    ?>



    
    <script src="main.js"></script>
</body>

</html>
