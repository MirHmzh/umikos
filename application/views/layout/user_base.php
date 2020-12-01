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
	#main_map{
		height: 100vh;
		width: 100vw;
		z-index: 1;
	}
	.kampus-wrapper{
		position: absolute;
		bottom: 2em;
		left: 3.5em;
		z-index: 1;
	}
	.search-wrapper{
		position: absolute;
		top: 1em;
		left: 3.5em;
		padding: 0.2em;
		background-color: white;
		z-index: 1;
	}
	.search-wrapper form input{
		width: 25em !important;
	}
	.side-menu{
		position: absolute;
		top: 3.5em;
		right: 0;
		z-index: 1;
		transition-duration: 0.5s;
		transition-timing-function: cubic-bezier(0.000, 0.000, 0.000, 0.995);
	}
	.side-menu-grabber-wrapper{
		padding: 0 !important;
	}
	.side-menu-content-wrapper{
		background-color: white;
		width: 50vw;
		height: 90vh;
	}
	.side-menu-grabber{
		padding: 1em;
		background-color: white;
		font-size: 1.5em;
		border-radius: 0.5em 0em 0em 0.5em;
		float: right;
	}
	.side-menu-content-inner{
		padding: 1em;
		height: 90vh;
		overflow: scroll;
	}
	.owner-wrapper{
		position: absolute;
	    top: 0;
	    right: 1em;
	    z-index: 2;
	    background: white;
	    padding: 0.5em 1em;
	    border-radius: 0em 0em 0.5em 0.5em;
	    cursor: pointer;
	}
</style>
<body>
	<div id="main_map">

	</div>
	<div class="container">
		<div class="kampus-wrapper">
			<!-- Default dropup button -->
			<div class="btn-group dropup">
				<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Universitas Muhammadiyah Sidoarjo Kampus 1
				</button>
				<div class="dropdown-menu">
			    	<button class="dropdown-item active" type="button">Universitas Muhammadiyah Sidoarjo Kampus 1</button>
				    <button class="dropdown-item" type="button">Universitas Muhammadiyah Sidoarjo Kampus 2</button>
				    <button class="dropdown-item" type="button">Universitas Muhammadiyah Sidoarjo Kampus 3</button>
				    <button class="dropdown-item" type="button">Universitas NU Sidoarjo</button>
				</div>
			</div>
		</div>
		<div class="search-wrapper">
			<form class="form-inline my-2 my-lg-0">
		    	<input class="form-control mr-sm-2" type="search" placeholder="Cari Kos atau Alamatmu!" aria-label="Cari Kos atau Alamatmu!">
		    </form>
		</div>
		<span class="owner-wrapper">Owner Kos?</span>
	</div>
	<div class="side-menu">
		<div class="row">
			<div class="col side-menu-grabber-wrapper">
				<span class="side-menu-grabber">
					<i class="fas fa-chevron-left"></i>
				</span>
			</div>
			<div class="col side-menu-content-wrapper">
				<div class="side-menu-content-inner">
					<form>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div><div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Listik Include</label>
						</div>
						<label for="customRange2">Jarak dari kampus (m)</label>
						<input type="range" class="custom-range" min="10" max="7000" step="10" id="customRange2">
						<button type="button" class="btn btn-info">Filter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/bootstrap4.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/leaflet.js') ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	var mymap = L.map('main_map').setView([-7.446441141902094, 112.71884192158748], 15);
	 L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
	let menu = true;
	$(document).ready(function() {
		$('.side-menu-grabber').click(() => {
			let side_menu_content_wrapper_w = $('.side-menu-content-wrapper').outerWidth();
			// let side_menu_content_wrapper_css = $('.side-menu-content-wrapper').css();
			// console.log(side_menu_content_wrapper_css);
			console.log(side_menu_content_wrapper_w);
			$('.side-menu').css({
				right: (menu ? '-'+side_menu_content_wrapper_w+'px' : 0),
			});
			menu = menu ? false : true;
		});
	});
</script>
</html>