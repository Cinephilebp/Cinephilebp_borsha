<?php 
    require "top.php";
    
    $msg = "";
    $msg2 = "";
    $msg3 = "";
    $msg4 = "";

    //delete recommendation movie - 
    if(isset($_GET['id']) && $_GET['id'] > 0)
    {
        $id = $_GET['id'];
        $delete_sql = "DELETE FROM `recommendation` WHERE `id`='$id'";
        $delete_res = mysqli_query($conn,$delete_sql);

        if(mysqli_affected_rows($conn) > 0)
        {
            $msg = "Recommendation movie delete successfull";
        }
        else 
        { 
            $msg2 = "Recommendation movie delete failed";
        }
    }

    //add recommendation
    if(isset($_POST['submit']))
    {
      $movie_name = $_POST['movie_name'];
      $movie_link = $_POST['movie_link'];
      $why_recommendation = $_POST['why_recommendation'];
  
      $poster = $_FILES['poster']['name'];
      $poster_tmp_name = $_FILES['poster']['tmp_name'];
  
      move_uploaded_file($poster_tmp_name,"../storage/recommendation/$poster");
      
      $sql = "INSERT INTO `recommendation`(`user_id`,`poster`,`name`,`review`,`link`) VALUES('','$poster','$movie_name','$why_recommendation','$movie_link')";
      $result = mysqli_query($conn,$sql);
      if(mysqli_affected_rows($conn) > 0)
      {
          $msg3 = "Recommendation movie added successfully";
      }
      else 
      {
          $msg4 = "Recommendation movie added failed";
      }
      
    }

?>


<div class="welcome_note">
    <div class="container">
    <div class="welcome_note_in">
        <h1>RECOMMENDATION</h1>
    </div>
    </div>
</div>

<div class="user_list">
    <div class="container">
        <div class="user_list_in">
            <h1>Recommendation List</h1>

            <h4 class="text-center text-primary"><?php echo $msg3 ?></h4>
            <h4 class="text-center text-danger"><?php echo $msg4 ?></h4>

            <form action="recommendation.php" method="post" enctype="multipart/form-data">
                <div class="add_form">
                    <div class="row">

                        <div class="col-md-6 col-xl-2">
                            <div class="add_form_inp">
                                <label for="">Movie Poster</label>
                                <input type="file" required name="poster" id="movie_poster">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-2">
                            <div class="add_form_inp">
                                <label for="">Movie Name</label>
                                <input type="text" required name="movie_name" id="movie_name">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-2">
                            <div class="add_form_inp">
                                <label for="">Movie Link</label>
                                <input type="text" required name="movie_link" id="movie_link">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4">
                            <div class="add_form_inp">
                                <label for="">Why are you recommending this? (Optional):</label>
                                <textarea name="why_recommendation" id="why_recommendation" ></textarea>
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
                        <th width="20%">Name</th>
                        <th width="20%">Review</th>
                        <th width="20%">URL</th>
                        <th width="15%">Action</th>
                    </tr>

                    <?php 
                        //fetch all users - 
                        $sql = "SELECT * FROM `recommendation` ORDER BY `id` DESC";
                        $res = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res) > 0)
                        {
                            $sl = 1;
                            while($row = mysqli_fetch_assoc($res))
                            {
                                echo " <tr>
                                    <td>".$sl."</td>
                                    <td><img src='../storage/recommendation/".$row['poster']."' width='70px'></td>
                                    <td>".$row['name']."</td>
                                    <td><p class='review_height'>".$row['review']."</p></td>
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
