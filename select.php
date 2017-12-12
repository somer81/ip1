<html>
	<head> 
 	<meta charset="UTF-8">
	<style type="text/css">
		.center {
            margin: auto;
            width: 60%;
            border: 3px solid #73AD21;
            padding: 10px;
            font-size: 1.5em;
                }
	</style>
	</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vkmyo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query('SET NAMES UTF8');  // Türkçe karakter sorununu çöz
// Check connection
if ($conn->connect_error) {
    die("Bağlantı Hatası: " . $conn->connect_error);
} 

$sql = "SELECT id, ad, soyad, bolum FROM ogrenci LIMIT 3,4";
$tablo = $conn->query($sql);  // Seçilen kayıtları getir 

if ($tablo->num_rows > 0) {  // Tablodaki kayıt sayısı
    // output data of each row
    echo '<table class = "center" border="1" cellspacing="0" cellpadding="0">';
    echo '<tr> <th>ID</th> <th>Ad Soyad</th> <th> Bölüm </th> </tr>';
    while($kayit = $tablo->fetch_assoc()) {  // Tablo sütünlarını sütun isimleriyle alabilmeyi sağlıyor. 
        echo "<tr><td>" . $kayit["id"]. "</td><td>" . $kayit["ad"]. " " . $kayit["soyad"]. "</td> <td>" . $kayit['bolum'] .  "</td></tr>";
    }
    echo '</table>';
} else {
    echo "0 sonuç";
}
$conn->close();
?>

</body></html>

<?php
/*

$sql = "DELETE FROM ziyaretci WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Kayıt Başarıyla Silindi </br>";
} else {
    echo "Silme Hatası: " . $conn->error;
}

$sql = "UPDATE ziyaretci SET soyad='VKMYO' WHERE id=17";

if ($conn->query($sql) === TRUE) {
    echo "Güncelleme Başarılı";
} else {
    echo "Güncelleme Başarısız: " . $conn->error;
}
*/
?>