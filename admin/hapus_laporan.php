<?php
if(@$_SESSION['admin']){
mysqli_query($koneksi, "delete from laporan where id_laporan='$idlaporan'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Data laporan Berhasil");
window.location.href="?page=laporan&action=view";
</script>
<?php
}else{
	header("location: ../index.php");
}?>