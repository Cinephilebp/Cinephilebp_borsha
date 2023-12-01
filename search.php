<?php 
require "top.php";

if(isset($_POST['search']))
{
    $search = $_POST['search'];
}
else 
{
    echo "<script>window.location.assign('index.php')</script>";
}
?>


<div class="index_bg toprated_bg">

    <!--- top rated content --->
    <div class="content">
    <div class="recommendation_content">

        <h2>Empty Search Result</h2>
       
        <?php 
            $sql = "SELECT * FROM `recommendation` WHERE `name` LIKE '%$search%'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo '<ul class="movie-list">';
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<li class="movie-item">
                        <img src="storage/recommendation/'.$get_rec_row['poster'].'" alt="Movie 3">
                        <a href="'.$get_rec_row['link'].'" target="_blank">'.$get_rec_row['name'].'</a>
                    </li>';
                } 
                echo '</ul>';
            }
            else 
            {
                echo '<p>We regret to inform you that the requested movie is currently unavailable in our inventory. Kindly consider exploring our curated recommendation list for alternative viewing options. Thank you for your understanding.</p>';
            }
        ?>

        <h2 class="mt-5">Recommendation List</h2>

        <ul class="movie-list mt-1">
            <?php 
                $get_rec = "SELECT * FROM `recommendation` ORDER BY `id` DESC";
                $get_rec_result = mysqli_query($conn,$get_rec);
                if(mysqli_num_rows($get_rec_result) > 0)
                {
                    while($get_rec_row = mysqli_fetch_assoc($get_rec_result))
                    {
                        echo '<li class="movie-item">
                                <img src="storage/recommendation/'.$get_rec_row['poster'].'" alt="Movie 3">
                                <a href="'.$get_rec_row['link'].'" target="_blank">'.$get_rec_row['name'].'</a>
                            </li>';
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



