<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

<style type="text/css">
	
	.hata {
		font-size: 0.8 em;
		font-weight: bold;
		color : #FF0000;

	}

</style>

</head>
<body>

        <?php if(@$_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$ad = $email = $yorum = $cins = $web = "" ;
    	$adh = $emailh = $cinsh = $webh = "" ;

        function kontrol($veri)
        {
        	$veri = trim($veri);
        	$veri = stripslashes($veri);
        	$veri = htmlspecialchars($veri);

        	return $veri;
        }


        if(empty($_POST['ad']))
        {
        	$adh = "Bu alan boş geçilemez";
        }
        else {
        	$ad = kontrol($_POST['ad']);
        	if (!preg_match("/^[a-zA-Z ]*$/",$ad)) 
      $adh = "Sadece  hatf ve boşluk karakteri içerebilir"; 
        
        }


       if(empty($_POST['email']))
        {
        	$emailh = "Bu alan boş geçilemez";
        }
        else {
        	$email = kontrol($_POST['email']);
        	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
      $emailh = "Geçersiz bir eposta girdiniz"; 
        
        }

        if(empty($_POST['web']))
        {
        	$webh = "Bu alan boş geçilemez";
        }
        else {
        	$web = kontrol($_POST['web']);
        	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) $webh = "Geçersiz URL";
        
        }

        if(empty($_POST['yorum']))
        {
        	$yorumh = "";
        }
        else {
        	$yorum = kontrol($_POST['yorum']);
        }


        if(empty($_POST['cins']))
        {
        	$cinsh = "Bu alan boş geçilemez";
        }
        else {
        	$cins = kontrol($_POST['cins']);
        }

       // echo $ad , " " , $web , " " , $email, " " , $cins ; 
		
		// (echo $adh , " " , $webh , " " , $emailh ;       


    }
    
    		?>

		<h2> Kişi Kayıt </h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"> 
	     Ad: <input type="text" name="ad" value="<?php echo @$ad ?>"><span class="hata"> <?php echo @$adh ?> </span><br><br>
	     Email: <input type="text" name="email" value="<?php echo 
	     @$email ?>"> 

	     <span class="hata"> <?php echo @$emailh ?> </span>
	     <br><br>
	     Web: <input type="text" name="web" value="<?php echo @$web ?>"> 
	     <span class="hata"> <?php echo @$webh ?> </span><br><br>
	     Yorum: <textarea name = "yorum" columns= 20 rows="5"> 
	      <?php echo @$yorum ?>
	     </textarea> <br><br>

	     Cinsiyet: <input type="radio" name="cins" value="bay"> Erkek
	     		   <input type="radio" name="cins" value="bayan"> Kadın

	     <span class="hata"> <?php echo @$cinsh ?></span><br><br>

	     <input type="submit" name="submit" value="Gönder">

		</form>

		

		<?php 


			echo @$ad . "<br>";
			echo @$email . "<br>";
			echo @$web . "<br>";
			echo @$yorum . "<br>";
			echo @$cins . "<br>";

		?>

</body>
</html>