<?php
// No PHP logic needed here yet
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Zone - Choose Genre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-dark text-white">

  <div class="container py-5">
    <h1 class="text-center mb-4 fw-bold text-warning">🎬 Welcome to Movie Zone</h1>
    <p class="text-center mb-5">Select a genre to explore top movies</p>

    <div class="row g-4 justify-content-center">

      <?php
      $genres = [
        "Action" => "action.jpeg",
        "Comedy" => "comedy.jpeg",
        "Drama" => "drama.jpg",
        "Horror" => "horror.jpg",
        "Sci-Fi" => "scifi.jpg"
      ];

      foreach ($genres as $genre => $img) {
      ?>
        <div class="col-md-4 col-lg-3">
          <div class="card bg-secondary text-white h-100 genre-card border-0 shadow">
            <a href="menu.php?genre=<?= urlencode($genre) ?>" class="text-white text-decoration-none">
              <img src="../assets/images/genres/<?= $img ?>" class="card-img-top" alt="<?= $genre ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?= $genre ?></h5>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</body>
</html>
