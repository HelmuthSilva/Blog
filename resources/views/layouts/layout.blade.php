<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Food recipes</title>

  <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

  <!-- Bootstrap core CSS -->
  <link href="{{URL:: asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


  <!-- Custom fonts for this template -->
  <link href="{{URL:: asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{URL:: asset('css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

  @yield('conteudo')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('js/script.js')?>"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
