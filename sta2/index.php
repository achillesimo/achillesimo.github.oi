<!-- Header -->
<?php include "header.php" ?>

<!-- navbar -->
<header>
        <nav class="navbar">
                <a href="#">Accueil</a>
                <a href="#album">Albums</a>
                <a href="#artiste">Artistes</a>
                <a href="#musique">Musiques</a>
                <a href="#label">Labels</a>
                <a href="#concert">Concerts</a>
        </nav> 
    </header> 
    <br><br><br><br>

<!-- body -->
<div class="container mt-5">
    <h1 class="text-center">SPOT TON ARTISTE </h1>
        <p class="text-center">
            Découvres les artistes du moment
            <br><br><br>
        </p>
</div>

<!-- Albums -->
<div class="container">
    <br>
    <h1 class="text-center" id="album">LISTE DES ALBUMS</h1>
    <a href="pages/creeralbum.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-plus"></i> Ajouter un nouveau Album</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th  scope="col">ID</th>
                <th  scope="col">Nom</th>
                <th  scope="col">Genre</th>
                <th  scope="col">Date de sortie</th>
                <th  scope="col">Label</th>
                <th  scope="col" class="text-center">Operations sur les artistes</th>
            </tr>  
        </thead>
        <tbody>
            <tr>
                <?php
                    $query="SELECT * FROM album";               // SQL query to fetch all table data
                    $view_album= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
                    while($row= mysqli_fetch_assoc($view_album)){
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
                        echo " <th scope='row' >{$id}</th>";
                        echo " <td > {$nom}</td>";
                        echo " <td > {$genre}</td>";
                        echo " <td > {$date}</td>";
                        echo " <td >{$label} </td>";

                        echo " <td class='text-center'> <a href='pages/album_musique.php?album_id={$id}' class='btn btn-success'> Musiques de l'album</a> </td>";
                        echo " </tr> ";
                    }  
                ?>
              </tr>  
            </tbody>
        </table>
</div> 

<br><br><br>

<!-- Artistes -->
<div class="container">
    <br>
    <h1 class="text-center" id="artiste">LISTE DES ARTISTES</h1>
      <a href="pages/creerartiste.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-plus"></i> Ajouter un nouveau Artiste</a>

        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Nom</th>
              <th  scope="col">Age</th>
              <th  scope="col">Label</th>
              <th  scope="col" class="text-center">Operations sur les artistes</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT * FROM artiste";               // SQL query to fetch all table data
            $view_artiste= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_assoc($view_artiste)){
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
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$nom}</td>";
              echo " <td > {$age}</td>";
              echo " <td >{$label} </td>";

              echo " <td class='text-center'> <a href='pages/artiste_album.php?artiste_id={$id}' class='btn btn-success'> Albums de l'artiste</a> </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>

<br><br><br>

<!-- Musiques -->
<div class="container">
    <br>
    <h1 class="text-center" id="musique">LISTE DES MUSIQUES</h1>
      <a href="pages/creermusique.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-plus"></i> Ajouter une nouvelle musique</a>

        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Titre</th>
              <th  scope="col">Genre</th>
              <th  scope="col">Durée</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT * FROM musique";               // SQL query to fetch all table data
            $view_musique= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_assoc($view_musique)){
              $id = $row['id_musique'];                
              $titre = $row['titre'];        
              $genre = $row['genre'];         
              $duree = $row['duree'];        


              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$titre}</td>";
              echo " <td > {$genre}</td>";
              echo " <td >{$duree} </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>

  <br><br><br>

<!-- Labels -->
  <div class="container">
    <br>
    <h1 class="text-center" id="label">LISTE DES LABELS</h1>
      <a href="pages/creerlabel.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-plus"></i> Ajouter un nouveau label</a>

        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Nom</th>
              <th  scope="col">Ville</th>
              <th  scope="col">Adresse</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT * FROM label";               // SQL query to fetch all table data
            $view_label= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_assoc($view_label)){
              $id = $row['id_label'];                
              $nom = $row['nom'];        
              $ville = $row['ville'];         
              $adresse = $row['adresse'];        


              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$nom}</td>";
              echo " <td > {$ville}</td>";
              echo " <td >{$adresse} </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>

  <br><br><br>

<!-- Concerts -->
  <div class="container">
    <br>
    <h1 class="text-center" id="concert">LISTE DES CONCERTS</h1>
      <a href="pages/creerconcert.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-plus"></i> Créer un nouveau concert</a>

        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Lieux</th>
              <th  scope="col">Date</th>
              <th  scope="col">Prix</th>
              <th  scope="col"class="text-center">Operations sur les concerts</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT * FROM concert";               // SQL query to fetch all table data
            $view_concert= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_assoc($view_concert)){
              $id = $row['id_concert'];                
              $lieu = $row['lieu'];        
              $date = $row['date'];         
              $prix = $row['prix'];        


              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$lieu}</td>";
              echo " <td > {$date}</td>";
              echo " <td >{$prix} </td>";

              echo " <td class='text-center'> <a href='pages/concert_artiste.php?concert_id={$id}' class='btn btn-success'>  Artistes participants au concert</a> </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>   
