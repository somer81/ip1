  <?php 

  $data = " Ömer'in hikay'es\i? ";

  echo "Veri : <br>";
  echo $data . "<br>";
  addslashes($data);
  $data =  addslashes($data);
  echo "Veri AddSlash : <br>";
  echo $data . "<br>";
  echo "Veri StripSlash : <br>";
  $data = stripslashes($data);
  echo $data . "<br>";
 
  ?>