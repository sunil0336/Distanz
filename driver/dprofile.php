<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: rgb(30, 30, 30);
      color: #fff;
      text-align: center;
      padding: 5px;

    }

    h1 {
      font-size: 24px;
    }

    .profile-container {
      max-width: 600px;
      margin: 70px auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 4px solid rgb(251, 91, 16);
      overflow: hidden;
      margin: 0 auto 20px;
    }

    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;

    }

    .profile-info {
      text-align: center;
    }

    .profile-info h2 {
      margin-bottom: 10px;
      color: black;
    }

    .profile-info p {
      margin: 5px 0;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .edit-button {
      margin-left: 10px;
      cursor: pointer;
      color: grey;
      font-weight: bold;
    }

    .profile-form {
      margin-top: 20px;
      display: none;
    }

    .profile-form label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .profile-form input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .profile-form button {
      background-color: #333;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 5px;
    }

    .cancel-button {
      background-color: #ccc;
    }

    header img {
      width: 40px;
      height: auto;
      float: left;
      margin-top: -50px;
      margin-left: 10px;
    }
  </style>
</head>

<body>

  <header>
    <h1>My Profile</h1>
    <a href="dindex.php">
      <img src="home.png" alt="Header Image"></a>
  </header>

  <div class="profile-container">
    <div class="profile-pic">
      <img src="profile-img.jpg" alt="Profile Picture">
    </div>

    <div class="profile-info">
      <?php
      session_start();
      echo "<b>Hi " . $_SESSION["dusername"]."</b>";
      $conn = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
      if (!$conn) {
        die("Error.");
      }

      $q = "select * from driver where username='$_SESSION[dusername]'";
      // $str = 4;
      // $q ="select * from vehicle where seater='$str'";
      $result = pg_query($conn, $q);
      while ($row = pg_fetch_assoc($result)) {
      ?>

        <div class="box">
          <!-- <div class="box-img">
            <img src="img/car3.jpg" alt="">
          </div> -->
          <h3><?php echo $row["driver_name"] ?></h3>
          <!-- <div class="type"> -->
            <span><?php echo $row["email_id"] ?></span>
            <span><?php echo $row["contact_no"] ?></span>
          <!-- </div> -->
        </div>
      <?php
      }
      pg_close($conn);
      ?>
  <script>
    function Edit() {
      var x = document.getElementById("pform");
      if (x.style.display === "none") {
        x.style.display = 'block';
        x.style.width = '100%';
        x.style.height = '100%';
      } else {
        x.style.display = "none";
      }
    }
  </script>

</body>

</html>
