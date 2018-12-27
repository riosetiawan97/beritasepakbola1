<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Tambah Jadwal</legend>
<form method = "POST" action="">
<table border="0px" style="border-colapse:collapse;">
			<tr align="left">
				<td>Jam</td>	
				<td> : </td>	
				<td>
					<input type="time" name="jam" required />
				</td>			
			</tr>
			<tr align="left">
				<td>Tanggal</td>	
				<td> : </td>	
				<td>
					<input type="date" name="tanggal" required />
				</td>			
			</tr>
			<tr align="left">
				<td>Team 1</td>	
				<td> : </td>	
				<td>
					<select name="team1" required >
						<?php						
						$query_pertandingan = mysqli_query($koneksi, "select * from klasemen,team where 
										klasemen.id_team = team.id_team
										and klasemen.id_kompetisi=$id_kompetisi") or die (mysqli_error());
						while ($data_team = mysqli_fetch_array($query_pertandingan)) {
						?>
							<option value="<?php echo $data_team["id_team"];?>"><?php echo $data_team["nama_team"] ?></option>
						<?php
							}
						?>
					</select>
				</td>			
			</tr>
			<tr align="left">
				<td>Team 2</td>	
				<td> : </td>	
				<td>
					<select name="team2" required >
						<?php						
						$query_pertandingan = mysqli_query($koneksi, "select * from klasemen,team where 
										klasemen.id_team = team.id_team
										and klasemen.id_kompetisi=$id_kompetisi") or die (mysqli_error());
						while ($data_team = mysqli_fetch_array($query_pertandingan)) {
						?>
							<option value="<?php echo $data_team["id_team"]; ?>"><?php echo $data_team["nama_team"] ?></option>
						<?php
							}
						?>
					</select>
				</td>			
			</tr>
			<tr>			
			<td><input type="submit" value="submit" name="simpan"/></td>
			</tr>
	</table>	
</form>
	<?php
$simpan = @$_POST['simpan'];
if($simpan){
	$input_time=$_POST['jam'];
	$time=date("H:i",strtotime($input_time));
	$input_date=$_POST['tanggal'];
	$date=date("Y-m-d",strtotime($input_date));
	$hari = $seminggu[date("w",strtotime($input_date))];
	$team1 = $_POST['team1'];
	$team2 = $_POST['team2'];
	if($team1 == $team2){
		?><script type="text/javascript">alert('Team Yang dimasukkan tidak boleh sama');</script><?php
	}else{
		mysqli_query($koneksi, "INSERT INTO pertandingan VALUES('','$id_kompetisi','$team1','$team2',NULL,NULL,'$hari','$date','$time','Belum Selesai')");
		?><script type="text/javascript"> alert ('Data Berhasil Ditambah');
		window.location.href="?page=kategori_kompetisi&id_kompetisi=<?php echo $id_kompetisi;?>&action=kompetisi";</script>
		<?php
	}
}
?>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>