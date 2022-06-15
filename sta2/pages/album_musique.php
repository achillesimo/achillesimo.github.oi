<!-- Header -->
<?php  include '../header.php'?>

<h1 class="text-center">Détails de l'album</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col">ID</th>
          <th  scope="col">Nom</th>
          <th  scope="col">Genre</th>
          <th  scope="col">Date de sortie</th>
          <th  scope="col">Label</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              
              if (isset($_GET['album_id'])) {
                  $albumid = $_GET['album_id']; 

                   
                  $query="SELECT * FROM album WHERE id_album = {$albumid} ";  
                  $view_album= mysqli_query($conn,$query);            

                  while($row = mysqli_fetch_assoc($view_album))
                  {
                    $id = $row['id_album'];
                    $nom = $row['nom'];
                    $genre = $row['genre'];
                    $date = $row['date_sortie'];
                    $label = $row['id_label'];

                    $query2="SELECT nom FROM label WHERE id_label = {$label}";
                    $view_label= mysqli_query($conn,$query2);
                    while($row2= mysqli_fetch_assoc($view_label)){
                      $label = $row2['nom'];  
                    } 

                    echo "<tr >";
                    echo " <td >{$id}</td>";
                    echo " <td > {$nom}</td>";
                    echo " <td > {$genre}</td>";
                    echo " <td > {$date}</td>";
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
<h1 class="text-center">Musiques de l'album</h1>
<div class="container">
  <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col">TITRES</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
            <?php
              
              if (isset($_GET['album_id'])) {
                  $albumid = $_GET['album_id'];  

                  $query3="SELECT titre FROM musique INNER JOIN album_musique ON album_musique.id_musique= musique.id_musique WHERE album_musique.id_album = $albumid;"; 

                  $view_titre= mysqli_query($conn,$query3);            

                  while($row3 = mysqli_fetch_assoc($view_titre))
                  {
                    $titre = $row3['titre'];
                    echo "<tr >";
                    echo " <td >{$titre}</td>";
                    echo "<tr >";
                    }
                }
            ?>
          </tr>  
        </tbody>
  </table>

</div>
  
