<style>
  body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background-image: url("photo/background.jpg");
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  th {
    color: white;
    background: black;
  }

  td {
    color: white;
    background: black;

  }

  h2 {
    color: white;

  }

  .menu {
    width: 100%;
    height: 50px;
    background: black;
    overflow: auto;
  }

  .menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
    line-height: 50px;
  }

  .menu li {
    float: left;
  }

  .menu ul li a {
    background: black;
    text-decoration: none;
    width: 130px;
    display: block;
    text-align: center;
    color: #f2f2f2;
    font-size: 15px;
    font-family: sans-serif;
    letter-spacing: 0.2px;
  }

  menu li a:hover {
    color: #fff;
    opacity: 0.5;
    font-size: 15px;
  }

  .search-form {
    margin-top: 15px;
    float: right;
    margin-right: 460px;
  }

  input[type=text] {
    padding: 7px;
    border: none;
    font-size: 15px;
    width: 350px;
    font-family: sans-serif;
    white-space: nowrap;

  }
</style>

<body>

  <nav class="menu">
    <ul>

      <li><a href="acheterprod.php?lien=location"> voir les voitures </a></li>
      <li><a href="cart.php?lien=modifier"> Mes favoris </a></li>
      <li><a href="confirmachat.php?lien=Deconnexion"> catégories </a></li>
      <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>
    </ul>


  </nav>
</body>
<?php
echo "   <h2>  Voila Nos voitures     </h2> ";
$connect = mysqli_connect('localhost', 'root', '', 'musee') or die("Erreur de connexion");
$sqlSelect = "SELECT marque FROM oeuvres";
$result = $connect->query($sqlSelect);

echo "<select id='marque' name='marque' >";

while ($row = mysqli_fetch_array($result)) {
  unset($id, $name);
  $id = $row['marque'];
  $name = $row['marque'];
  echo '<option value="' . $id . '">' . $name . '</option>';
}
echo "</select>";

?>

<?php

echo "<form method='post'>
 <input type='submit' name='insert'
                class='insert' value='insert' onclick='insert()' />";
if (isset($_POST['insert'])) {

  $req3recette = mysqli_query($connect, "select * from oeuvres where marque='$name' limit 0,5") or die("Erreur de selection");

  echo "<table border=4px width=50%> <th>Nom</th> <th>Description</th> <th>Année</th> <th>Photo</th>";

  while ($reqresultat = mysqli_fetch_row($req3recette)) {
    $listenom = $reqresultat[1];
    $listeingred = $reqresultat[2];
    $listecout = $reqresultat[3];
    $listephoto = $reqresultat[4];

    echo "<tr> <td>$listenom</td> <td>$listeingred</td> <td>$listecout</td> <td><img src='photo/$listephoto' style='height:100px;width:150px'></img></td></tr>";
  }
  echo "</table> </form>";
}
?>