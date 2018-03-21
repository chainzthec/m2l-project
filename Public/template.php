<html lang="fr"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Portfolio Test</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL ?>/Public/Assets/css/bootstrap.css" rel="stylesheet">
  </head>

  <body cz-shortcut-listen="true">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Portflio Template</a>
        </div>
      </div>
    </nav>

    <div class="container" style="padding: 100px;">

      <div class="starter-template">
        <h1>Template test Framework</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>


        <?= $content; ?>
      </div>

    </div>
  

</body></html>