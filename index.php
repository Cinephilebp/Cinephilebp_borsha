<?php 
  require "top.php";
?>

<div class="index_bg">

<!--- center -->
<div class="dash_center">
    <div class="dash_center_in">
        <h1 data-aos="fade-up">Cinephile</h1>
        <p class="description" data-aos="fade-up">Your one-stop destination for movie, drama, series, and anime reviews.</p>


        <section class="search-bar" data-aos="fade-up">
            <form action="search.php" method="post">
                <input type="text" required id="search-query" name="search" placeholder="Search for movies, series, dramas, and anime">
                <button type="submit">Search</button>
            </form>
        </section>


    </div>
</div>
<!--- /center -->

<!--- footer ---->
<footer>
    <p>&copy; 2023 Cinephile</p>
</footer> 
<!--- footer ---->

</div>

<?php 
  require "footer.php";
?>
