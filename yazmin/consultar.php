<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM zayra";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='line'align='center'>";
    echo "<tr>";
    echo "<th align='center'>ID</th> <th>Nombre</th> <th>Apellido</th> <th>Edad</th> <th>Correo</th> <th>Eliminar</th> <th>Modificar</th>";
    echo "</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td align='center'>" . $row["id"]. "</td> <td>" . $row["nombre"]. "</td> <td>" . $row["apellido"]. "</td> <td align='center'>" . $row["edad"]. "</td> <td align='center'>" . $row["correo"]. "</td>";
    echo "<td align='center'><a href='./eliminar.php?id=".$row["id"]."' ><img src='../yazmin/img/tache.png' width='100px' height='100px'></a></td>";
    echo "<td align='center'><a href='./formod.php?id=".$row["id"]."&nombre=".$row["nombre"]."&apellido=".$row["apellido"]."&edad=".$row["edad"]."&correo=".$row["correo"]."' >
    <img src='../yazmin/img/mod.jpg' width='100px' height='100px'></a></td>";   
    echo "</tr>";
  }
} else {
  echo "0 results";
  echo "<br><br>";
  echo "<a href='formulario.html' target='_blank'>Insertar otro </a>";
}
$conn->close();
?>
