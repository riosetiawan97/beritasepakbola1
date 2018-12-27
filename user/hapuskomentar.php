<?php
if(@$_SESSION['admin']){
mysqli_query($koneksi, "delete from komentar where id_komentar='$id_komentar'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Komentar Berhasil");
history.go(-1);
</script>
<?php
}else{
	header("location: ../index.php");
}?>