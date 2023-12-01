<?php 
require "top.php";
?>

<div class="index_bg trending_bg">
   
    <!--- trending  content --->
    <div class="content">
    <div class="recommendation_content">
        <h2>Trending Content</h2>

        <ul class="recommended-movies">

        
        <?php 
            $sql = "SELECT * FROM `trending_tbl` ORDER BY `id` DESC";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0)
            {
                $loopIndex = 0;
                while($row = mysqli_fetch_assoc($res))
                {
                    $delay = 100 * $loopIndex;

                    echo '<li class="movie-item"  data-aos="fade-up" data-aos-delay="' . $delay . '">
                        <img src="storage/trending/'.$row['image'].'">
                        <a href="'.$row['link'].'" target="_blank">'.$row['name'].'</a>
                    </li>';

                    $loopIndex++;
                }
            }
        ?>
        </ul>

    </div>
    </div>
    <!--- trending  content --->

    <!--- footer ---->
    <footer>
        <p>&copy; 2023 Cinephile</p>
    </footer> 
    <!--- footer ---->
</div>

<?php 
  require "footer.php";
?>

