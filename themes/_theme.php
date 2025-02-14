<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- FAVICON -->
   <link rel="shortcut icon" href="<?= asset("imgs/fav.png") ?>" type="image/x-icon">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= asset("css/bootstrap.min.css") ?>">

   <!-- MEU ESTILO -->
   <link rel="stylesheet" href="<?= asset("main/estilo.css") ?>">

   <?= $this->section('styles'); ?>

   <!-- ICONES FONT-AWESOME -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   <!-- TITULO -->
   <title><?= $title ?></title>
</head>

<body>
   <header>
      <?= $this->section('navbar'); ?>
   </header>

   <section>
      <?= $this->insert('main/partials/logoUnb'); ?> 
   </section>

   <main>
      <?= $this->section('content'); ?>
   </main>

   <footer id="footerTermos" class="text-white bg-dark">
      <?= $this->section('footer'); ?>
   </footer>

   <!-- BOOTSTRAP SCRIPTS -->
   <script src="<?= asset('js/jquery-3.6.0.min.js') ?>"></script>
   <script src="<?= asset('js/bootstrap.bundle.min.js') ?>"></script>
   <!-- OUTROS SCRIPTS -->
   <?= $this->section('scripts'); ?>
</body>

</html>