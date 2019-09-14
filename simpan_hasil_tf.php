

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#CCCCCC">
<?php
include"konfigurasi.php";
mysqli_query($con, "truncate hasil");
if($con)
  {
    $hd1_array = $_POST['hd1'];
    $hd2_array = $_POST['hd2'];
    $hd3_array = $_POST['hd3'];
  
    for ($i = 0; $i < count($hd1_array); $i++) {

      // $wdq1 = mysqli_real_escape_string($wdq1_array[$i]);
      // $wdq2 = mysqli_real_escape_string($wdq2_array[$i]);

      mysqli_query($con, "INSERT INTO hasil (hd1,hd2,hd3) VALUES ('$hd1_array[$i]','$hd2_array[$i]','$hd3_array[$i]')");
    } 
}
?>
  <script type="text/javascript">
  window.location.href = "hasil_keseluruhan.php"
</script>
</body>
</html>