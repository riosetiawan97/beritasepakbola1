<?php
if(@$_SESSION['admin']){
$data_pertandingan  = mysqli_fetch_array(mysqli_query($koneksi, "select * from pertandingan, kompetisi where 
							pertandingan.id_kompetisi = kompetisi.id_kompetisi and
							pertandingan.id_pertandingan = '$id_pertandingan'"));
mysqli_query($koneksi, "delete from pertandingan where id_pertandingan='$id_pertandingan'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus pertandingan Berhasil");
window.location.href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_pertandingan['id_kompetisi'];?>&action=kompetisi";
</script>
<?php
}else{
	header("location: ../index.php");
}?>