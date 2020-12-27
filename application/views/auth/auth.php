<!DOCTYPE html>
<html>
<head>
	<title>
		Cari Kos Dekat Kampusmu! | UMIKOS
	</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/leaflet.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css') ?>">
</head>
<style type="text/css" media="screen">
	body {
	  display: -ms-flexbox;
	  display: flex;
	  -ms-flex-align: center;
	  align-items: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}

	.form-signin {
	  width: 100%;
	  max-width: 20em;
	  padding: 15px;
	  margin: auto;
	  position: relative;
	}

	.signin-wrapper{
		position: absolute;
		top: 0;
		width: 20em;
	}

	.signup-wrapper{
		position: absolute;
		top: 0;
		width: 20em;
	}

	.signup-wrapper{
		display: none;
	}
</style>
<body>
	<form class="form-signin">
		  	<div class="signin-wrapper">
		  		<div class="form-group">
			    	<input type="email" name="email_login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
			  	</div>
			  	<div class="form-group">
			    	<input type="password" name="password_login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
			  	</div>
			  	<div class="form-group">
			    	<small>Belum punya akun? <a href="#" class="badge badge-success" id="switch-signup">Daftar</a></small>
			  	</div>
			  	<button class="btn btn-primary" id="btn_masuk">Masuk</button>
		  	</div>

		  	<div class="signup-wrapper">
		  		<div class="form-group">
			    	<input type="text" name="nama_pemilik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
			  	</div>
			  	<div class="form-group">
			    	<input type="text" name="notelp_pemilik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No. Telp">
			  	</div>
			  	<div class="form-group">
			    	<textarea name="alamat_pemilik" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"></textarea>
			  	</div>
			  	<div class="form-group">
			    	<input name="email_register" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
			  	</div>
			  	<div class="form-group">
			    	<input type="password" name="password_register" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
			  	</div>
			  	<div class="form-group">
			    	<small>Sudah punya akun? <a href="#" class="badge badge-primary" id="switch-signin">Masuk</a></small>
			  	</div>
			  	<button class="btn btn-primary" id="btn_daftar">Daftar</button>
		  	</div>
	</form>
</body>
<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/bootstrap4.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/sweetalert.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#switch-signup').click(() => {
			$('.signup-wrapper').fadeIn('fast', () => {
				$('.signin-wrapper').fadeOut('fast');
			});
		});
		$('#switch-signin').click(() => {
			$('.signin-wrapper').fadeIn('fast', () => {
				$('.signup-wrapper').fadeOut('fast');
			});
		});
		$('#btn_daftar').click((e) => {
			e.preventDefault();
			$.post("<?= base_url('Auth/register_process') ?>", $('.form-signin').serializeArray(), function(data, textStatus, xhr) {
				Swal.fire('Sukses', 'Selamat Anda telah terdaftar!','success');
				$('#switch-signin').click();
			}, 'json');
		});
		$('#btn_masuk').click((e) => {
			e.preventDefault();
			$.post("<?= base_url('Auth/login_process') ?>", {email: $('input[name="email_login"]').val(), password : $('input[name="password_login"]').val()}, function(data, textStatus, xhr) {
				if(data.length != 1){
					Swal.fire('Perhatian', 'Pengguna tidak ditemukan','warning');
				}else{
					if(data.data.role == 1){
						window.location = "<?= base_url('admin') ?>";
					}else if(data.data.role == 2){
						window.location = "<?= base_url('main') ?>";
					}
				}
			}, 'json');
		});
	});
</script>
</html>