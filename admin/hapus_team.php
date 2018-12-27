<?php
if(@$_SESSION['admin']){
$data_team  = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi,team where kategori_kompetisi.id_kategori_kompetisi=team.id_kategori_kompetisi and team.id_team=$id_team"));
mysqli_query($koneksi, "delete from team where id_team='$id_team'") or die (mysqli_error());
?>
<script type="text/javascript">
alert("Hapus Team Berhasil");
window.location.href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $data_team['id_kategori_kompetisi'];?>&action=view";
</script>
<?php
}else{
	header("location: ../index.php");
}?>