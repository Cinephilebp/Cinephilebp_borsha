<?php 
 require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinephile</title>
    <!--- style file ---->
    <link rel="stylesheet" href="asset/css/style.css">
    <!--- google font - poppins ---->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--- bootstrap CSS ---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--- aos css --> 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>

    <!--- nav bar ---->
    <div class="navigation-buttons" data-aos="fade-down">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
            <a class="navbar-brand logo" href="index.php">Cinephile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="custom_bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog.php">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="top_rated.php">Top Rated Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trending_content.php">Trending Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recommendation_lists.php">Recommendation Lists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login_btn" href="user_profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <?php 
                        if(isset($_SESSION['USER_ID']))
                        {
                            echo '<a class="nav-link login_btn" href="logout.php">Log Out</a>';
                        }
                        else{
                            echo '<a class="nav-link login_btn" href="login.php">Log In</a>';
                        }
                    ?>
                   
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
    <!--- nav bar ---->