<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {font-size: 24px}
.style3 {color: #FFFFFF;
	font-size: 18px;
}
-->
  </style>
</HEAD>

 <body bgcolor="#666666">
 <form action="simpan_vektor.php" method="post">
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
          <table border="1" align="center">
            <tr>
              <td colspan="10" bgcolor="#FFFF99"><div align="center">Panjang Vektor</div></td>
            </tr>
            <tr>
              <td><div align="center">Term Keseluruhan</div></td>
              <td><div align="center">Q</div></td>
              <td><div align="center">D1</div></td>
              <td><div align="center">D2</div></td>
              <td><div align="center">D3</div></td>
            </tr>
            <tr>
              <?php
  error_reporting(0);
include"konfigurasi.php";


$tampil=mysqli_query($con,"select*from term_tf , dokumen_terproses order by term_tf ASC");
$jumlah= mysqli_num_rows ($tampil); 

while($term_tf=mysqli_fetch_array($tampil)){
$q =$term_tf['q'];
$d1 =$term_tf['d1'];
$d2 =$term_tf['d2'];
$d3 =$term_tf['d3'];

$search = $term_tf['term_tf'];

$ketemu_q=$q;
$ketemu_d1=$d1;
$ketemu_d2=$d2;
$ketemu_d3=$d3;

$count_q = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_q, 1)));
$count_d1 = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_d1, 1)));
$count_d2 = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_d2, 1)));
$count_d3 = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_d3, 1)));

$df_q = $count_q;
$df_d1 = $count_d1;
$df_d2 = $count_d2;
$df_d3 = $count_d3;

$df = $df_q + $df_d1 + $df_d2 + $df_d3;
$idf = log10(4 / $df);
$wdtq = $count_q * $idf ;
$wdt1 = $count_d1 * $idf ;
$wdt2 = $count_d2 * $idf ;
$wdt3 = $count_d3 * $idf ;

$wdq1= $wdtq * $wdt1 ;
$wdq2= $wdtq * $wdt2 ;
$wdq3= $wdtq * $wdt3 ;

$pvq= $wdtq * $wdtq ;
$pv1= $wdt1 * $wdt1 ;
$pv2= $wdt2 * $wdt2 ;
$pv3= $wdt3 * $wdt3 ;

echo"
<tr>
	<td>$term_tf[term_tf]</td>
	
	<td><textarea rows=1 cols=7 name=pvq[] value=$pvq>$pvq</textarea></td>
	<td><textarea rows=1 cols=7 name=pv1[] value=$pv1>$pv1</textarea></td>
	<td><textarea rows=1 cols=7 name=pv2[] value=$pv2>$pv2</textarea></td>	
  <td><textarea rows=1 cols=7 name=pv3[] value=$pv2>$pv3</textarea></td>  

</tr>
";

}
?>
            </tr>
          </table><br>
          <hr>
          <input type="submit" name="submit" value="Simpan data">
  <p>&nbsp;</p>
        </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" class="style2 style3">Copyright &copy;2019 Edited by: Rizki Agung Purnama</div>
 </form>
</body>
</html>