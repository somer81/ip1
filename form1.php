<!DOCTYPE html>
<html>
<head>
	<title> Form İşlemleri </title>
</head>
<body>


<?php
// define variables and set to empty values

 $adErr = $emailErr = $cinsErr = $websiteErr = "";
   $ad = $email = $cins = $yorum= $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  function veriKontrol($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



  if (empty($_POST["ad"])) {
    $adErr = "Ad alanı zorunlu";
  } else {
    $ad = veriKontrol($_POST["ad"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email alanı zorunlu";
  } else {
    $email = veriKontrol($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = veriKontrol($_POST["website"]);
  }

  if (empty($_POST["yorum"])) {
    $yorum = "";
  } else {
    $yorum = veriKontrol($_POST["yorum"]);
  }

  if (empty($_POST["cins"])) {
    $cinsErr = "Cinsiyet Alanı zorunlu";
  } else {
    $cins = veriKontrol($_POST["cins"]);
  }



 
}

  
  	
?>



	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
Ad: <input type="text" name="ad"> <span> <font color="red"> * <?php echo $adErr; ?> </font></span> <br/>
E-mail: <input type="text" name="email"> <span> <font color="red"> * <?php echo $emailErr; ?> </font></span> <br/>
Website: <input type="text" name="website"> <span> <?php echo $websiteErr; ?> </span> <br/>
Yorum: <textarea name="yorum" rows="5" cols="40"></textarea> <br/>

Cinsiyet:
<input type="radio" name="cins" value="kadin">Kadın
<input type="radio" name="cins" value="erkek">Erkek  
<span>  <font color="red"> * <?php echo     $cinsErr; ?> </font></span> <br/>


	<input type="submit" name="" value="Gönder"><br/>
	</form>

<?php 

 echo $ad . " <br> "  . $email  . " <br>" . $cins . " <br>" .  $yorum  .
   "<br> " . $website  ;

   ?>


</body>
</html>