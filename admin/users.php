<?php 
    require "top.php";

    $msg = "";
    $msg2 = "";

    //delete user - 
    if(isset($_GET['id']) && $_GET['id'] > 0)
    {
        $user_id = $_GET['id'];
        $delete_sql = "DELETE FROM `user` WHERE `id`='$user_id'";
        $delete_res = mysqli_query($conn,$delete_sql);

        if(mysqli_affected_rows($conn) > 0)
        {
            $msg = "User Account Delete Successfull";
        }
        else 
        { 
            $msg2 = "User Account Delete Failed";
        }
    }
?>


<div class="welcome_note">
<div class="container">
<div class="welcome_note_in">
    <h1>All USERS</h1>
</div>
</div>
</div>

<!--- user list ---> 
<div class="user_list">
<div class="container">
    <div class="user_list_in table-responsive">
        <h1>User List</h1>

        <h4 class="text-center text-primary"><?php echo $msg ?></h4>
        <h4 class="text-center text-danger"><?php echo $msg2 ?></h4>

        <table class="table table-bordered text-white text-center">
            <tr>
                <th width="20%">SL</th>
                <th width="50%">User Name</th>
                <th width="30%">Action</th>
            </tr>

            <?php 
                //fetch all users - 
                $user_sql = "SELECT * FROM `user` ORDER BY `id` DESC";
                $user_res = mysqli_query($conn,$user_sql);
                if(mysqli_num_rows($user_res) > 0)
                {
                    $sl = 1;
                    while($user_row = mysqli_fetch_assoc($user_res))
                    {
                        echo " <tr>
                            <td>".$sl."</td>
                                <td>".$user_row['username']."</td>
                                <td><a href='?id=".$user_row['id']."' class='btn btn-danger'>Delete</a></td>
                            </tr>";
                            $sl++;
                    }
                }
            ?>

        </table>

    </div>
</div>
</div>
<!--- /user list ---> 


<?php require "footer.php"; ?>

