<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sa.ch.Transfer</title>

    <link rel="stylesheet" href="library/fontawesome/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/animate.min.css">
    <link rel="stylesheet" href="style/style.css">

    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-success animated infinite pulse delay-2s" href="/"><i class="fas fa-share-alt fa-2x"></i> <i class="fas fa-download fa-2x"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <?php if(isset($_SESSION['id'])) { ?>
          <a href="deconnexion.php" class="nav-link">
            Deconnexion
          </a>
        <?php }else { ?>
          <a href="#" class="nav-link" data-toggle="modal" data-target="#connectModal">
            Connexion
          </a>
        <?php } ?>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#inscrireModal">
          Premium
        </a>
      </li>

    </ul>
  </div>
</nav>

<!-- Connect Modal -->
<div class="modal fade" id="connectModal" tabindex="-1" role="dialog" aria-labelledby="connectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="connectModalLabel">Connectez vous à votre compte Premium</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="connect.php" method="post">
          <div class="form-group">
            <label for="#mail">mail</label>
            <input type="email" class="form-control" name="mail" id="mail">
            <label for="#pass">password</label>
            <input type="password" class="form-control" name="pass" id="pass">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
          Connexion
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- inscription Modal -->
<div class="modal fade" id="inscrireModal" tabindex="-1" role="dialog" aria-labelledby="inscrireModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inscrireModalLabel">Obtenez un compte Premium</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inscription.php" method="post">
          <div class="form-group">
            <label for="#mail">mail</label>
            <input type="email" class="form-control" name="mail" id="mail">
            <label for="#pass">password</label>
            <input type="password" class="form-control" name="pass" id="pass">
            <label for="#confirmPass">confirm password</label>
            <input type="password" class="form-control" name="confirm pass" id="confirmPass">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Inscription</button>
      </div>
      </form>
    </div>
  </div>
</div>