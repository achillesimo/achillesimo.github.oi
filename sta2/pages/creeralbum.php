<!-- Header -->
<?php include "../header.php" ?>


<?php 
  if(isset($_POST['create'])) 
    {
        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $date = $_POST['date'];
        $label = $_POST['label'];
      
        
        $query= "INSERT INTO album(nom, genre, date_sortie, id_label) VALUES('{$nom}','{$genre}','{$date}', {$label})";
        $add_album = mysqli_query($conn,$query);
    
         
          if (!$add_album) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Album ajouté avec succès!')</script>";
              }         
    }
?>

<h1 class="text-center">Détails sur l'album </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom"  class="form-control">
      </div>

      <div class="form-group">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre"  class="form-control">
      </div>

      <div class="form-group">
        <label for="date" class="form-label">Date de sortie</label>
        <input type="date" name="date"  class="form-control">
      </div>
    
      <div class="form-group">
        <label for="label" class="form-label">Label</label>
        <select name="label" class="form-control">
          <option value="">--Choisissez un label--</option>
          <?php
            $query2="SELECT * FROM label";
            $view_label= mysqli_query($conn,$query2);
            while ($row = mysqli_fetch_assoc($view_label)) {
          ?>
              <option value="<?php echo $row['id_label'] ?>"><?php echo $row['nom'] ?></option>
          <?php  
            }
          ?>
        </select>
      </div>     

      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-success mt-2" value="Ajouter">
      </div>
    </form> 
  </div>


