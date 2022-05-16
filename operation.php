<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Operations</title>

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


<?php 
require 'connect.php';
include 'nav.php'; ?> 




<div class="container mainbg">
<br><a class="return" href="index.php"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>

    <h1 class="h1_title">liste clients </h1>
    <hr> <br>

<?php 
if (isset($_POST['submit'])) {
   
  $malade=htmlspecialchars($_POST['malade']);
  $examen=htmlspecialchars($_POST['examen']);
  $observation=htmlspecialchars($_POST['observation']);
  $date=htmlspecialchars($_POST['date']);
  $frais =htmlspecialchars($_POST['frais']);
 
  
  
  
  $ins_medecins=$connect->prepare("INSERT INTO `laboratoire` (`id_labo`, `type_examen`, `observation_labo`, `date_examen`, `frais_examen`, `malade_id_malade`) VALUES (NULL, :examen, :observation, :date, :frais, :malade)");
  $ins_medecins->bindParam(':examen' ,$examen , PDO::PARAM_STR);
  $ins_medecins->bindParam(':observation' ,$observation, PDO::PARAM_STR);
  $ins_medecins->bindParam(':date' ,$date, PDO::PARAM_STR);
  $ins_medecins->bindParam(':frais' ,$frais , PDO::PARAM_STR);
  $ins_medecins->bindParam(':malade' ,$malade, PDO::PARAM_STR);
  $ins_medecins->execute();
  
 

  if (isset($ins_medecins)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }

echo "<meta http-equiv='refresh' content='5; url = laboratoire.php' />";

 } 

?>

    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">


 
 <!--------------------------------------tab4-------------------------------------------------------------->
  <div class="tab-pane" id="patient" role="tabpanel">
           <br/>
           <br>
           <form method="post">
              <div class="input-group">
			    
                
                  <input  type="text" name="abc"  placeholder="rechercher un client" class="form-control validate[required]" /><br>
				  
				<?php if(isset($_POST['ff']))
				{ 
				$name = $_POST['abc'];
				header("Location: affichage.php?name=".$name);
				}
				else 
				$name="xxxxx"?>
				
				  <span class="input-group-addon"> <button name="ff" >    <i class="glyphicon glyphicon-search"></i></button> </span>
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Adresse</th>
            <th>date naissance</th>
            <th>Mobile</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `malade` WHERE `actif`=1 ");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_nom=$find_row['nom_malade'];
      $fetch_prenom = $find_row ['prenom_malade'];
      $fetch_sexe = $find_row ['sexe_malade'];
	  $fetch_adresse= $find_row['adr_malade'];
	  $fetch_temperature=$find_row['temperature'];
	  $fetch_poids=$find_row['poids'];
	 $fetch_id =$find_row['id_malade'];
     $x = (String)$fetch_id ; 
$delete = "delete.php?id=".$x ; 


?>
            <tr>
              <td><?php echo $fetch_nom;  ?></td>
              <td><?php echo $fetch_prenom;  ?></td>
              <td><?php echo $fetch_sexe; ?></td>
              <td><?php echo $fetch_adresse; ?></td>
              <td><?php echo $fetch_temperature; ?></td>
              <td><?PHP echo $fetch_poids; ?></td>
              
              <td><?php echo '<a href='. $delete .'>' ?><i class="glyphicon glyphicon-trash large"  style="font-size:26px"></i></a></td>
               <td><a href="edit.php"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php }
 ?>
                 
        </tr>        
      </table>
        </div>
        
     </div>
   </div>
    
        <!--------------------------------------------------- fin tab---------------------------------------------------------------->
<div class="clear"></div>
<?php 
if (isset($_GET['cat_delete']) ) {

$cat_id = $_GET['cat_delete'];

  $stmt_delete = $connect->prepare("DELETE FROM `categorie` WHERE `categorie`.`id_cat`=:id");
  $stmt_delete->bindParam (':id' , $cat_id , PDO::PARAM_STR );
  $stmt_delete->execute();

  if (isset($stmt_delete)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>vous avez supprimé avec succés</p></div><br><br>"; 
    echo '<script type="text/javascript"> window.location.href += "#success"; </script>';
    echo "<meta http-equiv='refresh' content='5; url = categorie.php' />";
  }
  
}


 ?>
 <br>
        

</div>  
        
 <script src="js/bootstrap.min.js"></script>          
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>


  </body>
</html>
