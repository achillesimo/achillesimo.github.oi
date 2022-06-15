<!-- Header -->
<?php  include '../header.php'?>

<h1 class="text-center">Détails du concert</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col">ID</th>
          <th  scope="col">Lieu</th>
          <th  scope="col">Date</th>
          <th  scope="col">Prix</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              
              if (isset($_GET['concert_id'])) {
                  $concertid = $_GET['concert_id']; 

                   
                  $query="SELECT * FROM concert WHERE id_concert = {$concertid} ";  
                  $view_concert= mysqli_query($conn,$query);            

                  while($row = mysqli_fetch_assoc($view_concert))
                  {
                      $id = $row['id_concert'];
                      $lieu = $row['lieu'];
                      $date = $row['date'];
                      $prix = $row['prix'];

                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$lieu}</td>";
                        echo " <td > {$date}</td>";
                        echo " <td >{$prix} </td>";  
                        echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>


<br><br>
<h1 class="text-center">Artistes participants au concert</h1>
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
              
              if (isset($_GET['concert_id'])) {
                  $concertid = $_GET['concert_id'];  

                  $query3="SELECT nom_artiste FROM artiste INNER JOIN concert_artiste ON artiste.id_artiste= concert_artiste.id_artiste WHERE concert_artiste.id_concert = $concertid;"; 

                  $view_concert= mysqli_query($conn,$query3);            

                  while($row3 = mysqli_fetch_assoc($view_concert))
                  {
                    $nomartiste = $row3['nom_artiste'];
                    echo "<tr >";
                    echo " <td >{$nomartiste}</td>";
                    echo "<tr >";
                    }
                }
            ?>
          </tr>  
        </tbody>
  </table>

</div>
  
