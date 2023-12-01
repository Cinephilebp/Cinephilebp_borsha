<?php 
    require "../config.php";
    if(!isset($_SESSION['ADMIN_ID']))
    {
        echo "<script>window.location.assign('index.php')</script>";   
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cinephile</title>
    <!--- style file ---->
    <link rel="stylesheet" href="asset/css/style.css">
    <!--- google font - poppins ---->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--- bootstrap CSS ---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="index_bg">

    <!--- nav bar ---->
    <div class="navigation-buttons">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
            <a class="navbar-brand logo" href="users.php">Cinephile</a>
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
                    <a class="nav-link active" aria-current="page" href="users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="top_rated_movies.php">Top Rated Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trending_content.php">Trending Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recommendation.php">Recommendation Lists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login_btn" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login_btn" href="logout.php">Log Out</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
    <!--- nav bar ---->