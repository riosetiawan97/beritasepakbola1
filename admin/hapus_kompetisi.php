<?php
if(@$_SESSION['admin']){
$data_kompetisi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi,kompetisi where 
								kategori_kompetisi.id_kategori_kompetisi = kompetisi.id_kategori_kompetisi
								and kompetisi.id_kompetisi=$id_kompetisi"));
mysqli_query($koneksi, "delete from kompetisi where id_kompetisi='$id_kompetisi'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Kompetisi Berhasil");
window.location.href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $data_kompetisi['id_kategori_kompetisi'];?>&action=view";
</script>
<?php
}else{
	header("location: ../index.php");
}?>