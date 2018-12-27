<?php
if(@$_SESSION['admin']){
?>
<div id="menu">
<?php
$query_kategori_kompetisi = mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi") or die (mysqli_error());
while ($data_kategori_kompetisi  = mysqli_fetch_array($query_kategori_kompetisi)) {
	?>
<div class="utama">
	<a href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $data_kategori_kompetisi['id_kategori_kompetisi']; ?>&action=view"><?php echo $data_kategori_kompetisi['nama_kategori_kompetisi']; ?></a>
</div>	
<?php
}
?>
</div>
			<br>
	<a href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $id_kategori_kompetisi; ?>&action=tambahkompetisi"><button class="btn success">Tambah kompetisi</button></a>
	<table width="100%" border="0px" style="border-colapse:collapse;">
		<tr style="background-color:#00a8f6";>
			<th>Nama Kompetisi</th>
			<th>Negara</th>		
			<th>Musim</th>		
			<th>Opsi</th>		
		</tr>
		<?php
		$query_kompetisi = mysqli_query($koneksi, "select * from kompetisi,kategori_kompetisi where kompetisi.id_kategori_kompetisi=kategori_kompetisi.id_kategori_kompetisi and kategori_kompetisi.id_kategori_kompetisi=$id_kategori_kompetisi") or die (mysqli_error());
		$cek_kompetisi = mysqli_num_rows($query_kompetisi);
		if($cek_kompetisi < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data_kompetisi = mysqli_fetch_array($query_kompetisi)){
			?>		
			<tr align="left">
				<td><a><?php echo $data_kompetisi['nama_kategori_kompetisi']; ?></a></td>
				<td>
					<?php 
					if($data_kompetisi['kode_negara'] == "001") echo 'Afganistan'; 
					else if($data_kompetisi['kode_negara'] == "002") echo 'Afrika Selatan';		
					else if($data_kompetisi['kode_negara'] == "003") echo 'Afrika Tengah';		
					else if($data_kompetisi['kode_negara'] == "004") echo 'Albania';	
					else if($data_kompetisi['kode_negara'] == "005") echo 'Aljazair';	
					else if($data_kompetisi['kode_negara'] == "006") echo 'Amerika Serikat';	
					else if($data_kompetisi['kode_negara'] == "007") echo 'Andorra';	
					else if($data_kompetisi['kode_negara'] == "008") echo 'Angola';		
					else if($data_kompetisi['kode_negara'] == "009") echo 'Anguilla';	
					else if($data_kompetisi['kode_negara'] == "010") echo 'Antigua dan Barbuda';	
					else if($data_kompetisi['kode_negara'] == "011") echo 'Antillen Belanda';	
					else if($data_kompetisi['kode_negara'] == "012") echo 'Arab Saudi';		
					else if($data_kompetisi['kode_negara'] == "013") echo 'Argentina';		
					else if($data_kompetisi['kode_negara'] == "014") echo 'Armenia';	
					else if($data_kompetisi['kode_negara'] == "015") echo 'Aruba';		
					else if($data_kompetisi['kode_negara'] == "016") echo 'Australia';		
					else if($data_kompetisi['kode_negara'] == "017") echo 'Austria';	
					else if($data_kompetisi['kode_negara'] == "018") echo 'Azerbaijan';		
					else if($data_kompetisi['kode_negara'] == "019") echo 'Bahama';		
					else if($data_kompetisi['kode_negara'] == "020") echo 'Bahrain';	
					else if($data_kompetisi['kode_negara'] == "021") echo 'Bangladesh';		
					else if($data_kompetisi['kode_negara'] == "022") echo 'Barbados';	
					else if($data_kompetisi['kode_negara'] == "023") echo 'Belanda';	
					else if($data_kompetisi['kode_negara'] == "024") echo 'Belarus';	
					else if($data_kompetisi['kode_negara'] == "025") echo 'Belgia';		
					else if($data_kompetisi['kode_negara'] == "026") echo 'Belize';		
					else if($data_kompetisi['kode_negara'] == "027") echo 'Benin';		
					else if($data_kompetisi['kode_negara'] == "028") echo 'Bermuda';	
					else if($data_kompetisi['kode_negara'] == "029") echo 'Bhutan';		
					else if($data_kompetisi['kode_negara'] == "030") echo 'Bolivia';	
					else if($data_kompetisi['kode_negara'] == "031") echo 'Bosnia dan Herzegovina';		
					else if($data_kompetisi['kode_negara'] == "032") echo 'Botswana';	
					else if($data_kompetisi['kode_negara'] == "033") echo 'Brasil';		
					else if($data_kompetisi['kode_negara'] == "034") echo 'Britania Raya';		
					else if($data_kompetisi['kode_negara'] == "035") echo 'Brunei';		
					else if($data_kompetisi['kode_negara'] == "036") echo 'Bulgaria';	
					else if($data_kompetisi['kode_negara'] == "037") echo 'Burkina Faso';	
					else if($data_kompetisi['kode_negara'] == "038") echo 'Burundi';	
					else if($data_kompetisi['kode_negara'] == "039") echo 'Kepulauan Cayman';	
					else if($data_kompetisi['kode_negara'] == "040") echo 'Chad';	
					else if($data_kompetisi['kode_negara'] == "041") echo 'Chili';		
					else if($data_kompetisi['kode_negara'] == "042") echo 'Republik Rakyat Tiongkok';	
					else if($data_kompetisi['kode_negara'] == "043") echo 'Cina Taipei';	
					else if($data_kompetisi['kode_negara'] == "044") echo 'Kepulauan Cook';		
					else if($data_kompetisi['kode_negara'] == "045") echo 'Ceko';	
					else if($data_kompetisi['kode_negara'] == "046") echo 'Denmark';	
					else if($data_kompetisi['kode_negara'] == "047") echo 'Djibouti';	
					else if($data_kompetisi['kode_negara'] == "048") echo 'Dominika';	
					else if($data_kompetisi['kode_negara'] == "049") echo 'Republik Dominika';		
					else if($data_kompetisi['kode_negara'] == "050") echo 'Ekuador';	
					else if($data_kompetisi['kode_negara'] == "051") echo 'El Salvador';	
					else if($data_kompetisi['kode_negara'] == "052") echo 'Eritrea';	
					else if($data_kompetisi['kode_negara'] == "053") echo 'Estonia';	
					else if($data_kompetisi['kode_negara'] == "054") echo 'Ethiopia';	
					else if($data_kompetisi['kode_negara'] == "055") echo 'Kepulauan Faroe';	
					else if($data_kompetisi['kode_negara'] == "056") echo 'Fiji';	
					else if($data_kompetisi['kode_negara'] == "057") echo 'Filipina';	
					else if($data_kompetisi['kode_negara'] == "058") echo 'Finlandia';		
					else if($data_kompetisi['kode_negara'] == "059") echo 'Gabon';		
					else if($data_kompetisi['kode_negara'] == "060") echo 'Gambia';		
					else if($data_kompetisi['kode_negara'] == "061") echo 'Georgia';	
					else if($data_kompetisi['kode_negara'] == "062") echo 'Ghana';		
					else if($data_kompetisi['kode_negara'] == "063") echo 'Gibraltar';		
					else if($data_kompetisi['kode_negara'] == "064") echo 'Grenada';	
					else if($data_kompetisi['kode_negara'] == "065") echo 'Guam';	
					else if($data_kompetisi['kode_negara'] == "066") echo 'Guatemala';		
					else if($data_kompetisi['kode_negara'] == "067") echo 'Guinea';		
					else if($data_kompetisi['kode_negara'] == "068") echo 'Guinea Khatulistiwa';	
					else if($data_kompetisi['kode_negara'] == "069") echo 'Guinea-Bissau';		
					else if($data_kompetisi['kode_negara'] == "070") echo 'Guyana';		
					else if($data_kompetisi['kode_negara'] == "071") echo 'Haiti';		
					else if($data_kompetisi['kode_negara'] == "072") echo 'Honduras';	
					else if($data_kompetisi['kode_negara'] == "073") echo 'Hong Kong';		
					else if($data_kompetisi['kode_negara'] == "074") echo 'Hongaria';	
					else if($data_kompetisi['kode_negara'] == "075") echo 'India';		
					else if($data_kompetisi['kode_negara'] == "076") echo 'Indonesia';		
					else if($data_kompetisi['kode_negara'] == "077") echo 'Inggris';	
					else if($data_kompetisi['kode_negara'] == "078") echo 'Irak';	
					else if($data_kompetisi['kode_negara'] == "079") echo 'Iran';	
					else if($data_kompetisi['kode_negara'] == "080") echo 'Republik Irlandia';		
					else if($data_kompetisi['kode_negara'] == "081") echo 'Irlandia Utara';		
					else if($data_kompetisi['kode_negara'] == "082") echo 'Islandia';	
					else if($data_kompetisi['kode_negara'] == "083") echo 'Israel';		
					else if($data_kompetisi['kode_negara'] == "084") echo 'Italia';		
					else if($data_kompetisi['kode_negara'] == "085") echo 'Jamaika';	
					else if($data_kompetisi['kode_negara'] == "086") echo 'Jepang';		
					else if($data_kompetisi['kode_negara'] == "087") echo 'Jerman';		
					else if($data_kompetisi['kode_negara'] == "088") echo 'Kaledonia Baru';		
					else if($data_kompetisi['kode_negara'] == "089") echo 'Kamboja';	
					else if($data_kompetisi['kode_negara'] == "090") echo 'Kamerun';	
					else if($data_kompetisi['kode_negara'] == "091") echo 'Kanada';		
					else if($data_kompetisi['kode_negara'] == "092") echo 'Kazakhstan';		
					else if($data_kompetisi['kode_negara'] == "093") echo 'Kenya';		
					else if($data_kompetisi['kode_negara'] == "094") echo 'Kirgizstan';		
					else if($data_kompetisi['kode_negara'] == "095") echo 'Korea Selatan';		
					else if($data_kompetisi['kode_negara'] == "096") echo 'Korea Utara';	
					else if($data_kompetisi['kode_negara'] == "097") echo 'Kuwait';		
					else if($data_kompetisi['kode_negara'] == "098") echo 'Kolombia';	
					else if($data_kompetisi['kode_negara'] == "099") echo 'Komoro';		
					else if($data_kompetisi['kode_negara'] == "100") echo 'Republik Kongo';		
					else if($data_kompetisi['kode_negara'] == "101") echo 'Republik Demokratik Kongo';		
					else if($data_kompetisi['kode_negara'] == "102") echo 'Kosovo';		
					else if($data_kompetisi['kode_negara'] == "103") echo 'Kosta Rika';		
					else if($data_kompetisi['kode_negara'] == "104") echo 'Kroasia';	
					else if($data_kompetisi['kode_negara'] == "105") echo 'Kuba';	
					else if($data_kompetisi['kode_negara'] == "106") echo 'Laos';	
					else if($data_kompetisi['kode_negara'] == "107") echo 'Latvia';		
					else if($data_kompetisi['kode_negara'] == "108") echo 'Lebanon';	
					else if($data_kompetisi['kode_negara'] == "109") echo 'Lesotho';	
					else if($data_kompetisi['kode_negara'] == "110") echo 'Liberia';	
					else if($data_kompetisi['kode_negara'] == "111") echo 'Libya';		
					else if($data_kompetisi['kode_negara'] == "112") echo 'Liechtenstein';		
					else if($data_kompetisi['kode_negara'] == "113") echo 'Lituania';	
					else if($data_kompetisi['kode_negara'] == "114") echo 'Luksemburg';		
					else if($data_kompetisi['kode_negara'] == "115") echo 'Madagaskar';		
					else if($data_kompetisi['kode_negara'] == "116") echo 'Makau';		
					else if($data_kompetisi['kode_negara'] == "117") echo 'Makedonia';		
					else if($data_kompetisi['kode_negara'] == "119") echo 'Maladewa';	
					else if($data_kompetisi['kode_negara'] == "120") echo 'Malawi';		
					else if($data_kompetisi['kode_negara'] == "121") echo 'Malaysia';	
					else if($data_kompetisi['kode_negara'] == "122") echo 'Mali';	
					else if($data_kompetisi['kode_negara'] == "123") echo 'Malta';		
					else if($data_kompetisi['kode_negara'] == "124") echo 'Maroko';		
					else if($data_kompetisi['kode_negara'] == "125") echo 'Mauritania';		
					else if($data_kompetisi['kode_negara'] == "126") echo 'Mauritius';		
					else if($data_kompetisi['kode_negara'] == "127") echo 'Meksiko';	
					else if($data_kompetisi['kode_negara'] == "128") echo 'Mesir';		
					else if($data_kompetisi['kode_negara'] == "129") echo 'Moldova';	
					else if($data_kompetisi['kode_negara'] == "130") echo 'Mongolia';	
					else if($data_kompetisi['kode_negara'] == "131") echo 'Montenegro';		
					else if($data_kompetisi['kode_negara'] == "132") echo 'Montserrat';		
					else if($data_kompetisi['kode_negara'] == "133") echo 'Mozambik';	
					else if($data_kompetisi['kode_negara'] == "134") echo 'Myanmar';	
					else if($data_kompetisi['kode_negara'] == "135") echo 'Namibia';	
					else if($data_kompetisi['kode_negara'] == "136") echo 'Nepal';		
					else if($data_kompetisi['kode_negara'] == "137") echo 'Nikaragua';		
					else if($data_kompetisi['kode_negara'] == "138") echo 'Niger';		
					else if($data_kompetisi['kode_negara'] == "139") echo 'Nigeria';	
					else if($data_kompetisi['kode_negara'] == "140") echo 'Norwegia';	
					else if($data_kompetisi['kode_negara'] == "141") echo 'Oman';	
					else if($data_kompetisi['kode_negara'] == "142") echo 'Pakistan';	
					else if($data_kompetisi['kode_negara'] == "143") echo 'Palestina';		
					else if($data_kompetisi['kode_negara'] == "144") echo 'Panama';		
					else if($data_kompetisi['kode_negara'] == "145") echo 'Pantai Gading';		
					else if($data_kompetisi['kode_negara'] == "146") echo 'Papua Nugini';	
					else if($data_kompetisi['kode_negara'] == "147") echo 'Paraguay';	
					else if($data_kompetisi['kode_negara'] == "148") echo 'Perancis';	
					else if($data_kompetisi['kode_negara'] == "149") echo 'Peru';	
					else if($data_kompetisi['kode_negara'] == "150") echo 'Polandia';	
					else if($data_kompetisi['kode_negara'] == "151") echo 'Portugal';	
					else if($data_kompetisi['kode_negara'] == "152") echo 'Puerto Riko';	
					else if($data_kompetisi['kode_negara'] == "153") echo 'Qatar';		
					else if($data_kompetisi['kode_negara'] == "154") echo 'Rumania';	
					else if($data_kompetisi['kode_negara'] == "155") echo 'Rusia';		
					else if($data_kompetisi['kode_negara'] == "156") echo 'Rwanda';		
					else if($data_kompetisi['kode_negara'] == "157") echo 'Saint Kitts dan Nevis';		
					else if($data_kompetisi['kode_negara'] == "158") echo 'Saint Lucia';	
					else if($data_kompetisi['kode_negara'] == "159") echo 'Saint Vincent dan Grenadine';	
					else if($data_kompetisi['kode_negara'] == "160") echo 'Samoa';		
					else if($data_kompetisi['kode_negara'] == "161") echo 'Samoa Amerika';		
					else if($data_kompetisi['kode_negara'] == "162") echo 'San Marino';		
					else if($data_kompetisi['kode_negara'] == "163") echo 'São Tomé dan Príncipe';		
					else if($data_kompetisi['kode_negara'] == "164") echo 'Selandia Baru';		
					else if($data_kompetisi['kode_negara'] == "165") echo 'Senegal';	
					else if($data_kompetisi['kode_negara'] == "166") echo 'Serbia';		
					else if($data_kompetisi['kode_negara'] == "167") echo 'Seychelles';		
					else if($data_kompetisi['kode_negara'] == "168") echo 'Sierra Leone';	
					else if($data_kompetisi['kode_negara'] == "169") echo 'Singapura';		
					else if($data_kompetisi['kode_negara'] == "170") echo 'Siprus';		
					else if($data_kompetisi['kode_negara'] == "171") echo 'Skotlandia';		
					else if($data_kompetisi['kode_negara'] == "172") echo 'Slovenia';	
					else if($data_kompetisi['kode_negara'] == "173") echo 'Slowakia';	
					else if($data_kompetisi['kode_negara'] == "174") echo 'Kepulauan Solomon';		
					else if($data_kompetisi['kode_negara'] == "175") echo 'Somalia';	
					else if($data_kompetisi['kode_negara'] == "176") echo 'Spanyol';	
					else if($data_kompetisi['kode_negara'] == "177") echo 'Sri Lanka';		
					else if($data_kompetisi['kode_negara'] == "178") echo 'Sudan';		
					else if($data_kompetisi['kode_negara'] == "179") echo 'Sudan Selatan';	
					else if($data_kompetisi['kode_negara'] == "180") echo 'Suriah';		
					else if($data_kompetisi['kode_negara'] == "181") echo 'Suriname';	
					else if($data_kompetisi['kode_negara'] == "182") echo 'Swaziland';		
					else if($data_kompetisi['kode_negara'] == "183") echo 'Swedia';		
					else if($data_kompetisi['kode_negara'] == "184") echo 'Swiss';		
					else if($data_kompetisi['kode_negara'] == "185") echo 'Tahiti';		
					else if($data_kompetisi['kode_negara'] == "186") echo 'Tajikistan';		
					else if($data_kompetisi['kode_negara'] == "187") echo 'Tanjung Verde';		
					else if($data_kompetisi['kode_negara'] == "188") echo 'Tanzania';	
					else if($data_kompetisi['kode_negara'] == "189") echo 'Thailand';	
					else if($data_kompetisi['kode_negara'] == "190") echo 'Timor Leste';	
					else if($data_kompetisi['kode_negara'] == "191") echo 'Togo';	
					else if($data_kompetisi['kode_negara'] == "192") echo 'Tonga';		
					else if($data_kompetisi['kode_negara'] == "193") echo 'Trinidad dan Tobago';	
					else if($data_kompetisi['kode_negara'] == "194") echo 'Tunisia';	
					else if($data_kompetisi['kode_negara'] == "195") echo 'Turki';		
					else if($data_kompetisi['kode_negara'] == "196") echo 'Turkmenistan';	
					else if($data_kompetisi['kode_negara'] == "197") echo 'Kepulauan Turks dan Caicos';		
					else if($data_kompetisi['kode_negara'] == "198") echo 'Uganda';		
					else if($data_kompetisi['kode_negara'] == "199") echo 'Ukraina';	
					else if($data_kompetisi['kode_negara'] == "200") echo 'Uni Emirat Arab';	
					else if($data_kompetisi['kode_negara'] == "201") echo 'Uruguay';	
					else if($data_kompetisi['kode_negara'] == "202") echo 'Uzbekistan';		
					else if($data_kompetisi['kode_negara'] == "203") echo 'Vanuatu';	
					else if($data_kompetisi['kode_negara'] == "204") echo 'Venezuela';		
					else if($data_kompetisi['kode_negara'] == "205") echo 'Vietnam';	
					else if($data_kompetisi['kode_negara'] == "206") echo 'Kepulauan Virgin AS';	
					else if($data_kompetisi['kode_negara'] == "207") echo 'Kepulauan Virgin Britania Raya'; 		
					else if($data_kompetisi['kode_negara'] == "208") echo 'Wales';
					else if($data_kompetisi['kode_negara'] == "209") echo 'Yaman';
					else if($data_kompetisi['kode_negara'] == "210") echo 'Yordania';
					else if($data_kompetisi['kode_negara'] == "211") echo 'Yunani';
					else if($data_kompetisi['kode_negara'] == "212") echo 'Zambia';
					else if($data_kompetisi['kode_negara'] == "213") echo 'Zimbabwe';
					?>
				
				</td>
				<td><?php echo $data_kompetisi['musim']; ?></td>
				<td>				
				<a href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_kompetisi['id_kompetisi'];?>&action=kompetisi"><button class="btn success">Detail Kompetisi</button></a>
				<a href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_kompetisi['id_kompetisi'];?>&action=editkompetisi"><button class="btn info">Edit</button></a>
				<a onclick="return confirm('yakin Ingin Menghapus data ?')" href="?page=kategori_kompetisi&id_kompetisi=<?php echo $data_kompetisi['id_kompetisi'];?>&action=hapuskompetisi"><button class="btn danger">Hapus</button></a>
				</td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
			<br>
	<a href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $id_kategori_kompetisi; ?>&action=tambahteam"><button class="btn success">Tambah Team</button></a>
	<table width="100%" border="0px" style="border-colapse:collapse;" >
		<tr style="background-color:#00a8f6";>
			<th>Nama Team</th>
			<th>Kompetisi</th>
			<th>Negara</th>			
			<th>Opsi</th>	
		</tr>
		<?php
		$query_team = mysqli_query($koneksi, "select * from team,kategori_kompetisi where team.id_kategori_kompetisi=kategori_kompetisi.id_kategori_kompetisi and kategori_kompetisi.id_kategori_kompetisi=$id_kategori_kompetisi ORDER BY nama_team ASC") or die (mysqli_error());
		$cek_team = mysqli_num_rows($query_team);
		if($cek_team < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data_team = mysqli_fetch_array($query_team)){
			?>		
			<tr align="center">
				<td align="left"><?php echo $data_team['nama_team']; ?></td>
				<td><?php echo $data_team['nama_kategori_kompetisi']; ?></td>
				<td>
					<?php
					if($data_team['kode_negara_team'] == "001") echo 'Afganistan'; 
					else if($data_team['kode_negara_team'] == "002") echo 'Afrika Selatan';		
					else if($data_team['kode_negara_team'] == "003") echo 'Afrika Tengah';		
					else if($data_team['kode_negara_team'] == "004") echo 'Albania';	
					else if($data_team['kode_negara_team'] == "005") echo 'Aljazair';	
					else if($data_team['kode_negara_team'] == "006") echo 'Amerika Serikat';	
					else if($data_team['kode_negara_team'] == "007") echo 'Andorra';	
					else if($data_team['kode_negara_team'] == "008") echo 'Angola';		
					else if($data_team['kode_negara_team'] == "009") echo 'Anguilla';	
					else if($data_team['kode_negara_team'] == "010") echo 'Antigua dan Barbuda';	
					else if($data_team['kode_negara_team'] == "011") echo 'Antillen Belanda';	
					else if($data_team['kode_negara_team'] == "012") echo 'Arab Saudi';		
					else if($data_team['kode_negara_team'] == "013") echo 'Argentina';		
					else if($data_team['kode_negara_team'] == "014") echo 'Armenia';	
					else if($data_team['kode_negara_team'] == "015") echo 'Aruba';		
					else if($data_team['kode_negara_team'] == "016") echo 'Australia';		
					else if($data_team['kode_negara_team'] == "017") echo 'Austria';	
					else if($data_team['kode_negara_team'] == "018") echo 'Azerbaijan';		
					else if($data_team['kode_negara_team'] == "019") echo 'Bahama';		
					else if($data_team['kode_negara_team'] == "020") echo 'Bahrain';	
					else if($data_team['kode_negara_team'] == "021") echo 'Bangladesh';		
					else if($data_team['kode_negara_team'] == "022") echo 'Barbados';	
					else if($data_team['kode_negara_team'] == "023") echo 'Belanda';	
					else if($data_team['kode_negara_team'] == "024") echo 'Belarus';	
					else if($data_team['kode_negara_team'] == "025") echo 'Belgia';		
					else if($data_team['kode_negara_team'] == "026") echo 'Belize';		
					else if($data_team['kode_negara_team'] == "027") echo 'Benin';		
					else if($data_team['kode_negara_team'] == "028") echo 'Bermuda';	
					else if($data_team['kode_negara_team'] == "029") echo 'Bhutan';		
					else if($data_team['kode_negara_team'] == "030") echo 'Bolivia';	
					else if($data_team['kode_negara_team'] == "031") echo 'Bosnia dan Herzegovina';		
					else if($data_team['kode_negara_team'] == "032") echo 'Botswana';	
					else if($data_team['kode_negara_team'] == "033") echo 'Brasil';		
					else if($data_team['kode_negara_team'] == "034") echo 'Britania Raya';		
					else if($data_team['kode_negara_team'] == "035") echo 'Brunei';		
					else if($data_team['kode_negara_team'] == "036") echo 'Bulgaria';	
					else if($data_team['kode_negara_team'] == "037") echo 'Burkina Faso';	
					else if($data_team['kode_negara_team'] == "038") echo 'Burundi';	
					else if($data_team['kode_negara_team'] == "039") echo 'Kepulauan Cayman';	
					else if($data_team['kode_negara_team'] == "040") echo 'Chad';	
					else if($data_team['kode_negara_team'] == "041") echo 'Chili';		
					else if($data_team['kode_negara_team'] == "042") echo 'Republik Rakyat Tiongkok';	
					else if($data_team['kode_negara_team'] == "043") echo 'Cina Taipei';	
					else if($data_team['kode_negara_team'] == "044") echo 'Kepulauan Cook';		
					else if($data_team['kode_negara_team'] == "045") echo 'Ceko';	
					else if($data_team['kode_negara_team'] == "046") echo 'Denmark';	
					else if($data_team['kode_negara_team'] == "047") echo 'Djibouti';	
					else if($data_team['kode_negara_team'] == "048") echo 'Dominika';	
					else if($data_team['kode_negara_team'] == "049") echo 'Republik Dominika';		
					else if($data_team['kode_negara_team'] == "050") echo 'Ekuador';	
					else if($data_team['kode_negara_team'] == "051") echo 'El Salvador';	
					else if($data_team['kode_negara_team'] == "052") echo 'Eritrea';	
					else if($data_team['kode_negara_team'] == "053") echo 'Estonia';	
					else if($data_team['kode_negara_team'] == "054") echo 'Ethiopia';	
					else if($data_team['kode_negara_team'] == "055") echo 'Kepulauan Faroe';	
					else if($data_team['kode_negara_team'] == "056") echo 'Fiji';	
					else if($data_team['kode_negara_team'] == "057") echo 'Filipina';	
					else if($data_team['kode_negara_team'] == "058") echo 'Finlandia';		
					else if($data_team['kode_negara_team'] == "059") echo 'Gabon';		
					else if($data_team['kode_negara_team'] == "060") echo 'Gambia';		
					else if($data_team['kode_negara_team'] == "061") echo 'Georgia';	
					else if($data_team['kode_negara_team'] == "062") echo 'Ghana';		
					else if($data_team['kode_negara_team'] == "063") echo 'Gibraltar';		
					else if($data_team['kode_negara_team'] == "064") echo 'Grenada';	
					else if($data_team['kode_negara_team'] == "065") echo 'Guam';	
					else if($data_team['kode_negara_team'] == "066") echo 'Guatemala';		
					else if($data_team['kode_negara_team'] == "067") echo 'Guinea';		
					else if($data_team['kode_negara_team'] == "068") echo 'Guinea Khatulistiwa';	
					else if($data_team['kode_negara_team'] == "069") echo 'Guinea-Bissau';		
					else if($data_team['kode_negara_team'] == "070") echo 'Guyana';		
					else if($data_team['kode_negara_team'] == "071") echo 'Haiti';		
					else if($data_team['kode_negara_team'] == "072") echo 'Honduras';	
					else if($data_team['kode_negara_team'] == "073") echo 'Hong Kong';		
					else if($data_team['kode_negara_team'] == "074") echo 'Hongaria';	
					else if($data_team['kode_negara_team'] == "075") echo 'India';		
					else if($data_team['kode_negara_team'] == "076") echo 'Indonesia';		
					else if($data_team['kode_negara_team'] == "077") echo 'Inggris';	
					else if($data_team['kode_negara_team'] == "078") echo 'Irak';	
					else if($data_team['kode_negara_team'] == "079") echo 'Iran';	
					else if($data_team['kode_negara_team'] == "080") echo 'Republik Irlandia';		
					else if($data_team['kode_negara_team'] == "081") echo 'Irlandia Utara';		
					else if($data_team['kode_negara_team'] == "082") echo 'Islandia';	
					else if($data_team['kode_negara_team'] == "083") echo 'Israel';		
					else if($data_team['kode_negara_team'] == "084") echo 'Italia';		
					else if($data_team['kode_negara_team'] == "085") echo 'Jamaika';	
					else if($data_team['kode_negara_team'] == "086") echo 'Jepang';		
					else if($data_team['kode_negara_team'] == "087") echo 'Jerman';		
					else if($data_team['kode_negara_team'] == "088") echo 'Kaledonia Baru';		
					else if($data_team['kode_negara_team'] == "089") echo 'Kamboja';	
					else if($data_team['kode_negara_team'] == "090") echo 'Kamerun';	
					else if($data_team['kode_negara_team'] == "091") echo 'Kanada';		
					else if($data_team['kode_negara_team'] == "092") echo 'Kazakhstan';		
					else if($data_team['kode_negara_team'] == "093") echo 'Kenya';		
					else if($data_team['kode_negara_team'] == "094") echo 'Kirgizstan';		
					else if($data_team['kode_negara_team'] == "095") echo 'Korea Selatan';		
					else if($data_team['kode_negara_team'] == "096") echo 'Korea Utara';	
					else if($data_team['kode_negara_team'] == "097") echo 'Kuwait';		
					else if($data_team['kode_negara_team'] == "098") echo 'Kolombia';	
					else if($data_team['kode_negara_team'] == "099") echo 'Komoro';		
					else if($data_team['kode_negara_team'] == "100") echo 'Republik Kongo';		
					else if($data_team['kode_negara_team'] == "101") echo 'Republik Demokratik Kongo';		
					else if($data_team['kode_negara_team'] == "102") echo 'Kosovo';		
					else if($data_team['kode_negara_team'] == "103") echo 'Kosta Rika';		
					else if($data_team['kode_negara_team'] == "104") echo 'Kroasia';	
					else if($data_team['kode_negara_team'] == "105") echo 'Kuba';	
					else if($data_team['kode_negara_team'] == "106") echo 'Laos';	
					else if($data_team['kode_negara_team'] == "107") echo 'Latvia';		
					else if($data_team['kode_negara_team'] == "108") echo 'Lebanon';	
					else if($data_team['kode_negara_team'] == "109") echo 'Lesotho';	
					else if($data_team['kode_negara_team'] == "110") echo 'Liberia';	
					else if($data_team['kode_negara_team'] == "111") echo 'Libya';		
					else if($data_team['kode_negara_team'] == "112") echo 'Liechtenstein';		
					else if($data_team['kode_negara_team'] == "113") echo 'Lituania';	
					else if($data_team['kode_negara_team'] == "114") echo 'Luksemburg';		
					else if($data_team['kode_negara_team'] == "115") echo 'Madagaskar';		
					else if($data_team['kode_negara_team'] == "116") echo 'Makau';		
					else if($data_team['kode_negara_team'] == "117") echo 'Makedonia';		
					else if($data_team['kode_negara_team'] == "119") echo 'Maladewa';	
					else if($data_team['kode_negara_team'] == "120") echo 'Malawi';		
					else if($data_team['kode_negara_team'] == "121") echo 'Malaysia';	
					else if($data_team['kode_negara_team'] == "122") echo 'Mali';	
					else if($data_team['kode_negara_team'] == "123") echo 'Malta';		
					else if($data_team['kode_negara_team'] == "124") echo 'Maroko';		
					else if($data_team['kode_negara_team'] == "125") echo 'Mauritania';		
					else if($data_team['kode_negara_team'] == "126") echo 'Mauritius';		
					else if($data_team['kode_negara_team'] == "127") echo 'Meksiko';	
					else if($data_team['kode_negara_team'] == "128") echo 'Mesir';		
					else if($data_team['kode_negara_team'] == "129") echo 'Moldova';	
					else if($data_team['kode_negara_team'] == "130") echo 'Mongolia';	
					else if($data_team['kode_negara_team'] == "131") echo 'Montenegro';		
					else if($data_team['kode_negara_team'] == "132") echo 'Montserrat';		
					else if($data_team['kode_negara_team'] == "133") echo 'Mozambik';	
					else if($data_team['kode_negara_team'] == "134") echo 'Myanmar';	
					else if($data_team['kode_negara_team'] == "135") echo 'Namibia';	
					else if($data_team['kode_negara_team'] == "136") echo 'Nepal';		
					else if($data_team['kode_negara_team'] == "137") echo 'Nikaragua';		
					else if($data_team['kode_negara_team'] == "138") echo 'Niger';		
					else if($data_team['kode_negara_team'] == "139") echo 'Nigeria';	
					else if($data_team['kode_negara_team'] == "140") echo 'Norwegia';	
					else if($data_team['kode_negara_team'] == "141") echo 'Oman';	
					else if($data_team['kode_negara_team'] == "142") echo 'Pakistan';	
					else if($data_team['kode_negara_team'] == "143") echo 'Palestina';		
					else if($data_team['kode_negara_team'] == "144") echo 'Panama';		
					else if($data_team['kode_negara_team'] == "145") echo 'Pantai Gading';		
					else if($data_team['kode_negara_team'] == "146") echo 'Papua Nugini';	
					else if($data_team['kode_negara_team'] == "147") echo 'Paraguay';	
					else if($data_team['kode_negara_team'] == "148") echo 'Perancis';	
					else if($data_team['kode_negara_team'] == "149") echo 'Peru';	
					else if($data_team['kode_negara_team'] == "150") echo 'Polandia';	
					else if($data_team['kode_negara_team'] == "151") echo 'Portugal';	
					else if($data_team['kode_negara_team'] == "152") echo 'Puerto Riko';	
					else if($data_team['kode_negara_team'] == "153") echo 'Qatar';		
					else if($data_team['kode_negara_team'] == "154") echo 'Rumania';	
					else if($data_team['kode_negara_team'] == "155") echo 'Rusia';		
					else if($data_team['kode_negara_team'] == "156") echo 'Rwanda';		
					else if($data_team['kode_negara_team'] == "157") echo 'Saint Kitts dan Nevis';		
					else if($data_team['kode_negara_team'] == "158") echo 'Saint Lucia';	
					else if($data_team['kode_negara_team'] == "159") echo 'Saint Vincent dan Grenadine';	
					else if($data_team['kode_negara_team'] == "160") echo 'Samoa';		
					else if($data_team['kode_negara_team'] == "161") echo 'Samoa Amerika';		
					else if($data_team['kode_negara_team'] == "162") echo 'San Marino';		
					else if($data_team['kode_negara_team'] == "163") echo 'São Tomé dan Príncipe';		
					else if($data_team['kode_negara_team'] == "164") echo 'Selandia Baru';		
					else if($data_team['kode_negara_team'] == "165") echo 'Senegal';	
					else if($data_team['kode_negara_team'] == "166") echo 'Serbia';		
					else if($data_team['kode_negara_team'] == "167") echo 'Seychelles';		
					else if($data_team['kode_negara_team'] == "168") echo 'Sierra Leone';	
					else if($data_team['kode_negara_team'] == "169") echo 'Singapura';		
					else if($data_team['kode_negara_team'] == "170") echo 'Siprus';		
					else if($data_team['kode_negara_team'] == "171") echo 'Skotlandia';		
					else if($data_team['kode_negara_team'] == "172") echo 'Slovenia';	
					else if($data_team['kode_negara_team'] == "173") echo 'Slowakia';	
					else if($data_team['kode_negara_team'] == "174") echo 'Kepulauan Solomon';		
					else if($data_team['kode_negara_team'] == "175") echo 'Somalia';	
					else if($data_team['kode_negara_team'] == "176") echo 'Spanyol';	
					else if($data_team['kode_negara_team'] == "177") echo 'Sri Lanka';		
					else if($data_team['kode_negara_team'] == "178") echo 'Sudan';		
					else if($data_team['kode_negara_team'] == "179") echo 'Sudan Selatan';	
					else if($data_team['kode_negara_team'] == "180") echo 'Suriah';		
					else if($data_team['kode_negara_team'] == "181") echo 'Suriname';	
					else if($data_team['kode_negara_team'] == "182") echo 'Swaziland';		
					else if($data_team['kode_negara_team'] == "183") echo 'Swedia';		
					else if($data_team['kode_negara_team'] == "184") echo 'Swiss';		
					else if($data_team['kode_negara_team'] == "185") echo 'Tahiti';		
					else if($data_team['kode_negara_team'] == "186") echo 'Tajikistan';		
					else if($data_team['kode_negara_team'] == "187") echo 'Tanjung Verde';		
					else if($data_team['kode_negara_team'] == "188") echo 'Tanzania';	
					else if($data_team['kode_negara_team'] == "189") echo 'Thailand';	
					else if($data_team['kode_negara_team'] == "190") echo 'Timor Leste';	
					else if($data_team['kode_negara_team'] == "191") echo 'Togo';	
					else if($data_team['kode_negara_team'] == "192") echo 'Tonga';		
					else if($data_team['kode_negara_team'] == "193") echo 'Trinidad dan Tobago';	
					else if($data_team['kode_negara_team'] == "194") echo 'Tunisia';	
					else if($data_team['kode_negara_team'] == "195") echo 'Turki';		
					else if($data_team['kode_negara_team'] == "196") echo 'Turkmenistan';	
					else if($data_team['kode_negara_team'] == "197") echo 'Kepulauan Turks dan Caicos';		
					else if($data_team['kode_negara_team'] == "198") echo 'Uganda';		
					else if($data_team['kode_negara_team'] == "199") echo 'Ukraina';	
					else if($data_team['kode_negara_team'] == "200") echo 'Uni Emirat Arab';	
					else if($data_team['kode_negara_team'] == "201") echo 'Uruguay';	
					else if($data_team['kode_negara_team'] == "202") echo 'Uzbekistan';		
					else if($data_team['kode_negara_team'] == "203") echo 'Vanuatu';	
					else if($data_team['kode_negara_team'] == "204") echo 'Venezuela';		
					else if($data_team['kode_negara_team'] == "205") echo 'Vietnam';	
					else if($data_team['kode_negara_team'] == "206") echo 'Kepulauan Virgin AS';	
					else if($data_team['kode_negara_team'] == "207") echo 'Kepulauan Virgin Britania Raya'; 		
					else if($data_team['kode_negara_team'] == "208") echo 'Wales';
					else if($data_team['kode_negara_team'] == "209") echo 'Yaman';
					else if($data_team['kode_negara_team'] == "210") echo 'Yordania';
					else if($data_team['kode_negara_team'] == "211") echo 'Yunani';
					else if($data_team['kode_negara_team'] == "212") echo 'Zambia';
					else if($data_team['kode_negara_team'] == "213") echo 'Zimbabwe';
					?>
				
				</td>
				<td>
				<a href="?page=kategori_kompetisi&id_team=<?php echo $data_team['id_team'];?>&action=editteam"><button class="btn info">Edit</button></a>
				<a onclick="return confirm('yakin Ingin Menghapus data ?')" href="?page=kategori_kompetisi&id_team=<?php echo $data_team['id_team'];?>&action=hapusteam"><button class="btn danger">Hapus</button></a>
				</td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
	<?php
}else{
	header("location: ../index.php");
}?>