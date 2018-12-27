<?php
if(@$_SESSION['admin']){
		$data_pertandingan = mysqli_fetch_array(mysqli_query($koneksi, "select * from pertandingan, kompetisi where 
							pertandingan.id_kompetisi = kompetisi.id_kompetisi and
							pertandingan.id_pertandingan = '$id_pertandingan'"));
	$team1 = $data_pertandingan['id_team1'];
	$skor1 = $data_pertandingan['score1'];
	$skor2 = $data_pertandingan['score2'];
	$team2 = $data_pertandingan['id_team2'];
			if($skor1 > $skor2){
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										menang=menang - '1',
										memasukkan=memasukkan - '$skor1',
										kemasukkan=kemasukkan - '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin - '3'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										kalah=kalah - '1',
										memasukkan=memasukkan - '$skor2',
										kemasukkan=kemasukkan - '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}elseif($skor1 < $skor2){
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										kalah=kalah - '1',
										memasukkan=memasukkan - '$skor1',
										kemasukkan=kemasukkan - '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										menang=menang - '1',
										memasukkan=memasukkan - '$skor2',
										kemasukkan=kemasukkan - '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin - '3'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}else{
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										seri=seri - '1',
										memasukkan=memasukkan - '$skor1',
										kemasukkan=kemasukkan - '$skor2',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin - '1'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team1'");
				mysqli_query($koneksi, "update klasemen set 
										main=main - '1', 
										seri=seri - '1',
										memasukkan=memasukkan - '$skor2',
										kemasukkan=kemasukkan - '$skor1',
										selisih_gol=memasukkan - kemasukkan,
										poin=poin - '1'
										where id_kompetisi = $data_pertandingan[id_kompetisi] and id_team = '$team2'");
			}
			
			mysqli_query($koneksi, "update pertandingan set 
									score1 = NULL, 
									score2 = NULL,
									status = 'Belum Selesai' where id_pertandingan='$id_pertandingan'") or die (mysqli_error());

			?><script type="text/javascript"> alert ('Pertandingan berhasil Direset');
			window.location.href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_pertandingan['id_kompetisi'];?>&action=kompetisi";</script>
<?php
}else{
	header("location: ../index.php");
}?>			