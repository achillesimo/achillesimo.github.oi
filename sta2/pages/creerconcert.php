<!-- Header -->
<?php  include "../header.php" ?>

<?php 
  if(isset($_POST['create'])) 
    {
        $lieu = $_POST['lieu'];
        $date = $_POST['date'];
        $prix = $_POST['prix'];
      
        
        $query= "INSERT INTO concert(lieu, date, prix) VALUES('{$lieu}','{$date}','{$prix}')";
        $add_concert = mysqli_query($conn,$query);
    
         
          if (!$add_concert) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Concert ajouté avec succès!')</script>";
              }         
    }
?>

<h1 class="text-center">Détails sur le Concert </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="lieu" class="form-label">Lieu</label>
        <input type="text" name="lieu"  class="form-control">
      </div>

      <div class="form-group">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date"  class="form-control">
      </div>
    
      <div class="form-group">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" name="prix"  class="form-control">
      </div>     

      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-success mt-2" value="Ajouter">
      </div>
    </form> 
  </div>

  