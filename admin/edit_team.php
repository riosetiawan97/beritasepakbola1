<?php
if(@$_SESSION['admin']){
$data_team  = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi,team where kategori_kompetisi.id_kategori_kompetisi=team.id_kategori_kompetisi and team.id_team=$id_team"));
?>
<form action="" method ="post">
<table class="table">
<tr>
	<td>Nama Kompetisi</td>
	<td> : </td>
	<td><?php echo $data_team['nama_kategori_kompetisi'];?></td>
</tr>
<tr>
	<td>Nama Team</td>
	<td> : </td>
	<td><input type="text" name="nama_team" value="<?php echo $data_team['nama_team'];?>" required /></td>
</tr>
<tr>
	<td>Negara</td>
	<td> : </td>
	<td>
		<select name="kode_negara_team" required >			
			<option value="001" <?php if ($data_team["kode_negara_team"]=="001") echo "selected";?>><?php echo 'Afganistan'; ?></option>
			<option value="002" <?php if ($data_team["kode_negara_team"]=="002") echo "selected";?>><?php echo 'Afrika Selatan';?></option>
			<option value="003" <?php if ($data_team["kode_negara_team"]=="003") echo "selected";?>><?php echo 'Afrika Tengah';?></option>
			<option value="004" <?php if ($data_team["kode_negara_team"]=="004") echo "selected";?>><?php echo 'Albania';?></option>
			<option value="005" <?php if ($data_team["kode_negara_team"]=="005") echo "selected";?>><?php echo 'Aljazair';?></option>
			<option value="006" <?php if ($data_team["kode_negara_team"]=="006") echo "selected";?>><?php echo 'Amerika Serikat';?></option>
			<option value="007" <?php if ($data_team["kode_negara_team"]=="007") echo "selected";?>><?php echo 'Andorra';?></option>
			<option value="008" <?php if ($data_team["kode_negara_team"]=="008") echo "selected";?>><?php echo 'Angola';?></option>
			<option value="009" <?php if ($data_team["kode_negara_team"]=="009") echo "selected";?>><?php echo 'Anguilla';?></option>
			<option value="010" <?php if ($data_team["kode_negara_team"]=="010") echo "selected";?>><?php echo 'Antigua dan Barbuda';?></option>
			<option value="011" <?php if ($data_team["kode_negara_team"]=="011") echo "selected";?>><?php echo 'Antillen Belanda';?></option>
			<option value="012" <?php if ($data_team["kode_negara_team"]=="012") echo "selected";?>><?php echo 'Arab Saudi';?></option>
			<option value="013" <?php if ($data_team["kode_negara_team"]=="013") echo "selected";?>><?php echo 'Argentina';?></option>
			<option value="014" <?php if ($data_team["kode_negara_team"]=="014") echo "selected";?>><?php echo 'Armenia';?></option>
			<option value="015" <?php if ($data_team["kode_negara_team"]=="015") echo "selected";?>><?php echo 'Aruba';?></option>
			<option value="016" <?php if ($data_team["kode_negara_team"]=="016") echo "selected";?>><?php echo 'Australia';?></option>
			<option value="017" <?php if ($data_team["kode_negara_team"]=="017") echo "selected";?>><?php echo 'Austria';?></option>
			<option value="018" <?php if ($data_team["kode_negara_team"]=="018") echo "selected";?>><?php echo 'Azerbaijan';?></option>
			<option value="019" <?php if ($data_team["kode_negara_team"]=="019") echo "selected";?>><?php echo 'Bahama';?></option>
			<option value="020" <?php if ($data_team["kode_negara_team"]=="020") echo "selected";?>><?php echo 'Bahrain';?></option>
			<option value="021" <?php if ($data_team["kode_negara_team"]=="021") echo "selected";?>><?php echo 'Bangladesh';?></option>
			<option value="022" <?php if ($data_team["kode_negara_team"]=="022") echo "selected";?>><?php echo 'Barbados';?></option>
			<option value="023" <?php if ($data_team["kode_negara_team"]=="023") echo "selected";?>><?php echo 'Belanda';?></option>
			<option value="024" <?php if ($data_team["kode_negara_team"]=="024") echo "selected";?>><?php echo 'Belarus';?></option>
			<option value="025" <?php if ($data_team["kode_negara_team"]=="025") echo "selected";?>><?php echo 'Belgia';?></option>
			<option value="026" <?php if ($data_team["kode_negara_team"]=="026") echo "selected";?>><?php echo 'Belize';?></option>
			<option value="027" <?php if ($data_team["kode_negara_team"]=="027") echo "selected";?>><?php echo 'Benin';?></option>
			<option value="028" <?php if ($data_team["kode_negara_team"]=="028") echo "selected";?>><?php echo 'Bermuda';?></option>
			<option value="029" <?php if ($data_team["kode_negara_team"]=="029") echo "selected";?>><?php echo 'Bhutan';?></option>
			<option value="030" <?php if ($data_team["kode_negara_team"]=="030") echo "selected";?>><?php echo 'Bolivia';?></option>
			<option value="031" <?php if ($data_team["kode_negara_team"]=="031") echo "selected";?>><?php echo 'Bosnia dan Herzegovina';?></option>
			<option value="032" <?php if ($data_team["kode_negara_team"]=="032") echo "selected";?>><?php echo 'Botswana';?></option>
			<option value="033" <?php if ($data_team["kode_negara_team"]=="033") echo "selected";?>><?php echo 'Brasil';?></option>
			<option value="034" <?php if ($data_team["kode_negara_team"]=="034") echo "selected";?>><?php echo 'Britania Raya';?></option>
			<option value="035" <?php if ($data_team["kode_negara_team"]=="035") echo "selected";?>><?php echo 'Brunei';?></option>
			<option value="036" <?php if ($data_team["kode_negara_team"]=="036") echo "selected";?>><?php echo 'Bulgaria';?></option>
			<option value="037" <?php if ($data_team["kode_negara_team"]=="037") echo "selected";?>><?php echo 'Burkina Faso';?></option>
			<option value="038" <?php if ($data_team["kode_negara_team"]=="038") echo "selected";?>><?php echo 'Burundi';?></option>
			<option value="039" <?php if ($data_team["kode_negara_team"]=="039") echo "selected";?>><?php echo 'Kepulauan Cayman';?></option>
			<option value="040" <?php if ($data_team["kode_negara_team"]=="040") echo "selected";?>><?php echo 'Chad';?></option>
			<option value="041" <?php if ($data_team["kode_negara_team"]=="041") echo "selected";?>><?php echo 'Chili';?></option>
			<option value="042" <?php if ($data_team["kode_negara_team"]=="042") echo "selected";?>><?php echo 'Republik Rakyat Tiongkok';?></option>
			<option value="043" <?php if ($data_team["kode_negara_team"]=="043") echo "selected";?>><?php echo 'Cina Taipei';?></option>
			<option value="044" <?php if ($data_team["kode_negara_team"]=="044") echo "selected";?>><?php echo 'Kepulauan Cook';?></option>
			<option value="045" <?php if ($data_team["kode_negara_team"]=="045") echo "selected";?>><?php echo 'Ceko';?></option>
			<option value="046" <?php if ($data_team["kode_negara_team"]=="046") echo "selected";?>><?php echo 'Denmark';?></option>
			<option value="047" <?php if ($data_team["kode_negara_team"]=="047") echo "selected";?>><?php echo 'Djibouti';?></option>
			<option value="048" <?php if ($data_team["kode_negara_team"]=="048") echo "selected";?>><?php echo 'Dominika';?></option>
			<option value="049" <?php if ($data_team["kode_negara_team"]=="049") echo "selected";?>><?php echo 'Republik Dominika';?></option>
			<option value="050" <?php if ($data_team["kode_negara_team"]=="050") echo "selected";?>><?php echo 'Ekuador';?></option>
			<option value="051" <?php if ($data_team["kode_negara_team"]=="051") echo "selected";?>><?php echo 'El Salvador';?></option>
			<option value="052" <?php if ($data_team["kode_negara_team"]=="052") echo "selected";?>><?php echo 'Eritrea';?></option>
			<option value="053" <?php if ($data_team["kode_negara_team"]=="053") echo "selected";?>><?php echo 'Estonia';?></option>
			<option value="054" <?php if ($data_team["kode_negara_team"]=="054") echo "selected";?>><?php echo 'Ethiopia';?></option>
			<option value="055" <?php if ($data_team["kode_negara_team"]=="055") echo "selected";?>><?php echo 'Kepulauan Faroe';?></option>
			<option value="056" <?php if ($data_team["kode_negara_team"]=="056") echo "selected";?>><?php echo 'Fiji';?></option>
			<option value="057" <?php if ($data_team["kode_negara_team"]=="057") echo "selected";?>><?php echo 'Filipina';?></option>
			<option value="058" <?php if ($data_team["kode_negara_team"]=="058") echo "selected";?>><?php echo 'Finlandia';?></option>
			<option value="059" <?php if ($data_team["kode_negara_team"]=="059") echo "selected";?>><?php echo 'Gabon';?></option>
			<option value="060" <?php if ($data_team["kode_negara_team"]=="060") echo "selected";?>><?php echo 'Gambia';?></option>
			<option value="061" <?php if ($data_team["kode_negara_team"]=="061") echo "selected";?>><?php echo 'Georgia';?></option>
			<option value="062" <?php if ($data_team["kode_negara_team"]=="062") echo "selected";?>><?php echo 'Ghana';?></option>
			<option value="063" <?php if ($data_team["kode_negara_team"]=="063") echo "selected";?>><?php echo 'Gibraltar';?></option>
			<option value="064" <?php if ($data_team["kode_negara_team"]=="064") echo "selected";?>><?php echo 'Grenada';?></option>
			<option value="065" <?php if ($data_team["kode_negara_team"]=="065") echo "selected";?>><?php echo 'Guam';?></option>
			<option value="066" <?php if ($data_team["kode_negara_team"]=="066") echo "selected";?>><?php echo 'Guatemala';?></option>
			<option value="067" <?php if ($data_team["kode_negara_team"]=="067") echo "selected";?>><?php echo 'Guinea';?></option>
			<option value="068" <?php if ($data_team["kode_negara_team"]=="068") echo "selected";?>><?php echo 'Guinea Khatulistiwa';?></option>
			<option value="069" <?php if ($data_team["kode_negara_team"]=="069") echo "selected";?>><?php echo 'Guinea-Bissau';?></option>
			<option value="070" <?php if ($data_team["kode_negara_team"]=="070") echo "selected";?>><?php echo 'Guyana';?></option>
			<option value="071" <?php if ($data_team["kode_negara_team"]=="071") echo "selected";?>><?php echo 'Haiti';?></option>
			<option value="072" <?php if ($data_team["kode_negara_team"]=="072") echo "selected";?>><?php echo 'Honduras';?></option>
			<option value="073" <?php if ($data_team["kode_negara_team"]=="073") echo "selected";?>><?php echo 'Hong Kong';?></option>
			<option value="074" <?php if ($data_team["kode_negara_team"]=="074") echo "selected";?>><?php echo 'Hongaria';?></option>
			<option value="075" <?php if ($data_team["kode_negara_team"]=="075") echo "selected";?>><?php echo 'India';?></option>
			<option value="076" <?php if ($data_team["kode_negara_team"]=="076") echo "selected";?>><?php echo 'Indonesia';?></option>
			<option value="077" <?php if ($data_team["kode_negara_team"]=="077") echo "selected";?>><?php echo 'Inggris';?></option>
			<option value="078" <?php if ($data_team["kode_negara_team"]=="078") echo "selected";?>><?php echo 'Irak';?></option>
			<option value="079" <?php if ($data_team["kode_negara_team"]=="079") echo "selected";?>><?php echo 'Iran';?></option>
			<option value="080" <?php if ($data_team["kode_negara_team"]=="080") echo "selected";?>><?php echo 'Republik Irlandia';?></option>
			<option value="081" <?php if ($data_team["kode_negara_team"]=="081") echo "selected";?>><?php echo 'Irlandia Utara';?></option>
			<option value="082" <?php if ($data_team["kode_negara_team"]=="082") echo "selected";?>><?php echo 'Islandia';?></option>
			<option value="083" <?php if ($data_team["kode_negara_team"]=="083") echo "selected";?>><?php echo 'Israel';?></option>
			<option value="084" <?php if ($data_team["kode_negara_team"]=="084") echo "selected";?>><?php echo 'Italia';?></option>
			<option value="085" <?php if ($data_team["kode_negara_team"]=="085") echo "selected";?>><?php echo 'Jamaika';?></option>
			<option value="086" <?php if ($data_team["kode_negara_team"]=="086") echo "selected";?>><?php echo 'Jepang';?></option>
			<option value="087" <?php if ($data_team["kode_negara_team"]=="087") echo "selected";?>><?php echo 'Jerman';?></option>
			<option value="088" <?php if ($data_team["kode_negara_team"]=="088") echo "selected";?>><?php echo 'Kaledonia Baru';?></option>
			<option value="089" <?php if ($data_team["kode_negara_team"]=="089") echo "selected";?>><?php echo 'Kamboja';?></option>
			<option value="090" <?php if ($data_team["kode_negara_team"]=="090") echo "selected";?>><?php echo 'Kamerun';?></option>
			<option value="091" <?php if ($data_team["kode_negara_team"]=="091") echo "selected";?>><?php echo 'Kanada';?></option>
			<option value="092" <?php if ($data_team["kode_negara_team"]=="092") echo "selected";?>><?php echo 'Kazakhstan';?></option>
			<option value="093" <?php if ($data_team["kode_negara_team"]=="093") echo "selected";?>><?php echo 'Kenya';?></option>
			<option value="094" <?php if ($data_team["kode_negara_team"]=="094") echo "selected";?>><?php echo 'Kirgizstan';?></option>
			<option value="095" <?php if ($data_team["kode_negara_team"]=="095") echo "selected";?>><?php echo 'Korea Selatan';?></option>
			<option value="096" <?php if ($data_team["kode_negara_team"]=="096") echo "selected";?>><?php echo 'Korea Utara';?></option>
			<option value="097" <?php if ($data_team["kode_negara_team"]=="097") echo "selected";?>><?php echo 'Kuwait';?></option>
			<option value="098" <?php if ($data_team["kode_negara_team"]=="098") echo "selected";?>><?php echo 'Kolombia';?></option>
			<option value="099" <?php if ($data_team["kode_negara_team"]=="099") echo "selected";?>><?php echo 'Komoro';?></option>
			<option value="100" <?php if ($data_team["kode_negara_team"]=="100") echo "selected";?>><?php echo 'Republik Kongo';?></option>
			<option value="101" <?php if ($data_team["kode_negara_team"]=="101") echo "selected";?>><?php echo 'Republik Demokratik Kongo';?></option>
			<option value="102" <?php if ($data_team["kode_negara_team"]=="102") echo "selected";?>><?php echo 'Kosovo';?></option>
			<option value="103" <?php if ($data_team["kode_negara_team"]=="103") echo "selected";?>><?php echo 'Kosta Rika';?></option>
			<option value="104" <?php if ($data_team["kode_negara_team"]=="104") echo "selected";?>><?php echo 'Kroasia';?></option>
			<option value="105" <?php if ($data_team["kode_negara_team"]=="105") echo "selected";?>><?php echo 'Kuba';?></option>
			<option value="106" <?php if ($data_team["kode_negara_team"]=="106") echo "selected";?>><?php echo 'Laos';?></option>
			<option value="107" <?php if ($data_team["kode_negara_team"]=="107") echo "selected";?>><?php echo 'Latvia';?></option>
			<option value="108" <?php if ($data_team["kode_negara_team"]=="108") echo "selected";?>><?php echo 'Lebanon';?></option>
			<option value="109" <?php if ($data_team["kode_negara_team"]=="109") echo "selected";?>><?php echo 'Lesotho';?></option>
			<option value="110" <?php if ($data_team["kode_negara_team"]=="110") echo "selected";?>><?php echo 'Liberia';?></option>
			<option value="111" <?php if ($data_team["kode_negara_team"]=="111") echo "selected";?>><?php echo 'Libya';?></option>
			<option value="112" <?php if ($data_team["kode_negara_team"]=="112") echo "selected";?>><?php echo 'Liechtenstein';?></option>
			<option value="113" <?php if ($data_team["kode_negara_team"]=="113") echo "selected";?>><?php echo 'Lituania';?></option>
			<option value="114" <?php if ($data_team["kode_negara_team"]=="114") echo "selected";?>><?php echo 'Luksemburg';?></option>
			<option value="115" <?php if ($data_team["kode_negara_team"]=="115") echo "selected";?>><?php echo 'Madagaskar';?></option>
			<option value="116" <?php if ($data_team["kode_negara_team"]=="116") echo "selected";?>><?php echo 'Makau';?></option>
			<option value="117" <?php if ($data_team["kode_negara_team"]=="117") echo "selected";?>><?php echo 'Makedonia';?></option>
			<option value="119" <?php if ($data_team["kode_negara_team"]=="119") echo "selected";?>><?php echo 'Maladewa';?></option>
			<option value="120" <?php if ($data_team["kode_negara_team"]=="120") echo "selected";?>><?php echo 'Malawi';?></option>
			<option value="121" <?php if ($data_team["kode_negara_team"]=="121") echo "selected";?>><?php echo 'Malaysia';?></option>
			<option value="122" <?php if ($data_team["kode_negara_team"]=="122") echo "selected";?>><?php echo 'Mali';?></option>
			<option value="123" <?php if ($data_team["kode_negara_team"]=="123") echo "selected";?>><?php echo 'Malta';?></option>
			<option value="124" <?php if ($data_team["kode_negara_team"]=="124") echo "selected";?>><?php echo 'Maroko';?></option>
			<option value="125" <?php if ($data_team["kode_negara_team"]=="125") echo "selected";?>><?php echo 'Mauritania';?></option>
			<option value="126" <?php if ($data_team["kode_negara_team"]=="126") echo "selected";?>><?php echo 'Mauritius';?></option>
			<option value="127" <?php if ($data_team["kode_negara_team"]=="127") echo "selected";?>><?php echo 'Meksiko';?></option>
			<option value="128" <?php if ($data_team["kode_negara_team"]=="128") echo "selected";?>><?php echo 'Mesir';?></option>
			<option value="129" <?php if ($data_team["kode_negara_team"]=="129") echo "selected";?>><?php echo 'Moldova';?></option>
			<option value="130" <?php if ($data_team["kode_negara_team"]=="130") echo "selected";?>><?php echo 'Mongolia';?></option>
			<option value="131" <?php if ($data_team["kode_negara_team"]=="131") echo "selected";?>><?php echo 'Montenegro';?></option>
			<option value="132" <?php if ($data_team["kode_negara_team"]=="132") echo "selected";?>><?php echo 'Montserrat';?></option>
			<option value="133" <?php if ($data_team["kode_negara_team"]=="133") echo "selected";?>><?php echo 'Mozambik';?></option>
			<option value="134" <?php if ($data_team["kode_negara_team"]=="134") echo "selected";?>><?php echo 'Myanmar';?></option>
			<option value="135" <?php if ($data_team["kode_negara_team"]=="135") echo "selected";?>><?php echo 'Namibia';?></option>
			<option value="136" <?php if ($data_team["kode_negara_team"]=="136") echo "selected";?>><?php echo 'Nepal';?></option>
			<option value="137" <?php if ($data_team["kode_negara_team"]=="137") echo "selected";?>><?php echo 'Nikaragua';?></option>
			<option value="138" <?php if ($data_team["kode_negara_team"]=="138") echo "selected";?>><?php echo 'Niger';?></option>
			<option value="139" <?php if ($data_team["kode_negara_team"]=="139") echo "selected";?>><?php echo 'Nigeria';?></option>
			<option value="140" <?php if ($data_team["kode_negara_team"]=="140") echo "selected";?>><?php echo 'Norwegia';?></option>
			<option value="141" <?php if ($data_team["kode_negara_team"]=="141") echo "selected";?>><?php echo 'Oman';?></option>
			<option value="142" <?php if ($data_team["kode_negara_team"]=="142") echo "selected";?>><?php echo 'Pakistan';?></option>
			<option value="143" <?php if ($data_team["kode_negara_team"]=="143") echo "selected";?>><?php echo 'Palestina';?></option>
			<option value="144" <?php if ($data_team["kode_negara_team"]=="144") echo "selected";?>><?php echo 'Panama';?></option>
			<option value="145" <?php if ($data_team["kode_negara_team"]=="145") echo "selected";?>><?php echo 'Pantai Gading';?></option>
			<option value="146" <?php if ($data_team["kode_negara_team"]=="146") echo "selected";?>><?php echo 'Papua Nugini';?></option>
			<option value="147" <?php if ($data_team["kode_negara_team"]=="147") echo "selected";?>><?php echo 'Paraguay';?></option>
			<option value="148" <?php if ($data_team["kode_negara_team"]=="148") echo "selected";?>><?php echo 'Perancis';?></option>
			<option value="149" <?php if ($data_team["kode_negara_team"]=="149") echo "selected";?>><?php echo 'Peru';?></option>
			<option value="150" <?php if ($data_team["kode_negara_team"]=="150") echo "selected";?>><?php echo 'Polandia';?></option>
			<option value="151" <?php if ($data_team["kode_negara_team"]=="151") echo "selected";?>><?php echo 'Portugal';?></option>
			<option value="152" <?php if ($data_team["kode_negara_team"]=="152") echo "selected";?>><?php echo 'Puerto Riko';?></option>
			<option value="153" <?php if ($data_team["kode_negara_team"]=="153") echo "selected";?>><?php echo 'Qatar';?></option>
			<option value="154" <?php if ($data_team["kode_negara_team"]=="154") echo "selected";?>><?php echo 'Rumania';?></option>
			<option value="155" <?php if ($data_team["kode_negara_team"]=="155") echo "selected";?>><?php echo 'Rusia';?></option>
			<option value="156" <?php if ($data_team["kode_negara_team"]=="156") echo "selected";?>><?php echo 'Rwanda';?></option>
			<option value="157" <?php if ($data_team["kode_negara_team"]=="157") echo "selected";?>><?php echo 'Saint Kitts dan Nevis';?></option>
			<option value="158" <?php if ($data_team["kode_negara_team"]=="158") echo "selected";?>><?php echo 'Saint Lucia';?></option>
			<option value="159" <?php if ($data_team["kode_negara_team"]=="159") echo "selected";?>><?php echo 'Saint Vincent dan Grenadine';?></option>
			<option value="160" <?php if ($data_team["kode_negara_team"]=="160") echo "selected";?>><?php echo 'Samoa';?></option>
			<option value="161" <?php if ($data_team["kode_negara_team"]=="161") echo "selected";?>><?php echo 'Samoa Amerika';?></option>
			<option value="162" <?php if ($data_team["kode_negara_team"]=="162") echo "selected";?>><?php echo 'San Marino';?></option>
			<option value="163" <?php if ($data_team["kode_negara_team"]=="163") echo "selected";?>><?php echo 'São Tomé dan Príncipe';?></option>
			<option value="164" <?php if ($data_team["kode_negara_team"]=="164") echo "selected";?>><?php echo 'Selandia Baru';?></option>
			<option value="165" <?php if ($data_team["kode_negara_team"]=="165") echo "selected";?>><?php echo 'Senegal';?></option>
			<option value="166" <?php if ($data_team["kode_negara_team"]=="166") echo "selected";?>><?php echo 'Serbia';?></option>
			<option value="167" <?php if ($data_team["kode_negara_team"]=="167") echo "selected";?>><?php echo 'Seychelles';?></option>
			<option value="168" <?php if ($data_team["kode_negara_team"]=="168") echo "selected";?>><?php echo 'Sierra Leone';?></option>
			<option value="169" <?php if ($data_team["kode_negara_team"]=="169") echo "selected";?>><?php echo 'Singapura';?></option>
			<option value="170" <?php if ($data_team["kode_negara_team"]=="170") echo "selected";?>><?php echo 'Siprus';?></option>
			<option value="171" <?php if ($data_team["kode_negara_team"]=="171") echo "selected";?>><?php echo 'Skotlandia';?></option>
			<option value="172" <?php if ($data_team["kode_negara_team"]=="172") echo "selected";?>><?php echo 'Slovenia';?></option>
			<option value="173" <?php if ($data_team["kode_negara_team"]=="173") echo "selected";?>><?php echo 'Slowakia';?></option>
			<option value="174" <?php if ($data_team["kode_negara_team"]=="174") echo "selected";?>><?php echo 'Kepulauan Solomon';?></option>
			<option value="175" <?php if ($data_team["kode_negara_team"]=="175") echo "selected";?>><?php echo 'Somalia';?></option>
			<option value="176" <?php if ($data_team["kode_negara_team"]=="176") echo "selected";?>><?php echo 'Spanyol';?></option>
			<option value="177" <?php if ($data_team["kode_negara_team"]=="177") echo "selected";?>><?php echo 'Sri Lanka';?></option>
			<option value="178" <?php if ($data_team["kode_negara_team"]=="178") echo "selected";?>><?php echo 'Sudan';?></option>
			<option value="179" <?php if ($data_team["kode_negara_team"]=="179") echo "selected";?>><?php echo 'Sudan Selatan';?></option>
			<option value="180" <?php if ($data_team["kode_negara_team"]=="180") echo "selected";?>><?php echo 'Suriah';?></option>
			<option value="181" <?php if ($data_team["kode_negara_team"]=="181") echo "selected";?>><?php echo 'Suriname';?></option>
			<option value="182" <?php if ($data_team["kode_negara_team"]=="182") echo "selected";?>><?php echo 'Swaziland';?></option>
			<option value="183" <?php if ($data_team["kode_negara_team"]=="183") echo "selected";?>><?php echo 'Swedia';?></option>
			<option value="184" <?php if ($data_team["kode_negara_team"]=="184") echo "selected";?>><?php echo 'Swiss';?></option>
			<option value="185" <?php if ($data_team["kode_negara_team"]=="185") echo "selected";?>><?php echo 'Tahiti';?></option>
			<option value="186" <?php if ($data_team["kode_negara_team"]=="186") echo "selected";?>><?php echo 'Tajikistan';?></option>
			<option value="187" <?php if ($data_team["kode_negara_team"]=="187") echo "selected";?>><?php echo 'Tanjung Verde';?></option>
			<option value="188" <?php if ($data_team["kode_negara_team"]=="188") echo "selected";?>><?php echo 'Tanzania';?></option>
			<option value="189" <?php if ($data_team["kode_negara_team"]=="189") echo "selected";?>><?php echo 'Thailand';?></option>
			<option value="190" <?php if ($data_team["kode_negara_team"]=="190") echo "selected";?>><?php echo 'Timor Leste';	?></option>
			<option value="191" <?php if ($data_team["kode_negara_team"]=="191") echo "selected";?>><?php echo 'Togo';?></option>
			<option value="192" <?php if ($data_team["kode_negara_team"]=="192") echo "selected";?>><?php echo 'Tonga';?></option>
			<option value="193" <?php if ($data_team["kode_negara_team"]=="193") echo "selected";?>><?php echo 'Trinidad dan Tobago';	?></option>
			<option value="194" <?php if ($data_team["kode_negara_team"]=="194") echo "selected";?>><?php echo 'Tunisia';?></option>
			<option value="195" <?php if ($data_team["kode_negara_team"]=="195") echo "selected";?>><?php echo 'Turki';?></option>
			<option value="196" <?php if ($data_team["kode_negara_team"]=="196") echo "selected";?>><?php echo 'Turkmenistan';?></option>
			<option value="197" <?php if ($data_team["kode_negara_team"]=="197") echo "selected";?>><?php echo 'Kepulauan Turks dan Caicos';?></option>
			<option value="198" <?php if ($data_team["kode_negara_team"]=="198") echo "selected";?>><?php echo 'Uganda';?></option>
			<option value="199" <?php if ($data_team["kode_negara_team"]=="199") echo "selected";?>><?php echo 'Ukraina';?></option>
			<option value="200" <?php if ($data_team["kode_negara_team"]=="200") echo "selected";?>><?php echo 'Uni Emirat Arab';?></option>
			<option value="201" <?php if ($data_team["kode_negara_team"]=="201") echo "selected";?>><?php echo 'Uruguay';?></option>
			<option value="202" <?php if ($data_team["kode_negara_team"]=="202") echo "selected";?>><?php echo 'Uzbekistan';?></option>
			<option value="203" <?php if ($data_team["kode_negara_team"]=="203") echo "selected";?>><?php echo 'Vanuatu';?></option>
			<option value="204" <?php if ($data_team["kode_negara_team"]=="204") echo "selected";?>><?php echo 'Venezuela';?></option>
			<option value="205" <?php if ($data_team["kode_negara_team"]=="205") echo "selected";?>><?php echo 'Vietnam';?></option>
			<option value="206" <?php if ($data_team["kode_negara_team"]=="206") echo "selected";?>><?php echo 'Kepulauan Virgin AS';?></option>
			<option value="207" <?php if ($data_team["kode_negara_team"]=="207") echo "selected";?>><?php echo 'Kepulauan Virgin Britania Raya';?></option>
			<option value="208" <?php if ($data_team["kode_negara_team"]=="208") echo "selected";?>><?php echo 'Wales';?></option>
			<option value="209" <?php if ($data_team["kode_negara_team"]=="209") echo "selected";?>><?php echo 'Yaman';?></option>
			<option value="210" <?php if ($data_team["kode_negara_team"]=="210") echo "selected";?>><?php echo 'Yordania';?></option>
			<option value="211" <?php if ($data_team["kode_negara_team"]=="211") echo "selected";?>><?php echo 'Yunani';?></option>
			<option value="212" <?php if ($data_team["kode_negara_team"]=="212") echo "selected";?>><?php echo 'Zambia';?></option>
			<option value="213" <?php if ($data_team["kode_negara_team"]=="213") echo "selected";?>><?php echo 'Zimbabwe';?></option>								
		</select>
	</td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Edit" name="edit"/><input type="reset" value="Reset"/></td>
</tr>
</table>
</form>
<?php
	$nama_team = @$_POST['nama_team'];
	$kode_negara_team = @$_POST['kode_negara_team'];
	$edit = @$_POST['edit'];
if($edit){
		mysqli_query($koneksi, "update team set nama_team = '$nama_team', kode_negara_team = '$kode_negara_team' where id_team='$id_team'") or die (mysqli_error());
	?>	
		<script type="text/javascript">
		alert('EditTeam Berhasil Dimasukkan');
		window.location.href="?page=kategori_kompetisi&id_kategori_kompetisi=<?php echo $data_team['id_kategori_kompetisi'];?>&action=view";
		</script>
	<?php
}
}else{
	header("location: ../index.php");
}?>