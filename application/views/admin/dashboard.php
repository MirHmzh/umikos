<style type="text/css">
	#dash-map{
		width: 100%;
		height: 30em;
	}
	.dash-info .card{
		border-radius: 0;
	}
	.dash-info .card-title{
		font-weight: 900;
	}
	.dash-info .card-body{
		text-align: right;border-top: 1px solid rgba(255,255,255,1);
	}
	.dash-info .card{
		background-color: #007bff;
		max-width: 100% !important;
	}
	.dash-info .card-header{
		background-color: #007bff;
		color: white;
	}
	.dash-info .card-title{
		color: white;
	}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        	<h4 style="margin: 0">Sebaran Indekos Sidoarjo</h4>
        	<div id="dash-map">

            </div>
            <br>
            <div class="row">
            	<div class="col-md-4 dash-info">
            		<div class="card" style="max-width: 18rem;">
					  <div class="card-header">Kampus Terdaftar</div>
					  <div class="card-body">
					    <h2 class="card-title"><?= $kampus_terdaftar ?></h2>
					  </div>
					</div>
            	</div>
            	<div class="col-md-4 dash-info">
            		<div class="card" style="max-width: 18rem;">
					  <div class="card-header">Indekos Terdaftar</div>
					  <div class="card-body">
					    <h2 class="card-title"><?= $indekos_terdaftar ?></h2>
					  </div>
					</div>
            	</div>
            	<div class="col-md-4 dash-info">
					<div class="card" style="max-width: 18rem;">
					  <div class="card-header">Owner Terdaftar</div>
					  <div class="card-body">
					    <h2 class="card-title"><?= $owner_terdaftar ?></h2>
					  </div>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/core/sidoarjo_border.js"></script>
<script type="text/javascript" charset="utf-8">
	// let layerGroup = L.layerGroup().addTo(mymap);
	var mymap = L.map('dash-map').setView([ -7.43291,112.76820], 11);
	 L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
	L.geoJSON(sidoarjo_border, {
		style : {
			color : 'blue',
			weight : 4,
			fillOpacity: 0.1,
		}
	}).addTo(mymap);
	$.post("<?= base_url('admin/get_indekos_dash') ?>", function(data, textStatus, xhr) {
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
				    <a href="#" class="btn btn-primary btn-fill detil-popup-btn" onClick="detilKos('${data.data[i].id_kos}')" data-id="${data.data[i].id_kos}"><i class="nc-icon nc-settings-gear-64"></i></a>
				  </div>
				</div>
			`;
			marker.bindPopup(popup).addTo(mymap);
		});
	}, 'json');

	function detilKos(id) {
		window.location = "<?= base_url('admin/form_kos/') ?>"+id
	}
</script>