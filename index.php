<?php

/**
* @package : MD5 Crack & Hashing
* @author : Raden JecXploiter <-- nitip nama kalo mau share script Hhe..
* @link : http://sd-sec.my.id
* @copyright : SD-SecTeam <-- Padahal Grup cuman 1 orang :v gw doang xixixi.
* @license : under MIT (https://github.com/JecXploiter/md5cracking/blob/main/LICENSE)
*/

error_reporting(0); // berhenti menampilkan pesan Error
  if (isset($_POST['crack'])) {
  	$md5 = htmlspecialchars($_POST['md5']); // mencegah user menginput karakter khusus html
  	$md5crack = file_get_contents('http://www.nitrxgen.net/md5db/'.$md5.'.txt'); // mengambil hasil crack MD5 dari nitrxgen

  	if ($md5crack == "") {
  		// jika tidak ada hasil maka...
  		$hasilcrack = '
  		         <div class="form-group">
					<input type="text" class="form-control result-danger text-danger" id="md5crack" value="Gagal Om!" readonly>
				    <small class="form-text text-muted">Hasil dari : <span class="text-danger">'.$md5.'</span></small>
				  </div>';
  	}else{
  		// jika ada maka...
  		$hasilcrack = '
  		         <div class="form-group">
				  	<div class="input-group">
					  <input type="text" class="form-control result-success text-success" id="hasilcrack" value="'.$md5crack.'" readonly>
				      <div class="input-group-append">
					    <button class="btn btn-outline-success" onclick="copyhasil()">Copy</button>
					  </div>
					</div>
				    <small class="form-text text-muted">Hasil dari : <span class="text-success">'.$md5.'</span></small>
				  </div>';
  	}
  }
  if (isset($_POST['hash'])) {
  	$md5hash = md5($_POST['md5hash']); // Konversi Text ke MD5
  	$hasilmd5 = '
  	             <div class="form-group">
				  	<div class="input-group">
					  <input type="text" class="form-control result-success text-success" id="hasilmd5" value="'.$md5hash.'" readonly>
				      <div class="input-group-append">
					    <button class="btn btn-outline-success" onclick="copymd5()">Copy</button>
					  </div>
					</div>
				    <small class="form-text text-muted">Hasil dari : <span class="text-success">'.htmlspecialchars($_POST['md5hash']).'</span></small>
				  </div>';
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>MD5 Tools</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		body {
			padding: 20px;
			background: #bfbfbf;
		}
		::-webkit-scrollbar {
		    width: 7px;
		}
		::-webkit-scrollbar-track {
		    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);     
		    background: #666;    
		}
		::-webkit-scrollbar-thumb {
		    background: #343a40;
		}
		.bs {
			box-shadow: 0 15px 20px rgb(0 0 0 / 25%);
		}
		.form-control:focus {
			border-color: #343a40 !important;
			box-shadow: 0 15px 20px rgb(0 0 0 / 25%);
		}
		.btn-dark:hover, .btn-dark:focus, .btn-outline-success:hover{
			border: 1px solid #343a40 !important;
			box-shadow: 0 15px 20px rgb(0 0 0 / 25%);
		}
		.result-success, .result-success:focus{
			border-color: #28a745 !important;
			box-shadow: 0 15px 20px rgb(0 0 0 / 25%);
		}
		.result-danger, .result-danger:focus{
			border-color: #dc3545 !important;
			box-shadow: 0 15px 20px rgb(0 0 0 / 25%);
		}
		 
	</style>
</head>
<body>
	<div class="row">
		<div class="col-sm-6">
		   <div class="card border-dark bs mb-4">
			  <div class="card-header bg-dark">
			    <h5 class="text-light mb-0">MD5 CRACK</h5>
			  </div>
			  <div class="card card-body bg-light">
			    <form method="post">
				  <div class="form-group">
				    <label for="md5crack">MD5 HASH</label>
				    <input type="text" class="form-control" id="md5crack" name="md5" placeholder="Tulis Sesuatu" autocomplete="off" required>
				    <small class="form-text text-muted">Co. 54ca719ab0dd44a736a6d9c298543199</small>
				  </div>
				  <?= $hasilcrack ?>
				   <div class="text-center">
				     <input type="submit" class="btn btn-dark w-100" name="crack" value="Crack">
				   </div>
				</form>
			  </div>
		  </div>
		</div>
		<div class="col-sm-6">
		   <div class="card border-dark bs mb-4">
			  <div class="card-header bg-dark">
			    <h5 class="text-light mb-0">MD5 HASHING</h5>
			  </div>
			  <div class="card card-body bg-light">
			    <form method="post">
				  <div class="form-group">
				    <label for="md5hash">TEXT</label>
				    <input type="text" class="form-control" id="md5hash" name="md5hash" placeholder="Tulis Sesuatu" autocomplete="off" required>
				    <small class="form-text text-muted">Co. 12345</small>
				  </div>
				  <?= $hasilmd5 ?>
				   <div class="text-center">
				     <input type="submit" class="btn btn-dark w-100" name="hash" value="Hash">
				   </div>
				</form>
			  </div>
		  </div>
		</div>
		<div class="col-sm-12">
		   <div class="card border-dark bs mb-4">
			  <div class="card card-body bg-light">
			  	<h4 class="card-title">Info Tools</h4>
				  <p>Tools ini dibuat dengan cara yang sangat sederhana MD5 Crack dengan API dari <a href="http://www.nitrxgen.net/" target="blank">Nitrxgen</a>. dan saat ini mereka memiliki database yang berisi 1.1+ Triliun Password, jadi Anda tidak memerlukan kumpulan Password atau Worldlist untuk meng-crack MD5 dan Anda juga dapat melihat secara langsung Password MD5 yang baru saja di temukan disana. </p>
				  <h4 class="card-title mb-0">Donation</h4>
				  <small class="text-muted mb-3">Yang sedikit bagi Anda sangat berarti banyak bagi Saya</small>
				  <p>Dana/Gopay/Pulsa : <span class="text-primary">083820979882</span><br>Atau : <a href="https://saweria.co/jecangel" target="blank">https://saweria.co/jecangel</a></p>
				  <p>Bila Ada pertanyaan silahkan Hubungi : <a href="https://wa.me/13312147730" target="blank">Whatsapp</a> / <a href="https://facebook.com/yunus.zombies.7" target="blank">Facebook</a></p>
			  </div>
		  </div>
		</div>
		<div class="col-sm-12">
			<div class="card border-dark bs mb-4">
				<div class="card card-body bg-dark p-2 text-center">
					<p class="text-light mb-0">Made with <span class="text-danger">&#9829;</span> Raden JecXploiter</p>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	  function copyhasil() {
		  var hasilcrack = document.getElementById("hasilcrack");
		  hasilcrack.select();
		  document.execCommand("copy");
		  alert("Teks Berhasil Disalin: " + hasilcrack.value);
		}
	  function copymd5() {
		  var hasilmd5 = document.getElementById("hasilmd5");
		  hasilmd5.select();
		  document.execCommand("copy");
		  alert("Teks Berhasil Disalin: " + hasilmd5.value);
		}
	</script>
</body>
</html>
