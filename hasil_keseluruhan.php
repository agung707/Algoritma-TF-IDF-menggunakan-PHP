<?php include "konfigurasi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {font-size: 24px}
.style3 {	color: #FFFFFF;
	font-size: 18px;
}
-->
</style>
</head>

<body bgcolor="#666666">

<table width="637" border="0" align="center">
  <tr>
    <td width="631" bgcolor="#CCFF66"><p align="center"><span class="style2"><strong>SISTEM PAKAR DIAGNOSA GEJALA DEMAM BERDARAH (DBD) PADA ORANG DEWASA</strong><strong> METODE TFIDF</strong></span></p></td>
  </tr>
  <tr>
    <td height="64" bgcolor="#CCFFCC">
    <p align="center"><a href="index.php">Back to home</a></p>
    </td>
  </tr>
  <tr>
    <td height="175" bgcolor="#CCFFCC"><div align="center">
<?php
$tampil = mysqli_query($con,"SELECT SUM(wdq1) AS twdq1 , SUM(wdq2) AS twdq2, SUM(wdq3) AS twdq3 FROM wdq");
  while ($wdq = mysqli_fetch_array($tampil))
  {
    if ($wdq["twdq1"] > $wdq["twdq2"]) {
      echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ1</u></b> dengan Nilai <b><u>$wdq[twdq1]</u></b>";
    }elseif ($wdq["twdq1"] > $wdq["twdq3"]) {
      echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ1</u></b> dengan Nilai <b><u>$wdq[twdq1]</u></b>";
    }elseif ($wdq["twdq2"] > $wdq["twdq3"]) {
      echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ2</u></b> dengan Nilai <b><u>$wdq[twdq2]</u></b>";
    }elseif ($wdq["twdq2"] > $wdq["twdq1"]) {
      echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ2</u></b> dengan Nilai <b><u>$wdq[twdq2]</u></b>";
    }elseif ($wdq["twdq3"] > $wdq["twdq2"]) {
      echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ3</u></b> dengan Nilai <b><u>$wdq[twdq3]</u></b>";
    }elseif ($wdq["twdq3"] > $wdq["twdq1"]) {
            echo "Nilai Total WDQ Tertinggi ada pada <b><u>WDQ3</u></b> dengan Nilai <b><u>$wdq[twdq3]</u></b>";
    }else{
      echo "salah";
    }
  }
?>

<br>

<?php
$hasilakhir = mysqli_query($con," SELECT SUM(wdq1) AS hwdq1 , SUM(wdq2) AS hwdq2, SUM(wdq3) AS hwdq3 , SUM(pvq) AS hpvq , SUM(pv1) AS hpv1 , SUM(pv2) AS hpv2, SUM(pv3) AS hpv3  FROM wdq , vektor ");

  while ($hasil = mysqli_fetch_array($hasilakhir))
  {
  $hakarpvq= sqrt($hasil['hpvq']);
  $hakarpv1= sqrt($hasil['hpv1']);
  $hakarpv2= sqrt($hasil['hpv2']);
  $hakarpv3= sqrt($hasil['hpv3']);
  
  $kalid1= ($hakarpvq * $hakarpv1);
  $kalid2= ($hakarpvq * $hakarpv2); 
  $kalid3= ($hakarpvq * $hakarpv3);

  $hasild1= ($hasil['hwdq1'] / $kalid1 );
  $hasild2= ($hasil['hwdq2'] / $kalid2 );
  $hasild3= ($hasil['hwdq3'] / $kalid3 );
  
    if ($hasild1 > $hasild2) {
      echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 1</u></b> dengan Nilai <b><u>$hasild1</u></b>";
    }elseif ($hasild1 > $hasild3) {
      echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 1</u></b> dengan Nilai <b><u>$hasild1</u></b>";
    }elseif ($hasild2 > $hasild1) {
      echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 2</u></b> dengan Nilai <b><u>$hasild2</u></b>";
    }elseif ($hasild2 > $hasild3) {
      echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 2</u></b> dengan Nilai <b><u>$hasild2</u></b>";
    }elseif ($hasild3 > $hasild1) {
      echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 3</u></b> dengan Nilai <b><u>$hasild3</u></b>";
    }elseif ($hasild3 > $hasild2) {
        echo "Hasil Nilai Akhir Tertinggi ada pada <b><u>Dokumen 3</u></b> dengan Nilai <b><u>$hasild3</u></b>";
    }else{
      echo "salah";
    }
  }
?>

<br>    

<?php
$tampil=mysqli_query($con,"SELECT * FROM hasil");
while($hasil=mysqli_fetch_array($tampil))
{
$d1 = $hasil['hd1'];
$d2 = $hasil['hd2'];
$d3 = $hasil['hd3'];

if ($d1 > $d2) {
  echo "<h1>Dokumen 1 mirip dengan Query</h1>";
}elseif ($d1 > $d3) {
  echo "<h1>Dokumen 1 mirip dengan Query</h1>";
}elseif ($d2 > $d3) {
  echo "<h1>Dokumen 3 mirip dengan Query</h1>";
}elseif ($d2 > $d1) {
  echo "<h1>Dokumen 2 mirip dengan Query</h1>";
}elseif ($d3 > $d2) {
  echo "<h1>Dokumen 3 mirip dengan Query</h1>";
}elseif ($d3 > $d1) {
  echo "<h1>Dokumen 3 mirip dengan Query</h1>";
}else{
  echo "salah";
}
/*
echo"
<table>
        <td><textarea rows=1 cols=7>".$hasil['hd1']."</textarea></td>
        <td><textarea rows=1 cols=7>".$hasil['hd2']."</textarea></td>
</table>
<hr/></hr>
";
*/
}
?>
      </p>
    </div></td>
  </tr>
</table
<p>&nbsp;</p>
<div align="center" class="style2 style3">Copyright ©2019 Edited by: Rizki Agung Purnama</div>
</body>
</html>
