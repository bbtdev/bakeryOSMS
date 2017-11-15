<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Productie</title>

  <meta name="viewport" content="width = device-width, initial-scale = 1.0">
  <!-- Bootstrap -->
  <link href="../../css/bootstrap.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
  <!--<?php //include $_SERVER[ 'DOCUMENT_ROOT'] . '/commonhtmlalc/logout.html.php'; ?> -->
  <main class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-default navbar-fixed-top grid-container-fluid site-nav-structure">
        <div class="problem grid-container-fluid">
          <div class="navbar-header">
            <div class="navbar-brand">
              <p>Bun venit,
                <?php echo ucwords($_SESSION[ 'user']); ?>
              </p>
            </div>
            <ul class="nav navbar-nav navbar-left">
              <li>
                <a href="?Delogare">Delogare</a>
              </li>
            </ul> 
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-to-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="nav-to-collapse">
            <ul class="nav navbar-nav navbar-right">     
            <?php include 'menu.html.php'; ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class = "margin-top-50px"></div>
  </main>

  <script src="../../js/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <script src="../../js/functions.js"></script>
  <script src="../../js/main.js"></script>
</body>

</html>