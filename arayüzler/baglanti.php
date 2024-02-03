<?php
$vt_sunucu="localhost";
$vt_kullanici="root";
$vt_sifre="";
$vt_adi="mydatabase";


$baglan =mysqli_connect($vt_sunucu,$vt_kullanici, $vt_sifre, $vt_adi);

if(!$baglan)
{
  die ("BAGLANTI HATASI".mysqli_connect_error());
}
 
else {
  //  echo "BAGLANTI BASARILI";
}

?>