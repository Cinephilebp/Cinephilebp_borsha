<?php 

require "top.php";


$admin_id = $_SESSION['ADMIN_ID'];

//get admin details - 
$admin_sql = "SELECT * FROM `admin` WHERE `id`='$admin_id'";
$admin_res = mysqli_query($conn,$admin_sql);
if(mysqli_num_rows($admin_res) > 0)
{
    $admin_row = mysqli_fetch_assoc($admin_res);

    $username = $admin_row['username'];
    $password = $admin_row['password'];
}
else 
{
    $username = "";
    $password = "";
    echo "<script>window.location.assign('index.php')</script>";
}

//update admin details 
$up = "";
$up2 = "";

if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];
    
    $update_sql = "UPDATE `admin` SET `username`='$username',`password`='$password' WHERE `id`='$admin_id'";
    $update_res = mysqli_query($conn,$update_sql);

    if(mysqli_affected_rows($conn) > 0)
    {
        $up = "Admin details update successfully";
    }
    else 
    {
        $up2 = "Admin details update failed";
    }
}

?>



<div class="welcome_note">
<div class="container">
<div class="welcome_note_in">
    <h1>PROFILE</h1>
</div>
</div>
</div>

<div class="user_list">
    <div class="container">
        <div class="user_list_in">
            <h1>Manage Profile</h1>

            <h4 class="text-center text-primary"><?php echo $up ?></h4>
            <h4 class="text-center text-danger"><?php echo $up2 ?></h4>

            <div class="profile_container_item">
                
                <form action="profile.php" method="post">
                    <div class="profile_container_inp">
                        <label for="">User Name</label>
                        <input type="text" required value="<?php echo $username ?>" placeholder="Username" name="username" id="username">
                    </div>
                    <div class="profile_container_inp">
                        <label for="">Password </label>
                        <input type="text" required value="<?php echo $password ?>" placeholder="Password" name="password" id="password">
                    </div>
                    <div class="profile_container_inp">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </form>

            </div>
        
            
        </div>
    </div>
</div>


<?php require "footer.php"; ?>
