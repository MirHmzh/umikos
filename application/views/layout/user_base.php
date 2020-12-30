<!DOCTYPE html>
<html>
<head>
	<title>
		Cari Kos Dekat Kampusmu! | UMIKOS
	</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/leaflet.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css') ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.ico">
</head>
<style type="text/css" media="screen">
	body{
		overflow: hidden;
	}
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
		max-width: 0;
		max-height: 0;
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
		overflow: hidden;
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
	.popup-img{
		max-width: 15em;
	}
	.popup-title{
		margin-bottom: 0;
	}
	.popup{
		border: 0;
	}
	.detil-popup-wrapper{
		height: 100vh;
		width: 100vw;
		position: absolute;
		bottom: -100vh;
		z-index: 3;
		border-radius: 1em 1em 0em 0em;
		overflow: hidden;
		padding: 1em;
		transition-duration: .5s;
		transition-timing-function: cubic-bezier(0,.44,.22,1);
	}
	.detil-popup{
		border-radius: 1em 1em 0em 0em;
	    box-shadow: 3px -3px 16px -5px rgba(0,0,0,0.75);
	    background-color: white;
	    width: 95%;
	    height: 95%;
	    position: absolute;
	    bottom: 0px;
	    margin-left: auto;
	    margin-right: auto;
	    left: 0;
	    right: 0;
	}
	.carousel-wrappers{
		margin-top: 5em;
	}
	.close-popup{
		margin-left: 100%;
	}
	.close-popup-wrapper{
		padding: 1em 3em;
	}
	.detil-kos-wrapper{
		padding: 1em 2em;
	}
	#detil-kos-name-caption{
		font-weight: 900;
    	font-size: 2em;
	}
	.detil-kos-fasilitas-wrapper{
		max-height: 10em;
	    overflow-y: scroll;
	    width: 100%;
	    border: 1px solid;
	    border-radius: 0.3em;
	    padding: 1em;
	}
	.detil-kos-telp-wrapper{
		padding: 1em;
	    float: right;
	    font-size: 1.2em;
	    font-weight: 900;
	}
	.side-menu-outer{
		max-width: 25em;
	}
	#carouselDetilIndekos{
		height: 30em;
	}
	.carousel-item img{
		max-height: 30em;
		object-fit: contain;
	}
	.carousel-kos{
		height: 30em;
	}
	.carousel-item{
		position: relative;
		height: 30em;
		margin: auto;
	}
	.carousel-item img{
		position: absolute;
		margin: auto;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		max-width: 100%;
	}
	.carousel-control-next, .carousel-control-prev{
		color: black;
	}
</style>
<body>
	<div id="main_map">

	</div>
	<div class="container">
		<div class="kampus-wrapper">
			<!-- Default dropup button -->
			<div class="btn-group dropup">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Universitas Muhammadiyah Sidoarjo Kampus 1
				</button>
				<div class="dropdown-menu">
			    	<?php foreach ($kampus as $k => $v): ?>
			    		<button class="dropdown-item <?= $k == 0 ? 'active' : ''?>" type="button" data-lat="<?= $v->lat_kampus ?>" data-lng="<?= $v->lng_kampus ?>"><?= $v->nama_kampus ?></button>
			    	<?php endforeach ?>
			    	<!-- <button class="dropdown-item active" type="button">Universitas Muhammadiyah Sidoarjo Kampus 1</button>
				    <button class="dropdown-item" type="button">Universitas Muhammadiyah Sidoarjo Kampus 2</button>
				    <button class="dropdown-item" type="button">Universitas Muhammadiyah Sidoarjo Kampus 3</button>
				    <button class="dropdown-item" type="button">Universitas NU Sidoarjo</button> -->
				</div>
			</div>
		</div>
		<div class="search-wrapper">
			<form class="form-inline my-2 my-lg-0">
		    	<input class="form-control mr-sm-2" id="cari_kos" type="search" placeholder="Cari Kos atau Alamatmu!" aria-label="Cari Kos atau Alamatmu!">
		    </form>
		</div>
		<a href="<?= base_url('main') ?>" title="">
			<span class="owner-wrapper">Owner Kos?</span>
		</a>
	</div>
	<div class="side-menu">
		<div class="row side-menu-outer">
			<div class="col side-menu-grabber-wrapper">
				<span class="side-menu-grabber">
					<i class="fas fa-chevron-left"></i>
				</span>
			</div>
			<div class="col side-menu-content-wrapper">
				<div class="side-menu-content-inner">
					<form id="formFilter">
						<div class="custom-control custom-switch">
							<input type="checkbox" name="f_ac" value="1" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">AC</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="f_km" value="1" class="custom-control-input" id="customSwitch2">
							<label class="custom-control-label" for="customSwitch2">KM Dalam</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="f_listrik" value="1" class="custom-control-input" id="customSwitch3">
							<label class="custom-control-label" for="customSwitch3">Listik Include</label>
						</div>
						<div class="row">
		                    <div class="col-md-4 pr-1">
		                        <div class="custom-control custom-radio">
		                          <input type="radio" value="1" id="radio-laki" name="f_gender" class="custom-control-input">
		                          <label class="custom-control-label" for="radio-laki">Laki-laki</label>
		                        </div>
		                    </div>
		                    <div class="col-md-4 pl-1">
		                        <div class="custom-control custom-radio">
		                          <input type="radio" value="2" id="radio-perempuan" name="f_gender" class="custom-control-input">
		                          <label class="custom-control-label" for="radio-perempuan">Perempuan</label>
		                        </div>
		                    </div>
		                    <div class="col-md-4 pl-1">
		                        <div class="custom-control custom-radio">
		                          <input type="radio" value="3" id="radio-pasutri" name="f_gender" class="custom-control-input">
		                          <label class="custom-control-label" for="radio-pasutri">Pasutri</label>
		                        </div>
		                    </div>
		                </div>
		                <div class="fasilitas-tambahan-wrapper">
		                    <div class="row" data-fasilitas-wrapper="00f000">
		                        <div class="col-md-10 pr-1">
		                            <div class="form-group">
		                                <input type="text" name="f_tambahan_desc[]" class="form-control" placeholder="Fasilitas Tambahan">
		                            </div>
		                        </div>
		                        <div class="col-md-2 pl-1">
		                            <div class="form-group">
		                                <button class="btn btn-danger btn-fill pull-right remove_fasilitas" onClick="removeFasilitas('00f000')">
		                                    <i class="fas fa-times"></i>
		                                </button>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="form-group">
		                            <button class="btn btn-primary btn-fill" id="add_fasilitas">
		                                <i class="fas fa-plus"></i>
		                            </button>
		                        </div>
		                    </div>
		                </div>
						<label for="radiusKampus">Jarak dari kampus <span id="valueRadius">500</span> (m)</label>
						<input type="range" name="radius" class="custom-range" min="10" max="7000" step="10" value="500" id="radiusKampus">
						<button type="button" id="filterBtn" class="btn btn-primary">Filter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="detil-popup-wrapper">
		<div class="detil-popup">
			<div class="row">
				<div class="col-8" style="border-right: 1px solid grey;">
					<div class="carousel-wrappers">
					   <div id="carouselDetilIndekos" class="carousel slide" data-interval="false">
						  <!-- <ol class="carousel-indicators">
						    <li data-target="#carouselDetilIndekos" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselDetilIndekos" data-slide-to="1"></li>
						    <li data-target="#carouselDetilIndekos" data-slide-to="2"></li>
						  </ol> -->
						  <div class="carousel-inner carousel-kos">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="<?= base_url('assets/img/kosabcd.jpeg') ?>" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?= base_url('assets/img/kosabcd.jpeg') ?>" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?= base_url('assets/img/kosabcd.jpeg') ?>" alt="Third slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselDetilIndekos" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselDetilIndekos" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true">
						    	<i class="fas fa-chevron-right"></i>
						    </span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="row close-popup-wrapper">
						<i class="fas fa-times close-popup"></i>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="detil-kos-wrapper">
								<div class="row detil-kos-name">
									<span id="detil-kos-name-caption">Kos Bougenville</span>
								</div>
								<hr>
								<div class="row">
									<table class="table table-sm table-borderless table-info-kos">
									  <tbody>
									    <tr>
									      <td>Alamat</td>
									      <td>: Jl. Mandala 418 Semambung Gedangan Sidoarjo</td>
									    </tr>
									    <tr>
									      <td>Tarif</td>
									      <td>: Rp. 200.000,-</td>
									    </tr>
									    <tr>
									      <td>Gender</td>
									      <td>: Laki-laki</td>
									    </tr>
									    <tr>
									      <td>Lebar</td>
									      <td>: 2m</td>
									    </tr>
									    <tr>
									      <td>Panjang</td>
									      <td>: 3m</td>
									    </tr>
									  </tbody>
									</table>
								</div>
								<span style="font-weight: 900;">Fasilitas</span>
								<div class="row">
									<div class="detil-kos-fasilitas-wrapper">
										<div class="detil-kos-fasilitas">
											<table class="table table-sm table-borderless table-fasilitas-kos">
											  <tbody>
											    <tr>
											      <td>KM Dalam</td>
											      <td>Ya</td>
											    </tr>
											    <tr>
											      <td>Listrik</td>
											      <td>Ya</td>
											    </tr>
											    <tr>
											      <td>AC</td>
											      <td>Ya</td>
											    </tr>
											    <tr>
											      <td>Makan</td>
											      <td>Ya</td>
											    </tr>
											    <tr>
											      <td>Minum</td>
											      <td>Ya</td>
											    </tr>
											  </tbody>
											</table>
										</div>
									</div>
								</div>
								<br>
								<div class="row detil-kos-telp-wrapper">
									Contact : &nbsp;
									<span id="detil-kos-owner">
										Lekjon
									</span>
									&nbsp;@&nbsp;
									<span id="detil-kos-telp">
										082257228502
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/bootstrap4.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/core/leaflet.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>assets/js/core/sidoarjo_border.js"></script>
<script type="text/javascript" charset="utf-8">
	var mymap = L.map('main_map').setView([-7.4667543241513785, 112.71683491492696], 15);
	L.geoJSON(sidoarjo_border, {
		style : {
			color : 'blue',
			weight : 4,
			fillOpacity: 0,
		}
	}).addTo(mymap);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
	let layerGroup = L.layerGroup().addTo(mymap);
	let kampusIcon = L.icon({
		iconUrl : "<?= base_url('pin.png') ?>",
		iconSize:     [41, 41],
	});
	let kampusmarker = L.marker([-7.4667543241513785, 112.71683491492696], {icon:kampusIcon}).addTo(mymap);
	let radius = L.circle([-7.4667543241513785, 112.71683491492696], {
	    color: 'blue',
	    fillColor: 'blue',
	    weight: 0,
	    fillOpacity: 0.4,
	    radius: 500
	}).addTo(mymap);
	let menu = true;
	$(document).ready(function() {
		// document.querySelector(".leaflet-popup-pane").addEventListener("load", function (event) {
		//   	var tagName = event.target.tagName,
		//     	popup = mymap._popup; // Currently open popup, if any.

		//   	if (tagName === "IMG" && popup) {
		//     	popup.update();
		//   	}
		// }, true);
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

	function clickMap(e) {
		console.log(e.latlng.lat+' '+e.latlng.lng);
	}

	mymap.on('click', clickMap);

	$('#cari_kos').on('input', () => {
		layerGroup.clearLayers();
		let query = $('#cari_kos').val();
		$.post("<?= base_url('landing/search') ?>", {query: query}, function(data, textStatus, xhr) {
			console.log(data);
			$.each(data.data, function(i, v) {
				let marker = L.marker([v.lat_kos, v.lng_kos]);
				let popup = `
					<div class="card popup" style="width: 15rem;">
					  <img class="card-img-top" src="<?= base_url('imgkos/') ?>${JSON.parse(data.data[i].attachment)[0]}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title popup-title">${data.data[i].nama_kos}</h5>
					    	<table class="card-text">
								<tr>
									<td>Gender</td>
									<td>: ${data.data[i].f_gender == 1 ? 'Laki-laki' : (data.data[i].f_gender == 2 ? 'Perempuan' : 'Pasutri')}</td>
								</tr>
								<tr>
									<td>Tarif</td>
									<td>: Rp. ${data.data[i].tarif_kos},-</td>
								</tr>
							</table>
					    <a href="#" class="btn btn-primary detil-popup-btn" style="color: white;" onClick="detilKos('${data.data[i].id_kos}')" data-id="${data.data[i].id_kos}"><i class="fas fa-search"></i></a>
					  </div>
					</div>
				`;
				marker.bindPopup(popup).openPopup();
				layerGroup.addLayer(marker);
			});
			var overlay = {'markers': layerGroup};
			L.control.layers(null, overlay).addTo(mymap);
		}, 'json');
	});
	$('.dropdown-item').click((e) => {
		let lng = $(e.target).attr('data-lng');
		let lat = $(e.target).attr('data-lat');
		$('.dropdown-item').removeClass('active');
		$(e.target).addClass('active');
		mymap.removeLayer(radius);
		mymap.removeLayer(kampusmarker);
		radius = L.circle([lat, lng], {
		    color: 'blue',
		    fillColor: 'blue',
		    fillOpacity: 0.4,
		    weight: 0,
		    radius: 500
		}).addTo(mymap);
		mymap.panTo(new L.LatLng(lat, lng));
		kampusmarker = L.marker([lat, lng], {icon:kampusIcon}).addTo(mymap);
		$('.dropdown-toggle').text($(e.target).text());
	});
	$('#radiusKampus').change((e) => {
		$('#valueRadius').text($('#radiusKampus').val());
	});
	$('#add_fasilitas').click((e) => {
        e.preventDefault();
        let date = new Date(),
            f_unique = date.getUTCSeconds()+'f'+date.getUTCMilliseconds(),
            fasilitas = `
                <div class="row" data-fasilitas-wrapper="${f_unique}">
                    <div class="col-md-10 pr-1">
                        <div class="form-group">
                            <input type="text" name="f_tambahan_desc[]" class="form-control" placeholder="Fasilitas Tambahan">
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <button class="btn btn-danger btn-fill pull-right remove_fasilitas" onClick="removeFasilitas('${f_unique}')">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
             `;
        $('.fasilitas-tambahan-wrapper').append(fasilitas);
    });
    $('#filterBtn').click(() => {
    	let formData = $('#formFilter').serializeArray();
    	let lng = $('.dropdown-item.active').attr('data-lng');
    	let lat = $('.dropdown-item.active').attr('data-lat');
    	formData.push({name: 'lng', value: kampusmarker._latlng.lng});
    	formData.push({name: 'lat', value: kampusmarker._latlng.lat});
    	mymap.removeLayer(radius);
    	layerGroup.clearLayers();
    	radius = L.circle([lat, lng], {
		    color: 'blue',
		    fillColor: 'blue',
		    fillOpacity: 0.4,
		    weight: 0,
		    radius: $('#radiusKampus').val()
		}).addTo(mymap);
    	$.ajax({
    		url: 'landing/filter',
    		type: 'POST',
    		dataType: 'json',
    		data: formData,
    		success : (data) => {
    			console.log(data);
				// $.each(data.data, function(i, v) {
				// 	let marker = L.marker([v.lat_kos, v.lng_kos]);
				// 	layerGroup.addLayer(marker);
				// });
				$.each(data.data, function(i, v) {
					let marker = L.marker([v.lat_kos, v.lng_kos]);
					let popup = `
						<div class="card popup" style="width: 15rem;">
						  <img class="card-img-top" src="<?= base_url('imgkos/') ?>${JSON.parse(data.data[i].attachment)[0]}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title popup-title">${data.data[i].nama_kos}</h5>
						    	<table class="card-text">
									<tr>
										<td>Gender</td>
										<td>: ${data.data[i].f_gender == 1 ? 'Laki-laki' : (data.data[i].f_gender == 2 ? 'Perempuan' : 'Pasutri')}</td>
									</tr>
									<tr>
										<td>Tarif</td>
										<td>: Rp. ${data.data[i].tarif_kos},-</td>
									</tr>
								</table>
						    <a href="#" class="btn btn-primary detil-popup-btn" style="color: white;" onClick="detilKos('${data.data[i].id_kos}')" data-id="${data.data[i].id_kos}"><i class="fas fa-search"></i></a>
						  </div>
						</div>
					`;
					marker.bindPopup(popup).openPopup();
					layerGroup.addLayer(marker);
				});
				var overlay = {'markers': layerGroup};
				L.control.layers(null, overlay).addTo(mymap);
    		},
    	});

    });

    $('.close-popup').click(() => {
    	$('.detil-popup-wrapper').css({ bottom: '-100vh' });
    });

    function detilKos(id) {
    	$('.detil-popup-wrapper').css({ bottom: '0vh' });
    	$.ajax({
    		url: 'Landing/get_kos/'+id,
    		type: 'GET',
    		dataType: 'json',
    		success : (data) => {
    			let table_info_kos = `
    				<tr>
				      <td>Alamat</td>
				      <td>: ${data.alamat_kos}</td>
				    </tr>
				    <tr>
				      <td>Tarif</td>
				      <td>: Rp. ${data.tarif_kos},-</td>
				    </tr>
				    <tr>
				      <td>Gender</td>
				      <td>: ${data.f_gender == 1 ? 'Laki-laki' : (data.f_gender == 2 ? 'Perempuan' : 'Pasutri')}</td>
				    </tr>
				    <tr>
				      <td>Lebar</td>
				      <td>: ${data.lebar_kos}m</td>
				    </tr>
				    <tr>
				      <td>Panjang</td>
				      <td>: ${data.panjang_kos}m</td>
				    </tr>
    			`;
    			$('.table-info-kos tbody').html(table_info_kos);
    			let fasilitas = `
    				<tr>
				      <td>KM Dalam</td>
				      <td>${data.f_kamar_mandi == 1 ? 'Ya' : 'Tidak'}</td>
				    </tr>
				    <tr>
				      <td>Listrik</td>
				      <td>${data.f_listrik == 1 ? 'Ya' : 'Tidak'}</td>
				    </tr>
				    <tr>
				      <td>AC</td>
				      <td>${data.f_ac == 1 ? 'Ya' : 'Tidak'}</td>
				    </tr>
    			`;
    			let carousel = '';
    			let carousel_data = JSON.parse(data.attachment);
    			let inc = 0;
    			carousel_data.forEach((i, v) => {
    				carousel += `
    					<div class="carousel-item ${inc == 0 ? 'active' : ''} ${i}">
					      <img class="d-block" src="<?= base_url('imgkos/') ?>${i}">
					    </div>
    				`;
    				inc++;
    			});
    			$('.carousel-kos').html(carousel);
    			let f_lain = JSON.parse(data.f_lain);
    			console.log(f_lain);
    			f_lain.forEach((i, v) => {
    				let f_name;
    				for (idx in f_lain[v]){ f_name = idx };
    				fasilitas += `
    					<tr>
					      <td>${f_name}</td>
					      <td>${f_lain[v][`${f_name}`]}</td>
					    </tr>
    				`;
    			});
    			$('.table-fasilitas-kos tbody').html(fasilitas);
    			$('#detil-kos-name-caption').text(data.nama_kos);
    			$('#detil-kos-owner').html(data.nama_pemilik);
    			$('#detil-kos-telp').html(data.notelp_pemilik);
    		},
    	});
    }

    function removeFasilitas(el){
        console.log(el);
        $('div[data-fasilitas-wrapper="'+el+'"]').remove();
    }
</script>
</html>

