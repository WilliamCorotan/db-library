 <!doctype html>
 <html lang="en" data-bs-theme="light">

 <head>
     <title><?= $title ?> | Tower of Honai</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="<?= base_url('assets/images/site/tower-of-honai-logo.png') ?>" type="image/x-icon">

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


     <!-- JQuery CDN -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <!-- FontAwesome CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- HighCharts CDN -->
     <script src="https://code.highcharts.com/highcharts.js"></script>

     <!-- Custom JavaScript -->
     <script src="<?= base_url('assets/js/index.js') ?>"></script>

     <!-- Custom CSS -->
     <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
     <style>
         /* main */

         #app {
             height: 100vh !important;
         }
     </style>
 </head>

 <body>
     <header id="main-header" class="position-sticky sticky-top shadow">
         <!-- place navbar here -->
         <?php if (!empty($this->session->userdata('is_logged_in'))) : ?>
             <?php $this->load->view('components/admin_navbar') ?>
             <?php $this->load->view('components/sidenav') ?>
         <?php endif ?>
     </header>
     <main id="app">