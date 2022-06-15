<!-- Header -->
<?php  include "../header.php" ?>

<?php 
  if(isset($_POST['create'])) 
    {
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        $label = $_POST['label'];
      
        
        $query= "INSERT INTO artiste(nom_artiste, age, id_label) VALUES('{$nom}',{$age},{$label})";
        $add_artiste = mysqli_query($conn,$query);
    
         
          if (!$add_artiste) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Artiste ajoutée avec succès!')</script>";
              }         
    }
?>

<h1 class="text-center">Détails sur l'artiste </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom"  class="form-control">
      </div>

      <div class="form-group">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age"  class="form-control">
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
>