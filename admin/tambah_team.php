<?php
if(@$_SESSION['admin']){
$query_kompetisi = mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi where id_kategori_kompetisi=$id_kategori_kompetisi") or die (mysqli_error());
$kategori_kompetisi  = mysqli_fetch_array($query_kompetisi);
?>
<form action="" method ="post">
<table class="table">
<tr>
	<td>Nama Kompetisi</td>
	<td> : </td>
	<td><?php echo $kategori_kompetisi['nama_kategori_kompetisi'];?></td>
</tr>
<tr>
	<td>Nama Team</td>
	<td> : </td>
	<td><input type="text" name="nama_team" required /></td>
</tr>
<tr>
	<td>Negara</td>
	<td> : </td>
	<td>
		<select name="kode_negara_team" required >			
			<option value="001"><?php echo 'Afganistan'; ?></option>
			<option value="002"><?php echo 'Afrika Selatan';?></option>
			<option value="003"><?php echo 'Afrika Tengah';?></option>
			<option value="004"><?php echo 'Albania';?></option>
			<option value="005"><?php echo 'Aljazair';?></option>
			<option value="006"><?php echo 'Amerika Serikat';?></option>
			<option value="007"><?php echo 'Andorra';?></option>
			<option value="008"><?php echo 'Angola';?></option>
			<option value="009"><?php echo 'Anguilla';?></option>
			<option value="010"><?php echo 'Antigua dan Barbuda';?></option>
			<option value="011"><?php echo 'Antillen Belanda';?></option>
			<option value="012"><?php echo 'Arab Saudi';?></option>
			<option value="013"><?php echo 'Argentina';?></option>
			<option value="014"><?php echo 'Armenia';?></option>
			<option value="015"><?php echo 'Aruba';?></option>
			<option value="016"><?php echo 'Australia';?></option>
			<option value="017"><?php echo 'Austria';?></option>
			<option value="018"><?php echo 'Azerbaijan';?></option>
			<option value="019"><?php echo 'Bahama';?></option>
			<option value="020"><?php echo 'Bahrain';?></option>
			<option value="021"><?php echo 'Bangladesh';?></option>
			<option value="022"><?php echo 'Barbados';?></option>
			<option value="023"><?php echo 'Belanda';?></option>
			<option value="024"><?php echo 'Belarus';?></option>
			<option value="025"><?php echo 'Belgia';?></option>
			<option value="026"><?php echo 'Belize';?></option>
			<option value="027"><?php echo 'Benin';?></option>
			<option value="028"><?php echo 'Bermuda';?></option>
			<option value="029"><?php echo 'Bhutan';?></option>
			<option value="030"><?php echo 'Bolivia';?></option>
			<option value="031"><?php echo 'Bosnia dan Herzegovina';?></option>
			<option value="032"><?php echo 'Botswana';?></option>
			<option value="033"><?php echo 'Brasil';?></option>
			<option value="034"><?php echo 'Britania Raya';?></option>
			<option value="035"><?php echo 'Brunei';?></option>
			<option value="036"><?php echo 'Bulgaria';?></option>
			<option value="037"><?php echo 'Burkina Faso';?></option>
			<option value="038"><?php echo 'Burundi';?></option>
			<option value="039"><?php echo 'Kepulauan Cayman';?></option>
			<option value="040"><?php echo 'Chad';?></option>
			<option value="041"><?php echo 'Chili';?></option>
			<option value="042"><?php echo 'Republik Rakyat Tiongkok';?></option>
			<option value="043"><?php echo 'Cina Taipei';?></option>
			<option value="044"><?php echo 'Kepulauan Cook';?></option>
			<option value="045"><?php echo 'Ceko';?></option>
			<option value="046"><?php echo 'Denmark';?></option>
			<option value="047"><?php echo 'Djibouti';?></option>
			<option value="048"><?php echo 'Dominika';?></option>
			<option value="049"><?php echo 'Republik Dominika';?></option>
			<option value="050"><?php echo 'Ekuador';?></option>
			<option value="051"><?php echo 'El Salvador';?></option>
			<option value="052"><?php echo 'Eritrea';?></option>
			<option value="053"><?php echo 'Estonia';?></option>
			<option value="054"><?php echo 'Ethiopia';?></option>
			<option value="055"><?php echo 'Kepulauan Faroe';?></option>
			<option value="056"><?php echo 'Fiji';?></option>
			<option value="057"><?php echo 'Filipina';?></option>
			<option value="058"><?php echo 'Finlandia';?></option>
			<option value="059"><?php echo 'Gabon';?></option>
			<option value="060"><?php echo 'Gambia';?></option>
			<option value="061"><?php echo 'Georgia';?></option>
			<option value="062"><?php echo 'Ghana';?></option>
			<option value="063"><?php echo 'Gibraltar';?></option>
			<option value="064"><?php echo 'Grenada';?></option>
			<option value="065"><?php echo 'Guam';?></option>
			<option value="066"><?php echo 'Guatemala';?></option>
			<option value="067"><?php echo 'Guinea';?></option>
			<option value="068"><?php echo 'Guinea Khatulistiwa';?></option>
			<option value="069"><?php echo 'Guinea-Bissau';?></option>
			<option value="070"><?php echo 'Guyana';?></option>
			<option value="071"><?php echo 'Haiti';?></option>
			<option value="072"><?php echo 'Honduras';?></option>
			<option value="073"><?php echo 'Hong Kong';?></option>
			<option value="074"><?php echo 'Hongaria';?></option>
			<option value="075"><?php echo 'India';?></option>
			<option value="076"><?php echo 'Indonesia';?></option>
			<option value="077"><?php echo 'Inggris';?></option>
			<option value="078"><?php echo 'Irak';?></option>
			<option value="079"><?php echo 'Iran';?></option>
			<option value="080"><?php echo 'Republik Irlandia';?></option>
			<option value="081"><?php echo 'Irlandia Utara';?></option>
			<option value="082"><?php echo 'Islandia';?></option>
			<option value="083"><?php echo 'Israel';?></option>
			<option value="084"><?php echo 'Italia';?></option>
			<option value="085"><?php echo 'Jamaika';?></option>
			<option value="086"><?php echo 'Jepang';?></option>
			<option value="087"><?php echo 'Jerman';?></option>
			<option value="088"><?php echo 'Kaledonia Baru';?></option>
			<option value="089"><?php echo 'Kamboja';?></option>
			<option value="090"><?php echo 'Kamerun';?></option>
			<option value="091"><?php echo 'Kanada';?></option>
			<option value="092"><?php echo 'Kazakhstan';?></option>
			<option value="093"><?php echo 'Kenya';?></option>
			<option value="094"><?php echo 'Kirgizstan';?></option>
			<option value="095"><?php echo 'Korea Selatan';?></option>
			<option value="096"><?php echo 'Korea Utara';?></option>
			<option value="097"><?php echo 'Kuwait';?></option>
			<option value="098"><?php echo 'Kolombia';?></option>
			<option value="099"><?php echo 'Komoro';?></option>
			<option value="100"><?php echo 'Republik Kongo';?></option>
			<option value="101"><?php echo 'Republik Demokratik Kongo';?></option>
			<option value="102"><?php echo 'Kosovo';?></option>
			<option value="103"><?php echo 'Kosta Rika';?></option>
			<option value="104"><?php echo 'Kroasia';?></option>
			<option value="105"><?php echo 'Kuba';?></option>
			<option value="106"><?php echo 'Laos';?></option>
			<option value="107"><?php echo 'Latvia';?></option>
			<option value="108"><?php echo 'Lebanon';?></option>
			<option value="109"><?php echo 'Lesotho';?></option>
			<option value="110"><?php echo 'Liberia';?></option>
			<option value="111"><?php echo 'Libya';?></option>
			<option value="112"><?php echo 'Liechtenstein';?></option>
			<option value="113"><?php echo 'Lituania';?></option>
			<option value="114"><?php echo 'Luksemburg';?></option>
			<option value="115"><?php echo 'Madagaskar';?></option>
			<option value="116"><?php echo 'Makau';?></option>
			<option value="117"><?php echo 'Makedonia';?></option>
			<option value="119"><?php echo 'Maladewa';?></option>
			<option value="120"><?php echo 'Malawi';?></option>
			<option value="121"><?php echo 'Malaysia';?></option>
			<option value="122"><?php echo 'Mali';?></option>
			<option value="123"><?php echo 'Malta';?></option>
			<option value="124"><?php echo 'Maroko';?></option>
			<option value="125"><?php echo 'Mauritania';?></option>
			<option value="126"><?php echo 'Mauritius';?></option>
			<option value="127"><?php echo 'Meksiko';?></option>
			<option value="128"><?php echo 'Mesir';?></option>
			<option value="129"><?php echo 'Moldova';?></option>
			<option value="130"><?php echo 'Mongolia';?></option>
			<option value="131"><?php echo 'Montenegro';?></option>
			<option value="132"><?php echo 'Montserrat';?></option>
			<option value="133"><?php echo 'Mozambik';?></option>
			<option value="134"><?php echo 'Myanmar';?></option>
			<option value="135"><?php echo 'Namibia';?></option>
			<option value="136"><?php echo 'Nepal';?></option>
			<option value="137"><?php echo 'Nikaragua';?></option>
			<option value="138"><?php echo 'Niger';?></option>
			<option value="139"><?php echo 'Nigeria';?></option>
			<option value="140"><?php echo 'Norwegia';?></option>
			<option value="141"><?php echo 'Oman';?></option>
			<option value="142"><?php echo 'Pakistan';?></option>
			<option value="143"><?php echo 'Palestina';?></option>
			<option value="144"><?php echo 'Panama';?></option>
			<option value="145"><?php echo 'Pantai Gading';?></option>
			<option value="146"><?php echo 'Papua Nugini';?></option>
			<option value="147"><?php echo 'Paraguay';?></option>
			<option value="148"><?php echo 'Perancis';?></option>
			<option value="149"><?php echo 'Peru';?></option>
			<option value="150"><?php echo 'Polandia';?></option>
			<option value="151"><?php echo 'Portugal';?></option>
			<option value="152"><?php echo 'Puerto Riko';?></option>
			<option value="153"><?php echo 'Qatar';?></option>
			<option value="154"><?php echo 'Rumania';?></option>
			<option value="155"><?php echo 'Rusia';?></option>
			<option value="156"><?php echo 'Rwanda';?></option>
			<option value="157"><?php echo 'Saint Kitts dan Nevis';?></option>
			<option value="158"><?php echo 'Saint Lucia';?></option>
			<option value="159"><?php echo 'Saint Vincent dan Grenadine';?></option>
			<option value="160"><?php echo 'Samoa';?></option>
			<option value="161"><?php echo 'Samoa Amerika';?></option>
			<option value="162"><?php echo 'San Marino';?></option>
			<option value="163"><?php echo 'São Tomé dan Príncipe';?></option>
			<option value="164"><?php echo 'Selandia Baru';?></option>
			<option value="165"><?php echo 'Senegal';?></option>
			<option value="166"><?php echo 'Serbia';?></option>
			<option value="167"><?php echo 'Seychelles';?></option>
			<option value="168"><?php echo 'Sierra Leone';?></option>
			<option value="169"><?php echo 'Singapura';?></option>
			<option value="170"><?php echo 'Siprus';?></option>
			<option value="171"><?php echo 'Skotlandia';?></option>
			<option value="172"><?php echo 'Slovenia';?></option>
			<option value="173"><?php echo 'Slowakia';?></option>
			<option value="174"><?php echo 'Kepulauan Solomon';?></option>
			<option value="175"><?php echo 'Somalia';?></option>
			<option value="176"><?php echo 'Spanyol';?></option>
			<option value="177"><?php echo 'Sri Lanka';?></option>
			<option value="178"><?php echo 'Sudan';?></option>
			<option value="179"><?php echo 'Sudan Selatan';?></option>
			<option value="180"><?php echo 'Suriah';?></option>
			<option value="181"><?php echo 'Suriname';?></option>
			<option value="182"><?php echo 'Swaziland';?></option>
			<option value="183"><?php echo 'Swedia';?></option>
			<option value="184"><?php echo 'Swiss';?></option>
			<option value="185"><?php echo 'Tahiti';?></option>
			<option value="186"><?php echo 'Tajikistan';?></option>
			<option value="187"><?php echo 'Tanjung Verde';?></option>
			<option value="188"><?php echo 'Tanzania';?></option>
			<option value="189"><?php echo 'Thailand';?></option>
			<option value="190"><?php echo 'Timor Leste';	?></option>
			<option value="191"><?php echo 'Togo';?></option>
			<option value="192"><?php echo 'Tonga';?></option>
			<option value="193"><?php echo 'Trinidad dan Tobago';	?></option>
			<option value="194"><?php echo 'Tunisia';?></option>
			<option value="195"><?php echo 'Turki';?></option>
			<option value="196"><?php echo 'Turkmenistan';?></option>
			<option value="197"><?php echo 'Kepulauan Turks dan Caicos';?></option>
			<option value="198"><?php echo 'Uganda';?></option>
			<option value="199"><?php echo 'Ukraina';?></option>
			<option value="200"><?php echo 'Uni Emirat Arab';?></option>
			<option value="201"><?php echo 'Uruguay';?></option>
			<option value="202"><?php echo 'Uzbekistan';?></option>
			<option value="203"><?php echo 'Vanuatu';?></option>
			<option value="204"><?php echo 'Venezuela';?></option>
			<option value="205"><?php echo 'Vietnam';?></option>
			<option value="206"><?php echo 'Kepulauan Virgin AS';?></option>
			<option value="207"><?php echo 'Kepulauan Virgin Britania Raya';?></option>
			<option value="208"><?php echo 'Wales';?></option>
			<option value="209"><?php echo 'Yaman';?></option>
			<option value="210"><?php echo 'Yordania';?></option>
			<option value="211"><?php echo 'Yunani';?></option>
			<option value="212"><?php echo 'Zambia';?></option>
			<option value="213"><?php echo 'Zimbabwe';?></option>								
		</select>
	</td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Tambah" name="tambah"/></td>
</tr>
</table>
</form>
<?php
	$tambah = @$_POST['tambah'];
if($tambah){
	$nama_team = @$_POST['nama_team'];
	$kode_negara_team = @$_POST['kode_negara_team'];
	$cekteam = mysqli_num_rows(mysqli_query($koneksi, "select * from team where nama_team = '$nama_team'"));
	if($cekteam >= 1){
		?><script type="text/javascript">alert('Team yang dimasukkan sudah ada');</script><?php
	}else{
		mysqli_query($koneksi, "INSERT INTO team VALUES('','$id_kategori_kompetisi','$nama_team','$kode_negara_team')");
	?>	
		<script type="text/javascript">
		alert('Data Team Berhasil Dimasukkan');
		window.location.href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $kategori_kompetisi['id_kategori_kompetisi'];?>&action=view";
		</script>
	<?php
	}
}
}else{
	header("location: ../index.php");
}
?>