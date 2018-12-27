<?php  	    	  
$jenis = @$_POST['jenis'];
$inputan_pencarian=@$_GET['cari'];
if($inputan_pencarian !=""){
	echo "<title>pencarian : $inputan_pencarian | Berita Sepakbola</title>";
}else{
	$page = @$_GET['page'];	
	$id_kategori_berita= @$_GET['id_kategori_berita'];
	$id_berita= @$_GET['id_berita'];
	$id_forum= @$_GET['id_forum'];
	$id_komentar= @$_GET['id_komentar'];
	$id_kategori_kompetisi= @$_GET['id_kategori_kompetisi'];
	$id_kompetisi= @$_GET['id_kompetisi'];
	$action = @$_GET['action'];
	$datakategori_berita = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_berita where id_kategori_berita = '$id_kategori_berita'"));
	$databerita = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita where id_berita = '$id_berita'"));
	$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "select * from forum where id_forum = '$id_forum' and id_balasan is NULL"));
	$datakategori_kompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_kompetisi where id_kategori_kompetisi= '$id_kategori_kompetisi'"));
	$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kompetisi where id_kompetisi = '$id_kompetisi'"));
	if($page == "berita"){
			if($id_kategori_berita==""&& $id_berita==""){
				echo "<title>Berita Sepakbola</title>";
			}else if($id_kategori_berita==$datakategori_berita['id_kategori_berita']&& $id_berita=="" ){
				echo "<title>Berita Sepakbola $datakategori_berita[nama_kategori_berita]</title>";
			}else if($id_kategori_berita==$databerita['id_kategori_berita'] && $id_berita==$databerita['id_berita']){
				echo "<title>$databerita[judul] | Berita Sepakbola</title>";
			}else{
				echo "<title>Berita Sepakbola</title>";
			}
	}else if($page == "forum"){
		if($id_forum==""){
			if($action ==""){
				echo "<title>Forum | Berita Sepakbola</title>";
			}else if($action == "tambah"){
				echo "<title>Tambah Forum | Berita Sepakbola</title>";
			}
		}else if($id_forum== $dataforum['id_forum']){
			echo "<title>$dataforum[judulforum] | Berita Sepakbola</title>";
		}else{
			echo "<title>Berita Sepakbola</title>";
		}
	}else if($page == "editprofil"){
		echo "<title>Edit Profil | Berita Sepakbola</title>";
	}else if($page == "gantipassword"){
		echo "<title>Ganti Password | Berita Sepakbola</title>";	 
	}else if($page == "editkomentar"){
		if($id_komentar!=""){
			echo "<title>Edit Komentar | Berita Sepakbola</title>";
		}else{
			echo "<title>Berita Sepakbola</title>";
		}
	}else if($page == "editforum"){
		if($id_forum!=""){
			echo "<title>Edit Forum | Berita Sepakbola</title>";
		}else{
			echo "<title>Berita Sepakbola</title>";
		}
	}else if($page == "kompetisi"){
		if($id_kategori_kompetisi == "" && $id_kompetisi == ""){
			echo "<title>Berita Sepakbola</title>";
		}elseif($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi'] && $id_kompetisi == $datakompetisi['id_kompetisi']){
			echo "<title>$datakategori_kompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Berita Sepakbola</title>";
		}else{
			echo "<title>Berita Sepakbola</title>";
		}
	}else if($page == "about"){
		echo "<title>Tentang | Berita Sepakbola</title>";			 
	}else if($page == ""){
		echo "<title>Berita Sepakbola</title>";
	}else{
		echo "<title>Berita Sepakbola</title>";
	}
}
?>
	<link rel="icon" href="icon/iconheader.png">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/main.css"/>			