<!-- Header -->
<?php  include '../header.php'?>

<h1 class="text-center">Détails de l'artiste</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col">ID</th>
          <th  scope="col">Nom</th>
          <th  scope="col">Age</th>
          <th  scope="col">Label</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              
              if (isset($_GET['artiste_id'])) {
                  $artisteid = $_GET['artiste_id']; 

                   
                  $query="SELECT * FROM artiste WHERE id_artiste = {$artisteid} ";  
                  $view_artiste= mysqli_query($conn,$query);            

                  while($row = mysqli_fetch_assoc($view_artiste))
                  {
                    $id = $row['id_artiste'];
                    $nom = $row['nom_artiste'];
                    $age = $row['age'];
                    $label = $row['id_label'];

                    $query2="SELECT nom FROM label WHERE id_label = {$label}";
                    $view_label= mysqli_query($conn,$query2);
                    while($row2= mysqli_fetch_assoc($view_label)){
                      $label = $row2['nom'];  
                    } 

                    echo "<tr >";
                    echo " <td >{$id}</td>";
                    echo " <td > {$nom}</td>";
                    echo " <td > {$age}</td>";
                    echo " <td >{$label} </td>";  
                    echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  

<br><br>
<h1 class="text-center">Albums de l'artiste</h1>
<div class="container">
  <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col">NOM</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
            <?php
              
              if (isset($_GET['artiste_id'])) {
                  $artisteid = $_GET['artiste_id'];  

                  $query3="SELECT nom FROM album INNER JOIN artiste_album ON album.id_album= artiste_album.id_album WHERE artiste_album.id_artiste = $artisteid;"; 

                  $view_album= mysqli_query($conn,$query3);            

                  while($row3 = mysqli_fetch_assoc($view_album))
                  {
                    $nomalbum = $row3['nom'];
                    echo "<tr >";
                    echo " <td >{$nomalbum}</td>";
                    echo "<tr >";
                    }
                }
            ?>
          </tr>  
        </tbody>
  </table>

</div>

