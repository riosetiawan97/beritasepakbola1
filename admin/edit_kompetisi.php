<?php
if(@$_SESSION['admin']){
$data_kompetisi  = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi,kompetisi where 
								kategori_kompetisi.id_kategori_kompetisi = kompetisi.id_kategori_kompetisi
								and kompetisi.id_kompetisi=$id_kompetisi"));
?>
<form action="" method ="post">
<table class="table">
<tr>
	<td>ID Kompetisi Detail</td>
	<td> : </td>
	<td><?php echo $data_kompetisi['id_kompetisi'];?></td>
</tr>
<tr>
	<td>Nama Kompetisi</td>
	<td> : </td>
	<td><?php echo $data_kompetisi['nama_kategori_kompetisi'];?></td>
</tr>
<tr>
	<td>Negara</td>
	<td> : </td>
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
</tr>
<tr>
	<td>Musim</td>
	<td> : </td>
	<td><input type="text" name="musim" value="<?php echo $data_kompetisi['musim'];?>" required /></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Simpan" name="simpan"/><input type="reset" value="Reset"/></td>
</tr>
</table>
</form>
<?php
	$musim = @$_POST['musim'];
	$simpan = @$_POST['simpan'];
if($simpan){
		mysqli_query($koneksi, "update kompetisi set musim = '$musim' where id_kompetisi='$id_kompetisi'") or die (mysqli_error());
	?>	
		<script type="text/javascript">
		alert('Edit kompetisi Berhasil');
		window.location.href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $data_kompetisi['id_kategori_kompetisi'];?>&action=view";
		</script>
	<?php
}
}else{
	header("location: ../index.php");
}
?>