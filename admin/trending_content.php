<?php 
    require "top.php";
    

    $msg = "";
    $msg2 = "";
    $msg3 = "";
    $msg4 = "";

    //delete top rated movie - 
    if(isset($_GET['id']) && $_GET['id'] > 0)
    {
        $id = $_GET['id'];
        $delete_sql = "DELETE FROM `trending_tbl` WHERE `id`='$id'";
        $delete_res = mysqli_query($conn,$delete_sql);

        if(mysqli_affected_rows($conn) > 0)
        {
            $msg = "Trending content delete successfull";
        }
        else 
        { 
            $msg2 = "Trending content delete failed";
        }
    }

    //add top rated movie
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $link = $_POST['link'];

        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp_name,"../storage/trending/$image");
    
        $sql = "INSERT INTO `trending_tbl`(`image`,`name`,`link`) VALUES('$image','$name','$link')";
        $result = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) > 0)
        {
            $msg3 = "Trending content added successfully";
        }
        else 
        {
            $msg4 = "Trending content added failed";
        }
        
    }
?>


<div class="welcome_note">
    <div class="container">
    <div class="welcome_note_in">
        <h1>TRENDING CONTENT </h1>
    </div>
    </div>
</div>


<div class="user_list">
    <div class="container">
        <div class="user_list_in">
            <h1>Trending Content</h1>

            <h4 class="text-center text-primary"><?php echo $msg3 ?></h4>
            <h4 class="text-center text-danger"><?php echo $msg4 ?></h4>

            <form action="trending_content.php" method="post" enctype="multipart/form-data">
                <div class="add_form">
                    <div class="row">

                        <div class="col-md-6 col-xl-3">
                            <div class="add_form_inp">
                                <label for="">Image</label>
                                <input type="file" required name="image" id="image">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="add_form_inp">
                                <label for="">Name</label>
                                <input type="text" required name="name" id="name">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="add_form_inp">
                                <label for="">Link</label>
                                <input type="text" required name="link" id="link">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-2">
                            <div class="add_form_inp">
                                <button type="submit" name="submit">Submit</button>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </form>

            <h4 class="text-center text-primary"><?php echo $msg ?></h4>
            <h4 class="text-center text-danger"><?php echo $msg2 ?></h4>

            <div class="table-responsive">
                <table class="table table-bordered text-white text-center">
                    <tr>
                        <th width="10%">SL</th>
                        <th width="15%">Image</th>
                        <th width="30%">Name</th>
                        <th width="30%">URL</th>
                        <th width="15%">Action</th>
                    </tr>

                    <?php 
                        //fetch all users - 
                        $sql = "SELECT * FROM `trending_tbl` ORDER BY `id` DESC";
                        $res = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res) > 0)
                        {
                            $sl = 1;
                            while($row = mysqli_fetch_assoc($res))
                            {
                                echo " <tr>
                                    <td>".$sl."</td>
                                    <td><img src='../storage/trending/".$row['image']."' width='70px'></td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['link']."</td>
                                    <td><a href='?id=".$row['id']."' class='btn btn-danger'>Delete</a></td>
                                    </tr>";
                                    $sl++;
                            }
                        }
                    ?>

                </table>
            </div>

        </div>
    </div>
</div>


<?php require "footer.php"; ?>

