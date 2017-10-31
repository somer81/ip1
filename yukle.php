<?php
$hedef_dizin = "uploads/img/";
$hedef_dosya = $hedef_dizin . basename($_FILES["dosyayukle"]["name"]);
$uploadOk = 1;

$resimDosyaTuru = pathinfo($hedef_dosya,PATHINFO_EXTENSION);
// Gerçek bir resim dosyası mı değil mi kontrol et

if(isset($_POST["submit"])) {
    $kontrol = getimagesize($_FILES["dosyayukle"]["tmp_name"]);
    if($kontrol !== false) {
        echo "Resim dosyasının uzantısı - " . $kontrol["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Resim dosyası Yüklemediniz.";
        $uploadOk = 0;
    }

if (file_exists($hedef_dosya)) {
    echo "Üzgünüm dosya zaten mevcut.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["dosyayukle"]["size"] > 500000000) {
    echo "Üzgnüm dosya boyutu büyük olmamalı.";
    $uploadOk = 0;
}
// Allow certain file formats
if($resimDosyaTuru != "jpg" && $resimDosyaTuru != "png" && $resimDosyaTuru != "jpeg"
&& $resimDosyaTuru != "gif" ) {
    echo "Sadece JPG, JPEG, PNG & GIF formatlatını yükleyebilirsiniz.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Üzgünüm dosya yüklenmedi!!!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["dosyayukle"]["tmp_name"], $hedef_dosya)) {
        echo "Dosya : ". basename( $_FILES["dosyayukle"]["name"]). " yüklendi.";
    } else {
        echo "Üzgünüm dosya yüklenirken hata ile karşılaşıldı.";
    }
}
}
?>