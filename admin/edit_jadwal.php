<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Edit Jadwal</legend>
<form method = "POST" action="">
<table border="0px" style="border-colapse:collapse;">
		<?php
		$data_pertandingan = mysqli_fetch_array(mysqli_query($koneksi, "select * from pertandingan, kompetisi where 
							pertandingan.id_kompetisi = kompetisi.id_kompetisi and
							pertandingan.id_pertandingan = '$id_pertandingan'"))
			?>		
			<tr align="left">
				<td>Jam</td>
				<td>
				 : 
					<input type="time" name="jam" value="<?php echo $data_pertandingan['jam']; ?>" />
				</td>			
			</tr>
			<tr align="left">
				<td>Tanggal</td>	
				<td>
				 : 
					<input type="date" name="tanggal" value="<?php echo $data_pertandingan['tanggal']; ?>" required />
				</td>			
			</tr>
			<tr align="left">
				<td>Team 1</td>
				<td>Skor 1</td>				
				<td>Skor 2</td>			
				<td>Team 2</td>			
			</tr>
			<tr align="left">
				<td>
					<select name="team1">
						<?php						
						$sql_pertandingan = mysqli_query($koneksi, "select * from klasemen,team where 
										klasemen.id_team = team.id_team
										and klasemen.id_kompetisi=$data_pertandingan[id_kompetisi]") or die (mysqli_error());
						while ($team = mysqli_fetch_array($sql_pertandingan)) {
						?>
							<option value="<?php echo $team["id_team"];?>" 
								<?php if($team['id_team']== $data_pertandingan['id_team1']){echo "selected";}?>>
								<?php echo $team["nama_team"] ?>
							</option>
						<?php
							}
						?>
					</select>
				</td>	
				<td><input type="text" name="skor1" value="<?php echo $data_pertandingan['score1'];?>" onkeypress="return hanyaAngka(event)"/></td>
				<td><input type="text" name="skor2" value="<?php echo $data_pertandingan['score2'];?>" onkeypress="return hanyaAngka(event)"/></td>
				<td>
					<select name="team2">
						<?php						
						$sql_pertandingan = mysqli_query($koneksi, "select * from klasemen,team where 
										klasemen.id_team = team.id_team
										and klasemen.id_kompetisi=$data_pertandingan[id_kompetisi]") or die (mysqli_error());
						while ($team = mysqli_fetch_array($sql_pertandingan)) {
						?>
							<option value="<?php echo $team["id_team"];?>" 
								<?php if($team['id_team']== $data_pertandingan['id_team2']){echo "selected";}?>>
								<?php echo $team["nama_team"] ?>
							</option>
						<?php
							}
						?>
					</select>
				</td>			
			</tr>
			<tr>			
			<td><input type="submit" value="submit" name="simpan"/><input type="reset" value="Reset"/></td>
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
	$skor1 = $_POST['skor1'];
	$skor2 = $_POST['skor2'];
	$team2 = $_POST['team2'];
	if($team1 == $team2){
		?><script type="text/javascript">alert('Team Yang dimasukkan tidak boleh sama');</script><?php
	}else{
		if($skor1 == NULL || $skor2 == NULL){
			mysqli_query($koneksi, "update pertandingan set 
									id_team1 = '$team1', 
									id_team2 = '$team2', 
									score1 = NULL, 
									score2 = NULL ,
									hari='$hari', 
									tanggal='$date', 
									jam='$time'									
									where id_pertandingan='$id_pertandingan'") or die (mysqli_error());
			?><script type="text/javascript"> alert ('Pertandingan berhasil Diedit');
			window.location.href="?page=kategori_kompetisi&action=kompetisi&id_kompetisi=<?php echo $data_pertandingan['id_kompetisi'];?>"; </script>
			<?php
		}else{
			if($skor1 > $skor2){
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										menang=menang + '1',
										memasukkan=memasukkan + '$skor1',
										kemasukkan=kemasukkan + '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin + '3'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										kalah=kalah + '1',
										memasukkan=memasukkan + '$skor2',
										kemasukkan=kemasukkan + '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}elseif($skor1 < $skor2){
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										kalah=kalah + '1',
										memasukkan=memasukkan + '$skor1',
										kemasukkan=kemasukkan + '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										menang=menang + '1',
										memasukkan=memasukkan + '$skor2',
										kemasukkan=kemasukkan + '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin + '3'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}else{
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										seri=seri + '1',
										memasukkan=memasukkan + '$skor1',
										kemasukkan=kemasukkan + '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin + '1'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main + '1', 
										seri=seri + '1',
										memasukkan=memasukkan + '$skor2',
										kemasukkan=kemasukkan + '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin + '1'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}

			mysqli_query($koneksi, "update pertandingan set 
									id_team1 = '$team1', 
									id_team2 = '$team2', 
									score1='$skor1', 
									score2='$skor2', 
									hari='$hari', 
									tanggal='$date', 
									jam='$time',
									status = 'Selesai'
									where id_pertandingan='$id_pertandingan'") or die (mysqli_error());			
			?><script type="text/javascript"> alert ('Pertandingan berhasil Diedit');
			window.location.href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_pertandingan['id_kompetisi'];?>&action=kompetisi";</script>
			<?php
		}
	}
}
?>
</fieldset>
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57)){
			return false;   
		   }		    
		  return true;
		}
	</script>
	<?php
}else{
	header("location: ../index.php");
}?>