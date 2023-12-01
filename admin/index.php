<?php 
    require "../config.php";
    $msg2 = "";
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin` WHERE `username`='$username' && `password`='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['ADMIN_ID'] = $row['id'];
            echo "<script>window.location.assign('users.php')</script>";
        }
        else 
        {
            $msg2 = "Invalid Login Information";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Login</title>
        <!--- style file ---->
        <link rel="stylesheet" href="asset/css/style.css">
        <!--- google font - poppins ---->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!--- bootstrap CSS ---->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>

<div class="index_bg login_bg">
    
    <!--- login form ---> 
    <div class="content" style="padding-top: 120px;">
        <div class="login-container">
            <h2>Admin Login</h2>
            <form action="index.php" method="POST"> 
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="submit">Login</button>
                <p class="error_msg"><?php echo $msg2 ?></p>
            </form>
        </div>
    </div>
    <!--- login form ---> 
    
</div>

<!--- bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
