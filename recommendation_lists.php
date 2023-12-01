<?php 
  require "top.php";
 
  $msg = "";
  $msg2 = "";
  if(isset($_POST['submit']))
  {
    $movie_name = $_POST['movie_name'];
    $movie_link = $_POST['movie_link'];
    $why_recommendation = $_POST['why_recommendation'];

    $poster = $_FILES['poster']['name'];
    $poster_tmp_name = $_FILES['poster']['tmp_name'];

    move_uploaded_file($poster_tmp_name,"storage/recommendation/$poster");

    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }
    $sql = "INSERT INTO `recommendation`(`user_id`,`poster`,`name`,`review`,`link`) VALUES('$user_id','$poster','$movie_name','$why_recommendation','$movie_link')";
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0)
    {
        $msg = "Recommendation movie added successfully";
    }
    else 
    {
        $msg2 = "Recommendation movie added failed";
    }
    
  }
?>

<div class="index_bg recommendation_bg">

    <!--- recommendation content ---->
    <div class="content">
        <div class="recommendation_content">

            <h4 class="text-center text-primary"><?php echo $msg ?></h4>
            <h4 class="text-center text-danger"><?php echo $msg2 ?></h4>
        
            <h2>Our most Recommendation Lists</h2>
        
            <ul class="recommended-series">
                <?php 
                    $get_rec = "SELECT * FROM `recommendation` ORDER BY `id` DESC";
                    $get_rec_result = mysqli_query($conn,$get_rec);
                    if(mysqli_num_rows($get_rec_result) > 0)
                    {
                        $loopIndex = 0;
                        while($get_rec_row = mysqli_fetch_assoc($get_rec_result))
                        {
                            $delay = 100 * $loopIndex;
                            echo '<li class="series-item"  data-aos="fade-up" data-aos-delay="' . $delay . '">
                                    <img src="storage/recommendation/'.$get_rec_row['poster'].'">
                                    <div>
                                        <a href="'.$get_rec_row['link'].'" target="_blank">'.$get_rec_row['name'].'</a>
                                        <p>'.$get_rec_row['review'].'</p>
                                    </div>
                                </li>';

                            $loopIndex++;
                        }
                    }
                ?>
            </ul>

            <!-- User Recommendations -->
            <div class="user-recommendation">
             
                <h3 class="recommendation-title">Your Recommendations</h3>

                <form action="recommendation_lists.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-xl-2">
                            <div class="recommendation_item">
                                <label>Movie Poster:</label>
                                <label for="movie_poster" id="movie_poster_label">
                                  <input type="file"  required id="movie_poster" name="poster">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="recommendation_item">
                                <label>Movie Name:</label>
                                <input type="text" required id="movie_name" name="movie_name" placeholder="Enter movie recommendation">
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="recommendation_item">
                                <label>Movie Link:</label>
                                <input type="text" required id="movie_link" name="movie_link" placeholder="Enter movie link">
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="recommendation_item">
                                <label>Why are you recommending this? (Optional):</label>
                                <input type="text" id="why_recommendation" name="why_recommendation" placeholder="Provide a reason">
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-2">
                            <div class="recommendation_item">
                                <button type="submit" name="submit">Submit Recommendation</button>
                            </div>
                        </div>
                    </div>
                    
                </form>

            </div>

        </div>
    </div>
    <!--- /recommendation content ---->

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>