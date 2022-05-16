<?PHP 
require 'connect.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


   

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
<body>

<?php include 'nav.php'; ?> 


<div class="container main" style="margin-top: 100px;">
<div class="row">

<?php 

  $stmt_count_produit = $connect->prepare("SELECT * FROM `consulte`");
  $stmt_count_produit->execute();
  $count_produit= $stmt_count_produit->rowCount();

  $stmt_count_teachers = $connect->prepare("SELECT * FROM `traitement`");
  $stmt_count_teachers->execute();
  $count_teachers = $stmt_count_teachers->rowCount();

/*  $stmt_count_eleve = $connect->prepare("SELECT * FROM eleve");
  $stmt_count_eleve->execute();
  $count_eleve = $stmt_count_eleve->rowCount();*/

 /* $stmt_count_topics = $connect->prepare("SELECT * FROM topics");
  $stmt_count_topics->execute();
  $count_topics = $stmt_count_topics->rowCount();*/


   ?>
  
<div class="col-md-12" id="status">
<a class="return" href="../index.php"><i class="glyphicon glyphicon-off"></i> Deconnection</a>
</br>
</br>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box yellow-bg">
            <i class="fa fa-check"></i>
            <div class="count"><?php echo $count_produit; ?></div>
            <div class="title">Le nombre des clients effectuez</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box orange-bg">
            <i class="fa fa-clock-o"></i>
            <div class="count"><?php echo $count_teachers; ?></div>
            <div class="title">Le nombre des clients encours</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
       
</div>
 <div class="clear"></div><br>


    <div class="col-md-4">
      <a href="malade.php">
          <div class="link">
            <i class="fa fa-plus"></i>
            <div class="clear"></div><span>Ajoutez un Client</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="operation.php">
          <div class="link">
            <i class="fa fa-users"></i>
            <div class="clear"></div><span>list clients</span>
         </div>
      </a>
    </div>
    
    <div class="col-md-4">
      <a href="traitement.php">
          <div class="link">
            <i class="fa fa-calendar"></i>
            <div class="clear"></div><span>Emploi</span>
         </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="cal\index.php">
          <div class="link">
            <i class="fa fa-medkit"></i>
            <div class="clear"></div><span>mo3taz</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="Medecins.php">
          <div class="link">
            <i class="fa fa-user"></i>
            <div class="clear"></div><span>mo3taz</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="operation.php">
          <div class="link">
            <i class="fa fa-cog"></i>
            <div class="clear"></div><span>mo3taz</span>
         </div>
      </a>
    </div>
</div>
</div>		
                           
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



  </body>
</html>

