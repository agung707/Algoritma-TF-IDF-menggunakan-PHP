

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#CCCCCC">
<?php
include"konfigurasi.php";
mysqli_query($con, "truncate wdq");
if($con)
  {
    $wdq1_array = $_POST['wdq1'];
    $wdq2_array = $_POST['wdq2'];
    $wdq3_array = $_POST['wdq3'];
  
    for ($i = 0; $i < count($wdq1_array); $i++) {

      // $wdq1 = mysqli_real_escape_string($wdq1_array[$i]);
      // $wdq2 = mysqli_real_escape_string($wdq2_array[$i]);

      mysqli_query($con, "INSERT INTO wdq (wdq1,wdq2,wdq3) VALUES ('$wdq1_array[$i]','$wdq2_array[$i]','$wdq3_array[$i]')");
    } 
}
?>
  <script type="text/javascript">
  window.location.href = "hitung_hasil_tfidf.php"
</script>
</body>
</html>