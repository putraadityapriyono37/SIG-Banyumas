<?php
require_once "../_config/config.php";

mysqli_query($conn, "DELETE FROM tb_datawisata WHERE id_datawisata = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>window.location='data.php'</script>";

?>
