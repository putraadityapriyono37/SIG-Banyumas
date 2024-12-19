<?php
require_once "../_config/config.php";

mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>window.location='data.php'</script>";

?>
