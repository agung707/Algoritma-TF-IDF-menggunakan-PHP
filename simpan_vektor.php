<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body bgcolor="#CCCCCC">
<?php
include"konfigurasi.php";
// $host="localhost";
// $user="root";
// $password="";
// $db="uas";

// $hubung=mysql_connect("$host","$user","$password");
// $pilih_db=mysql_select_db($db);
//if(
//!empty($_POST['term']) && !empty($_POST['q']) && !empty($_POST['d1']) && //!empty($_POST['d2']) && !empty($_POST['d3']) && !empty($_POST['d4']) && //!empty($_POST['d5']) && !empty($_POST["d6"]) &&  //is_array($_POST['term'])&& is_array($_POST['d1']) && //is_array($_POST['d1'])&& is_array($_POST['d2']) //&&is_array($_POST['d2'])&& //is_array($_POST['d3'])&&is_array($_POST['d4'])&&is_array($_POST['d5'])&&i//s_array($_POST['d6'])&&count($_POST['term'])===count($_POST['d1'])===coun//t($_POST['d2'])===count($_POST['d3'])===count($_POST['d4'])===count($_POS//T['d5'])===count($_POST['d6'])
 
//)
mysqli_query($con, "truncate vektor");
if($con)
	{
    $pvq_array = $_POST['pvq'];
    $pv1_array = $_POST['pv1'];
	  $pv2_array = $_POST['pv2'];
    $pv3_array = $_POST['pv3'];
	
    for ($i = 0; $i < count($pvq_array); $i++) {

      // $pvq = mysqli_real_escape_string($pvq_array[$i]);
      // $pv1 = mysqli_real_escape_string($pv1_array[$i]);
      // $pv2 = mysqli_real_escape_string($pv2_array[$i]);

      mysqli_query($con, "INSERT INTO vektor (pvq,pv1,pv2,pv3) VALUES ('$pvq_array[$i]','$pv1_array[$i]','$pv2_array[$i]','$pv3_array[$i]')");
		} 
    // echo"<a href=hitung_vektor.php>kembali ke vektor</a>";
}

?>
<script type="text/javascript">
  window.location.href = "hitung_hasil_tfidf.php"
</script>

</body>
</html>