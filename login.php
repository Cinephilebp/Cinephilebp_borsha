<?php 
require "top.php";
$msg2 = "";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username`='$username' && `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['USER_ID'] = $row['id'];
        echo "<script>window.location.assign('index.php')</script>";
    }
    else 
    {
        $msg2 = "Invalid Login Information";
    }
}
?>

<div class="index_bg login_bg">
    <!--- login form ---> 
    <div class="content">
        <div class="login-container">
            <h2>Login</h2>
            <form action="login.php" method="POST"> 
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="submit">Login</button>

                <p class="mt-3">Don't have an account? <a href="register.php" style="color: yellow;">Register</a></p>
                <p class="error_msg"><?php echo $msg2 ?></p>
            </form>
        </div>
    </div>
    <!--- login form ---> 
    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>
