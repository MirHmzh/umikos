<style type="text/css" media="screen">
    #kampus-map{
        width: 100%;
        height: 25em;
    }
    .dropzone{
        border: none !important;
        background: none;
        padding: 0;
    }
    .dropzone .dz-preview .dz-remove{
        background: #dc3545;
        text-decoration: none;
    }
    .dropzone .dz-preview .dz-remove:hover{
        color: white;
        text-decoration: none;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form id="dropzone" class="form_kampus" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Kampus</label>
                            <input type="text" name="nama_kampus" class="form-control" value="<?= isset($kampus) ? $kampus->nama_kampus : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat Kampus</label>
                            <textarea rows="2" name="alamat_kampus" cols="80" class="form-control"><?= isset($kampus) ? $kampus->alamat_kampus : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        Lokasi
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="kampus-map">

                        </div>
                    </div>
                </div>
                <br>
                <button id="save_kampus" class="btn btn-info btn-fill pull-right">Save</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    let global_lat = "<?= isset($kampus) ? $kampus->lat_kampus : '' ?>";
    let global_lng = "<?= isset($kampus) ? $kampus->lng_kampus : '' ?>";
    let kampus_marker;
    var mymap = L.map('kampus-map').setView([-7.446441141902094, 112.71884192158748], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
    function removeFasilitas(el){
        console.log(el);
        $('div[data-fasilitas-wrapper="'+el+'"]').remove();
    }
    function clickMap(e) {
        global_lat = e.latlng.lat;
        global_lng = e.latlng.lng;
        if(kampus_marker) { mymap.removeLayer(kampus_marker); }
        kampus_marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
    }
    mymap.on('click', clickMap);

    $('#save_kampus').click((e) => {
        e.preventDefault();
        Swal.fire({
          title: 'Menyimpan',
          text: 'Sedang memproses permintaan Anda',
          showConfirmButton: false,
          allowOutsideClick: false,
          onBeforeOpen: () => {
            Swal.showLoading()
        },
    });
        let form_data = $('.form_kampus').serializeArray();
        form_data.push({name: 'lng_kampus', value: global_lng});
        form_data.push({name: 'lat_kampus', value: global_lat});

        $.ajax({
            url: "<?= base_url('admin/save_kampus/'.(isset($id_kampus) ? $id_kampus : '')) ?>",
            type: 'POST',
            data: form_data,
            success: (data) => {
                Swal.close();
                Swal.fire({
                  title: 'Sukses',
                  text: 'Data Anda telah disimpan',
                  icon: 'success',
                  timer: 2000,
              }).then((result) => {
                  window.location = "<?= base_url('admin/kampus') ?>";
                  if (result.dismiss === Swal.DismissReason.timer) {
                    window.location = "<?= base_url('admin/kampus') ?>";
                }
            })
          },
      });
    });

    $(document).ready(function() {
        <?php if((isset($kos->lat_kampus) && $kampus->lat_kampus != null) || (isset($kampus->lng_kampus) && $kampus->lng_kampus != null)){ ?>
            kampus_marker = L.marker([<?= $kampus->lat_kampus ?>, <?= $kampus->lng_kampus ?>]).addTo(mymap);
            mymap.panTo(new L.LatLng(<?= $kampus->lat_kampus ?>, <?= $kampus->lng_kampus ?>));
        <?php } ?>
    });
</script>