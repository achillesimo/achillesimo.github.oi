<!-- Header -->
<?php  include "../header.php" ?>

<?php 
  if(isset($_POST['create'])) 
    {
        $titre = $_POST['titre'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
      
        
        $query= "INSERT INTO musique(titre, genre, duree) VALUES('{$titre}','{$genre}','{$duree}')";
        $add_musique = mysqli_query($conn,$query);
    
         
          if (!$add_musique) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Musique ajoutée avec succès!')</script>";
              }         
    }
?>

<h1 class="text-center">Détails sur la musique </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" name="titre"  class="form-control">
      </div>

      <div class="form-group">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre"  class="form-control">
      </div>
    
      <div class="form-group">
        <label for="duree" class="form-label">Durée</label>
        <input type="text" name="duree"  class="form-control">
      </div>     

      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-success mt-2" value="Ajouter">
      </div>
    </form> 
  </div>

