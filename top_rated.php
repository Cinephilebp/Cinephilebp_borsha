<?php 
require "top.php";
?>

<div class="index_bg toprated_bg">
    <!--- top rated content --->
    <div class="content">
    <div class="recommendation_content">
        <h2>Top Rated Movies</h2>

        <ul class="movie-list">

        <?php 
            $sql = "SELECT * FROM `top_rated_tbl` ORDER BY `id` DESC";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0)
            {
                $loopIndex = 0;
                while($row = mysqli_fetch_assoc($res))
                {
                    $delay = 100 * $loopIndex;

                    echo '<li class="movie-item" data-aos="fade-up" data-aos-delay="' . $delay . '">
                        <img src="storage/top_rated/'.$row['image'].'" alt="">
                        <a href="'.$row['link'].'" target="_blank">'.$row['name'].'</a>
                    </li>';

                    $loopIndex++;
                }
            }
        ?>


        </ul>

    </div>
    </div>
    <!--- top rated content --->

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>



