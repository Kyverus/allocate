<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title> <!-- (< ? =) is php echo in short-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/css/app.css?v=1.1" rel="stylesheet" type="text/css">
        <link rel="icon" href="assets/coin-icon.png" type="image/x-icon"/>
    </head>
    <body class="bg-dark">
   
    <div class="sidebar">
        <?php include "navbar.php"?>
    </div>
    
    <div class="content">
    

    
