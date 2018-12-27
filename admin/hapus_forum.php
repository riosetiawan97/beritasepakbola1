<?php
if(@$_SESSION['admin']){
mysqli_query($koneksi, "delete from forum where id_forum='$id_forum'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Topik Berhasil");
window.location.href="?page=forum&action=view";
</script>
<?php
}else{
	header("location: ../index.php");
}?>