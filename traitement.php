<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Traitement</title>

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

    <h1 class="h1_title">ajouter heure </h1>
    <hr> <br>

<?php 
if (isset($_POST['submit'])) {
   
  $client=htmlspecialchars($_POST['malade']);
   $type=htmlspecialchars($_POST['type']);
  $date_debut=htmlspecialchars($_POST['date_debut']);
  $temp=htmlspecialchars($_POST['temp']);
  $frais =htmlspecialchars($_POST['frais']);
  $medicament_prescrit=htmlspecialchars($_POST['medicament']);
  
  
  
  $ins_medecins=$connect->prepare("INSERT INTO `traitement` (`id_trai`, `id_client`, `type`, `date_debut_trait`, `temp`, `frais_trait`, `desc`) VALUES (NULL, :client, :type, :date_debut, :temp, :frais, :desc)");
  $ins_medecins->bindParam(':client' ,$client , PDO::PARAM_STR);
  $ins_medecins->bindParam(':type' ,$type , PDO::PARAM_STR);
  $ins_medecins->bindParam(':date_debut' ,$date_debut, PDO::PARAM_STR);
  $ins_medecins->bindParam(':temp' ,$temp, PDO::PARAM_STR);
  $ins_medecins->bindParam(':frais' ,$frais , PDO::PARAM_STR);
  $ins_medecins->bindParam(':desc' ,$medicament_prescrit , PDO::PARAM_STR);
  $ins_medecins->execute();
  
 

  if (isset($ins_medecins)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }

echo "<meta http-equiv='refresh' content='5; url = traitement.php' />";

 } 


?>

    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="" method="post">
          
              <label class="">Nom du client: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="malade" class="form-control validate[required]">
                  <option selected="selected" value="">Selectionnée</option>
<?php 
  $stmt_find_malade = $connect->query("SELECT * FROM `malade`");

  while ($find_malade_row = $stmt_find_malade->fetch()) {
	  $fetch_malade_code =$find_malade_row['id_malade'];
      $fetch_malade_name = $find_malade_row ['nom_malade'];
	  $fetch_malade_prenom=$find_malade_row['prenom_malade'];

      echo '<option value="'.$fetch_malade_code.'">'.$fetch_malade_name.' '.$fetch_malade_prenom.'</option>';

  } 
?>
                  </select>
              </div><br>
			    <label class="">Type: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="type" class="form-control validate[required]">
                  <option selected="selected" value="">Selectionnée</option>
                                   <option value="code">code</option>
                                   <option value="conduit">conduit</option>
                  </select>
              </div><br>
    
    <label class="">Date : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="date_debut" type="date" placeholder="" class="form-control validate[required]" />
              </div><br>
       <label class="">temp : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input name="temp" type="time" placeholder="" class="form-control validate[required]" />
              </div><br>
              <label class="">frais d'heures: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="frais" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
             
           <label class="">moniteur et circuit : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <textarea  class="form-control" name="medicament">
                  </textarea>
              </div><br>
              <br> 

          <button type="submit" name="submit" class="mybtn mybtn-success">Ajouter</button>     

          <hr id='success'>

      </form>
  
  </div>

<div class="clear"></div>


   

      <br>
        

</div>  
        
                           
           




  </body>
</html>
