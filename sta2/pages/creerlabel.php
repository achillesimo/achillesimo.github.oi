<!-- Header -->
<?php  include "../header.php" ?>

<?php 
  if(isset($_POST['create'])) 
    {
        $nom = $_POST['nom'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
      
        
        $query= "INSERT INTO label(nom, ville, adresse) VALUES('{$nom}','{$ville}','{$adresse}')";
        $add_label = mysqli_query($conn,$query);
    
         
          if (!$add_label) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Label ajouté avec succès!')</script>";
              }         
    }
?>

<h1 class="text-center">Détails sur le Label </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom"  class="form-control">
      </div>

      <div class="form-group">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" name="ville"  class="form-control">
      </div>
    
      <div class="form-group">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" name="adresse"  class="form-control">
      </div>     

      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-success mt-2" value="Ajouter">
      </div>
    </form> 
  </div>

