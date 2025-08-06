<?php
include '../config/db.php';

if (!isset($_GET['genre'])) {
  header("Location: index.php");
  exit;
}

$genre = $_GET['genre'];

$stmt = $conn->prepare("SELECT * FROM movies WHERE genre = ?");
$stmt->bind_param("s", $genre);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($genre) ?> Movies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <h2 class="mb-4 text-warning"><?= htmlspecialchars($genre) ?> Movies</h2>
    <div class="row g-4">

      <?php while ($movie = $result->fetch_assoc()) { ?>
        <div class="col-md-4">
          <div class="card h-100 bg-secondary text-white border-0">
            <img src="../uploads/<?= $movie['image'] ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $movie['name'] ?></h5>
              <p class="card-text"><?= $movie['description'] ?></p>
              <p class="card-text"><strong>Price: </strong>$<?= $movie['price'] ?></p>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
    <div class="mt-4">
      <a href="index.php" class="btn btn-outline-warning">← Back to Home</a>
    </div>
  </div>
</body>
</html>
