<?php
 $scon=mysqli_connect('localhost','root','','food');
    if(!$scon)
    {
        die('Error Connecting to Database');
    }
session_start();
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$_SESSION['user']=$email;
$pass=$_POST['pass'];
if(!empty($_POST['email']) && !empty($_POST['pass']))
{
$row=mysqli_query($scon,"select * from reg where email='$email'");
$res=mysqli_fetch_array($row);
$pass1=$res['pass'];
if($pass==$pass1)
{
      header("Location: index1.html");
        exit;
}
else
{
      $errMSG="Invalid data <br>";

}
}
}
?>
<html>

<head>
  <title>Food Delievery App</title>
</head>
<style>
body {
  background-image: url('loginfood.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
    input[type=text],
    input[type=password] {
        width: 50%;
        padding: 10px 10px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: larger;
    }
    /*set a style for the buttons*/

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 50%;
    }
</style>

<body>
    <div>
        <h1>WELCOME TO FRESH AND LEAN</h1>
        <form action="index.php" method="post">
            <div class="container">
            <br><label><b><h3>E-MAIL:</h3></b></label>
            <input type="text" placeholder="Enter mail-id" name="email" required>

            <br><label><b><h3>PASSWORD</h3></b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
                <br><br>
              <input type="submit" name="submit" style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 50%;">
               <?php if(isset($errMSG)) echo '<script type="text/javascript">alert("Invalid userID or password");</script>'; ?><br>
        </div>
        </form>
        

    </div>
</body>

</html>
