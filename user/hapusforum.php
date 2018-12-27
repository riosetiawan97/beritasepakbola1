<?php
if(@$_SESSION['admin']){	
$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$id_forum"));
if($dataforum['id_balasan']==NULL){
	?>
	<script type="text/javascript">
	alert("Hapus Forum Berhasil");
	window.location.href="?page=forum";
	</script>
	<?php
}else{
	$datatopik= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$dataforum[id_balasan]"));
	if($datatopik['id_balasan']==NULL){
		?>
		<script type="text/javascript">
		alert("Hapus Forum Berhasil");
		window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_forum'];?>";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
		alert("Hapus Forum Berhasil");
		window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_balasan'];?>";
		</script>
		<?php
	}
}
	mysqli_query($koneksi, "delete from forum where id_forum='$id_forum'") or die (mysqli_error());
}else{
	header("location: ../index.php");
}?>