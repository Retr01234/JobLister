<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Lister</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Job Lister</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Create Job</a>
          </li>
        </ul>
      </div>
    </nav>

    <h3 class="text-muted"><?php echo SITE_TITLE; ?></h3>
  
  <?php displayMessage(); ?>