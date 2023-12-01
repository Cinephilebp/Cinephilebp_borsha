<?php 
require "top.php";

if(!isset($_SESSION['USER_ID']))
{
    echo "<script>window.location.assign('login.php')</script>";
}

$user_id = $_SESSION['USER_ID'];

//get user details - 
$user_sql = "SELECT * FROM `user` WHERE `id`='$user_id'";
$user_res = mysqli_query($conn,$user_sql);
if(mysqli_num_rows($user_res) > 0)
{
    $user_row = mysqli_fetch_assoc($user_res);

    $username = $user_row['username'];
    $password = $user_row['password'];
}
else 
{
    $username = "";
    $password = "";
    echo "<script>window.location.assign('login.php')</script>";
}

//update user details 
$up = "";
$up2 = "";

if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];
    
    $update_sql = "UPDATE `user` SET `username`='$username',`password`='$password' WHERE `id`='$user_id'";
    $update_res = mysqli_query($conn,$update_sql);

    if(mysqli_affected_rows($conn) > 0)
    {
        $up = "User details update successfully";
    }
    else 
    {
        $up2 = "User details update failed";
    }
}

?>

<div class="index_bg trending_bg">
  
    <div class="content">

        <div class="profile-container">
            <h2>Welcome</h2>
            <p>Here, you can view and manage your profile information, preferences, and activity on Cinephile.</p>

            <div class="profile_container_in">
                <div class="row">

                    <div class="col-lg-6 col-xl-4">
                        <div class="profile_container_item">
                            <h3>Profile Information</h3>
                            
                            <form action="user_profile.php" method="post">
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

                            <p class="success_msg"><?php echo $up ?></p>
                            <p class="error_msg"><?php echo $up2 ?></p>

                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="profile_container_item">
                            <h3>Your Recommendation</h3>

                            <ul class="profile_recommendation">
                                <?php 
                                    //user recommendation
                                    $rec_sql = "SELECT * FROM `recommendation` WHERE `user_id`='$user_id' ORDER BY `id` DESC";
                                    $rec_res = mysqli_query($conn,$rec_sql);
                                    if(mysqli_num_rows($rec_res) > 0)
                                    {
                                        while($rec_row = mysqli_fetch_assoc($rec_res))
                                        {
                                            echo '<li class="series-item">
                                                    <img src="storage/recommendation/'.$rec_row['poster'].'" >
                                                    <div>
                                                        <a href="'.$rec_row['link'].'" target="_blank">'.$rec_row['name'].'</a>
                                                        <p>'.$rec_row['review'].'</p>
                                                    </div>
                                                </li>';
                                        }
                                    }
                                    else 
                                    {
                                        echo '<li class="series-item">
                                                <div>
                                                    <p style="color:yellow">No Recommendation yet</p>
                                                </div>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="profile_container_item">
                            <h3>Your Review</h3>
                            <ul class="review_ul">
                                <?php 
                                    //user review
                                    $review_sql = "SELECT * FROM `review` WHERE `user_id`='$user_id'";
                                    $review_res = mysqli_query($conn,$review_sql);
                                    if(mysqli_num_rows($review_res) > 0)
                                    {
                                        while($review_row = mysqli_fetch_assoc($review_res))
                                        {
                                            echo '<li>
                                                    <h4>'.$review_row['movie_name'].'</h4>
                                                    <p>'.$review_row['review'].'</p>
                                                </li>';
                                        }
                                    }
                                    else 
                                    {
                                        echo '<li>
                                                <h4>No review yet</h4>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                   </div>
                </div>

                <div class="map_location mt-3">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52813262.273787946!2d-161.4823879780771!3d36.106510173454495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1700262812336!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

        </div>
        
    </div>

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>

