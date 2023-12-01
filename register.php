<?php 
    require "top.php";

    $msg = "";
    $msg2 = "";
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `user`(`username`,`password`) VALUES('$username','$password')";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0)
        {
            $msg = "Account registered successfully";
        }
        else 
        {
            $msg2 = "Account registered failed";
        }
    }

?>


<div class="index_bg login_bg">

    <!--- register form ---> 
    <div class="content">
        <div class="login-container">
            <h2>Register</h2>
            <form action="register.php" method="POST"> 
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="submit">Register</button>

                <p class="mt-3">Already have an account? <a href="login.php" style="color: yellow;">Login</a></p>

                <p class="success_msg"><?php echo $msg ?></p>
                <p class="error_msg"><?php echo $msg2 ?></p>

            </form>
        </div>
    </div>
    <!--- register form ---> 

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>

