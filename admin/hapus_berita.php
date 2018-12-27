<?php
if(@$_SESSION['admin']){
mysqli_query($koneksi, "delete from berita where id_berita='$kdberita'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Data berita Berhasil");
window.location.href="?page=berita&action=view";
</script>
<?php
}else{
	header("location: ../index.php");
}?>