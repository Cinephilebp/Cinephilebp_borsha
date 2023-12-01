<?php 
 require "top.php";

$showMoviesList = false;
//movie review 
if(isset($_POST['movie_btn']))
{
    $movie = $_POST['movie'];
    $review = $_POST['review'];
    $link = $_POST['link'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"storage/catalog/$image");
 
    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }
    
    $stmt = $conn->prepare("INSERT INTO `review` (`user_id`, `movie_name`, `review`, `review_of`, `link`,`image`) VALUES (?, ?, ?, 'movie', ?, ?)");

    $stmt->bind_param("issss", $user_id, $movie, $review, $link,$image);
    $stmt->execute();

    if(mysqli_affected_rows($conn))
    {
        $showMoviesList = true;
    }
}

//series review 
$showSeriesList = false;
if(isset($_POST['series_btn']))
{
    $series = $_POST['series'];
    $review = $_POST['review'];
    $link = $_POST['link'];
    
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"storage/catalog/$image");
 
    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }

     
    $stmt = $conn->prepare("INSERT INTO `review` (`user_id`, `movie_name`, `review`, `review_of`, `link`,`image`) VALUES (?, ?, ?, 'series', ?, ?)");
    $stmt->bind_param("issss", $user_id, $series, $review, $link, $image);
    $stmt->execute();

    if(mysqli_affected_rows($conn))
    {
       $showSeriesList = true;
    }
}

//kdrama review 
$showKdramaList = false;
if(isset($_POST['kdrama_btn']))
{
    $kdrama = $_POST['kdrama'];
    $review = $_POST['review'];
    $link = $_POST['link'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"storage/catalog/$image");
 
    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }

    $stmt = $conn->prepare("INSERT INTO `review` (`user_id`, `movie_name`, `review`, `review_of`, `link`, `image`) VALUES (?, ?, ?, 'kdrama', ?, ?)");
    $stmt->bind_param("issss", $user_id, $kdrama, $review, $link,$image);
    $stmt->execute();

    if(mysqli_affected_rows($conn))
    {
        $showKdramaList = true;
    }
}

//anime review 
$showanimeList = false;
if(isset($_POST['anime_btn']))
{
    $anime = $_POST['anime'];
    $review = $_POST['review'];
    $link = $_POST['link'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"storage/catalog/$image");
 
    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }

    $stmt = $conn->prepare("INSERT INTO `review` (`user_id`, `movie_name`, `review`, `review_of`, `link`, `image`) VALUES (?, ?, ?, 'anime', ?, ?)");
    $stmt->bind_param("issss", $user_id, $anime, $review, $link, $image);
    $stmt->execute();

    if(mysqli_affected_rows($conn))
    {
        $showanimeList = false;
    }
}

//other review 
$showOtherList = false;
if(isset($_POST['other_btn']))
{
    $other = $_POST['other'];
    $review = $_POST['review'];
    $link = $_POST['link'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"storage/catalog/$image");
 
    //if logged in user adding review we will collect user id / if regular user - we will keep the id empty
    if(isset($_SESSION['USER_ID']))
    {
        $user_id = $_SESSION['USER_ID'];
    }
    else 
    {
        $user_id = "";
    }

    $stmt = $conn->prepare("INSERT INTO `review` (`user_id`, `movie_name`, `review`, `review_of`, `link`, `image`) VALUES (?, ?, ?, 'other', ?, ?)");
    $stmt->bind_param("issss", $user_id, $other, $review, $link, $image);
    $stmt->execute();


    if(mysqli_affected_rows($conn))
    {
        $showOtherList = false;
    }
}

?>

<div class="index_bg catelog_bg">


    <!--- catelog content -->
    <div class="content">

        <div class="catelog_categoty" data-aos="fade-up">
            <h2>Catalog</h2>
            <div class="category-buttons">
                <button class="category-button" onclick="toggleList('movies')">Movies</button>
                <button class="category-button" onclick="toggleList('series')">Series</button>
                <button class="category-button" onclick="toggleList('kdrama')">K-drama</button>
                <button class="category-button" onclick="toggleList('anime')">Anime</button>
                <button class="category-button" onclick="toggleList('others')">Others</button>
            </div>
        </div>
        
        <div class="catelog_hidden_box">

            <div class="hidden-list" data-aos="fade-down" id="movies-list" style="<?php echo ($showMoviesList) ? 'display: block;' : 'display: none;'; ?>">
                <h3>Movies</h3>
                <ul>
                    <li>

                        <form action="catalog.php" method="post" enctype="multipart/form-data">
                            <div class="review-box">
                                <input type="file" required name="image">
                                <input type="text" required name="movie" placeholder="Movie Name">
                                <input type="text" required name="link" placeholder="Movie Link">
                                <textarea required name="review" placeholder="Write Review"></textarea>
                                <button type="submit" name="movie_btn">Submit</button>
                            </div>
                        </form>

                        <ul class="review_ul">
                            <?php 
                                //fetching movie review from database
                                $fetch_movie_review = "SELECT * FROM `review` WHERE `review_of`='movie' ORDER BY `id` DESC";
                                $fetch_movie_review_res = mysqli_query($conn,$fetch_movie_review);
                                if(mysqli_num_rows($fetch_movie_review_res) > 0)
                                {
                                    while($fetch_movie_review_row = mysqli_fetch_assoc($fetch_movie_review_res))
                                    {
                                        echo '<li>
                                            <img src="storage/catalog/'.$fetch_movie_review_row['image'].'">
                                            <div>
                                            <h4><a href="'.$fetch_movie_review_row['link'].'" target="_blank">'.$fetch_movie_review_row['movie_name'].'</a></h4>
                                            <p class="text-white">'.$fetch_movie_review_row['review'].'</p>
                                            </div>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul>


                    </li>
                </ul>

            </div>
 
            <div class="hidden-list" data-aos="fade-down" id="series-list" style="<?php echo ($showMoviesList) ? 'display: block;' : 'display: none;'; ?>">
                <h3>Series</h3>
                <ul>
                    <li>

                        <form action="catalog.php" method="post" enctype="multipart/form-data">
                           <div class="review-box">
                              <input type="file" required name="image">
                              <input type="text" required name="series" placeholder="Series Name">
                              <input type="text" required name="link" placeholder="Series Link">
                              <textarea required name="review" placeholder="Write Review"></textarea>
                              <button type="submit" name="series_btn">Submit</button>
                           </div>
                        </form>

                        <ul class="review_ul">
                            <?php 
                                //fetching movie review from database
                                $fetch_series_review = "SELECT * FROM `review` WHERE `review_of`='series' ORDER BY `id` DESC";
                                $fetch_series_review_res = mysqli_query($conn,$fetch_series_review);
                                if(mysqli_num_rows($fetch_series_review_res) > 0)
                                {
                                    while($fetch_series_review_row = mysqli_fetch_assoc($fetch_series_review_res))
                                    {
                                        echo '<li>
                                           <img src="storage/catalog/'.$fetch_series_review_row['image'].'">
                                           <div>
                                            <h4><a href="'.$fetch_series_review_row['link'].'" target="_blank">'.$fetch_series_review_row['movie_name'].'</a></h4>
                                            <p class="text-white">'.$fetch_series_review_row['review'].'</p>
                                            </div>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul>
                      

                    </li>
                </ul>
            </div>

            <div class="hidden-list" data-aos="fade-down" id="kdrama-list" style="<?php echo ($showKdramaList) ? 'display: block;' : 'display: none;'; ?>">
                <h3>K-drama</h3>
                <ul>
                    <li>

                       <form action="catalog.php" method="post" enctype="multipart/form-data">
                            <div class="review-box">
                                <input type="file" required name="image">
                                <input type="text" required name="kdrama" placeholder="K-drama Name">
                                <input type="text" required name="link" placeholder="K-drama Link">
                                <textarea required name="review" placeholder="Write Review"></textarea>
                                <button type="submit" name="kdrama_btn">Submit</button>
                            </div>
                        </form>
                    
                        <ul class="review_ul">
                            <?php 
                                //fetching kdrama review from database
                                $fetch_kdrama_review = "SELECT * FROM `review` WHERE `review_of`='kdrama' ORDER BY `id` DESC";
                                $fetch_kdrama_review_res = mysqli_query($conn,$fetch_kdrama_review);
                                if(mysqli_num_rows($fetch_kdrama_review_res) > 0)
                                {
                                    while($fetch_kdrama_review_row = mysqli_fetch_assoc($fetch_kdrama_review_res))
                                    {
                                        echo '<li>
                                            <img src="storage/catalog/'.$fetch_kdrama_review_row['image'].'">
                                           <div>
                                            <h4><a href="'.$fetch_kdrama_review_row['link'].'" target="_blank">'.$fetch_kdrama_review_row['movie_name'].'</a></h4>
                                            <p class="text-white">'.$fetch_kdrama_review_row['review'].'</p>
                                            </div>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul>        

                    </li>
                </ul>
            </div>


            <div class="hidden-list" data-aos="fade-down" id="anime-list" style="<?php echo ($showanimeList) ? 'display: block;' : 'display: none;'; ?>">
                <h3>Anime</h3>
                <ul>
                    <li>

                       <form action="catalog.php" method="post" enctype="multipart/form-data">
                            <div class="review-box">
                               <input type="file" required name="image">
                                <input type="text" required name="anime" placeholder="Anime Name">
                                <input type="text" required name="link" placeholder="Anime Movie Link">
                                <textarea required name="review" placeholder="Write Review"></textarea>
                                <button type="submit" name="anime_btn">Submit</button>
                            </div>
                        </form>

                        <ul class="review_ul">
                            <?php 
                                //fetching anime review from database
                                $fetch_anime_review = "SELECT * FROM `review` WHERE `review_of`='anime' ORDER BY `id` DESC";
                                $fetch_anime_review_res = mysqli_query($conn,$fetch_anime_review);
                                if(mysqli_num_rows($fetch_anime_review_res) > 0)
                                {
                                    while($fetch_anime_review_row = mysqli_fetch_assoc($fetch_anime_review_res))
                                    {
                                        echo '<li>
                                            <img src="storage/catalog/'.$fetch_anime_review_row['image'].'">
                                            <div>
                                            <h4><a href="'.$fetch_anime_review_row['link'].'" target="_blank">'.$fetch_anime_review_row['movie_name'].'</a></h4>
                                            <p class="text-white">'.$fetch_anime_review_row['review'].'</p>
                                            </div>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul> 

                        

                    </li>
                </ul>
            </div>
            
            <div class="hidden-list" data-aos="fade-down" id="others-list" style="<?php echo ($showOtherList) ? 'display: block;' : 'display: none;'; ?>">
                <h3>Others</h3>
                <ul>
                    <li>

                       <form action="catalog.php" method="post" enctype="multipart/form-data">
                            <div class="review-box">
                                <input type="file" required name="image">
                                <input type="text" name="other" required placeholder="Other Category Name">
                                <input type="text" required name="link" placeholder="Link">
                                <textarea name="review" required placeholder="Write Review"></textarea>
                                <button type="submit" name="other_btn">Submit</button>
                            </div>
                        </form>


                        <ul class="review_ul">
                            <?php 
                                //fetching other review from database
                                $fetch_other_review = "SELECT * FROM `review` WHERE `review_of`='other'";
                                $fetch_other_review_res = mysqli_query($conn,$fetch_other_review);
                                if(mysqli_num_rows($fetch_other_review_res) > 0)
                                {
                                    while($fetch_other_review_row = mysqli_fetch_assoc($fetch_other_review_res))
                                    {
                                        echo '<li>
                                           <img src="storage/catalog/'.$fetch_other_review_row['image'].'">
                                           <div>
                                            <h4><a href="'.$fetch_other_review_row['link'].'" target="_blank">'.$fetch_other_review_row['movie_name'].'</a></h4>
                                            <p class="text-white">'.$fetch_other_review_row['review'].'</p>
                                            </div>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul> 
                        
                    </li>
                </ul>
            </div> 

        </div>

    </div>
    <!--- catelog content -->

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>


