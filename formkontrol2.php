<!DOCTYPE HTML>  
<html>
<head>
<style>
.hata {color: #FF0000;} 
</style>
</head>
<body>  

<?php
// Değiğşkenleri Tanımladık ve Boş değer Atadık
$adHata = $emailHata = $cinsHata = $websiteHata = "";
$ad = $email = $cins = $yorum = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Formdan Gelindiğini Kontrol Ettik
  if (empty($_POST["ad"])) {  // Alan boş mu diye baktık 
    $adHata = "Ad Alanı Zorunludur!";
  } else {
    $ad = veriKontrol($_POST["ad"]);  // Veriyi Temizledik 
    // check if name only contains letters and whitespace
   // if (!preg_match("/^[a-zA-Z ]*$/",$ad)) {  // İstediğimiz kurala uyup uymadığını kontrol ettik
   //   $adHata = "Sadece karakter Girilmelidir"; 
   // }
  }
  
  if (empty($_POST["email"])) {
    $emailHata = "Email Alanı Zorunludur!";
  } else {
    $email = veriKontrol($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailHata = "Geçersiz Eposta"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = veriKontrol($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteHata = "Geçersiz URL"; 
    }
  }

  if (empty($_POST["yorum"])) {
    $yorum = "";
  } else {
    $yorum = veriKontrol($_POST["yorum"]);
  }

  if (empty($_POST["cins"])) {
    $cinsHata = "Cinsiyet Alanı Zorunludur!";
  } else {
    $cins = veriKontrol($_POST["cins"]);
  }
}

function veriKontrol($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Doğrulama Örneği</h2>
<p><span class="hata"> * zorunlu Alan.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Ad: <input type="text" name="ad" value="<?php echo $ad;?>">
  <span class="hata">* <?php echo $adHata;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="hata">* <?php echo $emailHata;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="hata"><?php echo $websiteHata;?></span>
  <br><br>
  Yorum: <textarea name="yorum" rows="5" cols="40"><?php echo $yorum;?></textarea>
  <br><br>
  Cinsiyet:
  <input type="radio" name="cins" <?php if (isset($cins) && $cins=="female") echo "checked";?> value="female">Kadın
  <input type="radio" name="cins" <?php if (isset($cins) && $cins=="male") echo "checked";?> value="male">Erkek
  <span class="hata">* <?php echo $cinsHata;?></span>
  <br><br>
  <input type="submit" name="submit" value="Gönder">  
</form>

<?php
echo "<h2>Bilgileriniz:</h2>";
echo $ad;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $yorum;
echo "<br>";
echo $cins;

?>

</body>
</html>