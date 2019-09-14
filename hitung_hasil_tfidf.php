<?php include"konfigurasi.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: 24px;
	font-weight: bold;
}
.style3 {font-size: 24px}
.style3 {color: #FFFFFF;
	font-size: 18px;
}
-->
</style>
</head>

 <body bgcolor="#666666">
<form action="simpan_hasil_tf.php" method="post">
  <div align="center">
    <table width="637" border="0" align="center">
      <tr>
        <td width="631" bgcolor="#CCFF66"><p align="center"><span class="style3" style="color: black;"><strong>SISTEM PAKAR DIAGNOSA GEJALA DEMAM BERDARAH (DBD) PADA ORANG DEWASA</strong><strong> METODE TFIDF</strong></span></p></td>
      </tr>
      <tr>
        <td height="64" bgcolor="#CCFFCC">
            <p align="center"><a href="index.php">Back to home</a></p>
        </td>
      </tr>
      <tr>
        <td height="175" bgcolor="#CCFFCC"><div align="center">
            <p align="center" class="style2">Dapat di simpulkan bahwa Query yang anda masukan ialah masuk kepada hasil akhir yang nilai nya paling tinggi</p>
            <div align="center">
              <table border="1" bordercolor="#0000FF">
                <tr>
                  <td colspan="8" bgcolor="#FFFFFF"><div align="center">Total wdq*wdi</div></td>
                </tr>
                <tr>
                  <td bgcolor="#0099FF"><div align="center">d1</div></td>
                  <td bgcolor="#0099FF"><div align="center">d2</div></td>
                  <td bgcolor="#0099FF"><div align="center">d3</div></td>
                </tr>
                <?php
	
	$tampil = mysqli_query($con,"SELECT SUM(wdq1) AS twdq1 , SUM(wdq2) AS twdq2, SUM(wdq3) AS twdq3 FROM wdq ");
	while ($wdq = mysqli_fetch_array($tampil))
	{
		echo " <tr>
				<td><textarea rows=1 cols=7 name=twdq1[]>$wdq[twdq1]</textarea></td>
				<td><textarea rows=1 cols=7 name=twdq2[]>$wdq[twdq2]</textarea></td>
        <td><textarea rows=1 cols=7 name=twdq3[]>$wdq[twdq3]</textarea></td>
			  </tr>";
	}
echo"";

	
?>
              </table>
              <br />
              <br />
              <table border="1" bordercolor="#0000FF">
                <tr>
                  <td colspan="9" bgcolor="#FFFFFF"><div align="center">Total Panjang Vektor</div></td>
                </tr>
                <tr>
                  <td bgcolor="#0099FF"><div align="center">q</div></td>
                  <td bgcolor="#0099FF"><div align="center">d1</div></td>
                  <td bgcolor="#0099FF"><div align="center">d2</div></td>
                  <td bgcolor="#0099FF"><div align="center">d3</div></td>
                </tr>
                <tr>
                  <?php
	
	$tampilpv = mysqli_query($con,"SELECT SUM(pvq) AS tpvq , SUM(pv1) AS tpv1 , SUM(pv2) AS tpv2, SUM(pv3) AS tpv3 FROM vektor ");
	while ($vektor = mysqli_fetch_array($tampilpv))
	{
	$akarpvq= sqrt($vektor['tpvq']);
	$akarpv1= sqrt($vektor['tpv1']);
	$akarpv2= sqrt($vektor['tpv2']);
  $akarpv3= sqrt($vektor['tpv3']);
	
		echo" <tr>
				<td><textarea rows=1 cols=7 name=q>$vektor[tpvq]</textarea></td>
				<td><textarea rows=1 cols=7 name=q>$vektor[tpv1]</textarea></td>
				<td><textarea rows=1 cols=7 name=q>$vektor[tpv2]</textarea></td>
			  <td><textarea rows=1 cols=7 name=q>$vektor[tpv3]</textarea></td>
        </tr>
			  <tr>
			  <td colspan='9' bgcolor='#FFFFFF'><center>SQRT Total Panjang Vektor</center></td>
			  </tr>
			  <tr>
			   <td><textarea rows=1 cols=7 name=q>$akarpvq</textarea></td>
			   <td><textarea rows=1 cols=7 name=q>$akarpv1</textarea></td>
			   <td><textarea rows=1 cols=7 name=q>$akarpv2</textarea></td>
         <td><textarea rows=1 cols=7 name=q>$akarpv3</textarea></td>
			  </tr>";
	}
echo"";

?>
                </tr>
              </table>
              <table border="1" bordercolor="#0000FF">
                <br />
                <br />
                <tr>
                  <td colspan="8" bgcolor="#FFFFFF"><center>
                      <div align="center">Hasil Akhir
                        <center>
                    </div></td>
                </tr>
                <tr>
                  <td bgcolor="#0099FF"><div align="center">d1</div></td>
                  <td bgcolor="#0099FF"><div align="center">d2</div></td>
                  <td bgcolor="#0099FF"><div align="center">d3</div></td>
                </tr>
                <tr>
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
  
		echo" 
		<tr>
				<td><textarea rows=1 cols=7 name=hd1[]>$hasild1</textarea></td>
				<td><textarea rows=1 cols=7 name=hd2[]>$hasild2</textarea></td>
		    <td><textarea rows=1 cols=7 name=hd3[]>$hasild3</textarea></td>
        	  </tr>";
	}
echo"";

?>
					
                </tr>
              </table>
              <hr>
     		<p align="center"><input type="submit" name="submit" value="Simpan data dan Lihat Hasil"></p>
            </div>
          </div></td>
          
    </table>
    <div align="center" class="style2 style3">Copyright ©2019 Edited by: Rizki Agung Purnama</div>
  </div>
  <div align="center"></div>
</form>
</body>
</html>
