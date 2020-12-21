<style type="text/css" media="screen">
    #kos-map{
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
            <form id="dropzone" class="form_kos dropzone dz-clickable" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Owner</label>
                            <select name="id_pemilik" id="input" class="form-control">
                                <?php foreach ($pemilik as $i => $v): ?>
                                    <option value="<?= $v->id_pemilik ?>"
                                        <?= isset($kos) ?
                                        ($kos->id_pemilik == $v->id_pemilik ? 'selected' : '') : '' ?>>
                                        <?= $v->nama_pemilik ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Kos</label>
                            <input type="text" name="nama_kos" class="form-control" value="<?= isset($kos->nama_kos) ? $kos->nama_kos : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="2" name="alamat_kos" cols="80" class="form-control"><?= isset($kos->alamat_kos) ? $kos->alamat_kos : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Panjang Kamar (m)</label>
                            <input type="text" name="panjang_kos" class="form-control" value="<?= isset($kos->panjang_kos) ? $kos->panjang_kos : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6 pl-1">
                        <div class="form-group">
                            <label>Lebar Kamar (m)</label>
                            <input type="text" name="lebar_kos" class="form-control" value="<?= isset($kos->lebar_kos) ? $kos->lebar_kos : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Gender
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pr-1">
                        <div class="custom-control custom-radio">
                          <input type="radio" value="1" id="radio-laki" name="f_gender" class="custom-control-input" <?= isset($kos->f_gender) ? ($kos->f_gender == 1 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="radio-laki">Laki-laki</label>
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="custom-control custom-radio">
                          <input type="radio" value="2" id="radio-perempuan" name="f_gender" class="custom-control-input" <?= isset($kos->f_gender) ? ($kos->f_gender == 2 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="radio-perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="custom-control custom-radio">
                          <input type="radio" value="3" id="radio-pasutri" name="f_gender" class="custom-control-input" <?= isset($kos->f_gender) ? ($kos->f_gender == 3 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="radio-pasutri">Pasutri</label>
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
                        <div id="kos-map">

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        Fasilitas
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="f_kamar_mandi" value="1" class="custom-control-input" id="switch-kmdalam" <?= isset($kos->f_kamar_mandi) ? ($kos->f_kamar_mandi == 1 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="switch-kmdalam">KM Dalam</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="f_ac" value="1" class="custom-control-input" id="switch-ac" <?= isset($kos->f_ac) ? ($kos->f_ac == 1 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="switch-ac">AC Kamar</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="f_listrik" value="1" class="custom-control-input" id="switch-listrik" <?= isset($kos->f_listrik) ? ($kos->f_listrik == 1 ? 'checked' : '') : '' ?>>
                          <label class="custom-control-label" for="switch-listrik">Listrik Include</label>
                        </div>
                    </div>
                </div>
                <div class="fasilitas-tambahan-wrapper">
                    <?php foreach ($f_lain = json_decode($kos->f_lain, true) as $i => $v): ?>
                        <div class="row" data-fasilitas-wrapper="00f00<?= $i ?>">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <input type="text" name="f_tambahan_desc[]" class="form-control" placeholder="Fasilitas Tambahan" value="<?= key($f_lain[$i]) ?>">
                                </div>
                            </div>
                            <div class="col-md-5 pl-1">
                                <div class="form-group">
                                    <input type="text" name="f_tambahan_value[]" class="form-control" placeholder="Keterangan Fasilitas Tambahan" value="<?= reset($f_lain[$i]) ?>">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <button class="btn btn-danger btn-fill pull-right remove_fasilitas" onClick="removeFasilitas('00f00<?= $i ?>')">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-fill" id="add_fasilitas">
                                <i class="nc-icon nc-simple-add"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Foto
                    </div>
                </div>
                <div class="dz-message">Klik disini atau lepaskan berkas untuk mengunggah foto indekos Anda
                    <br>
                </div>
                <button id="save_kos" class="btn btn-info btn-fill pull-right">Update</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    let global_attachment = <?= isset($kos->attachment) ? $kos->attachment : '' ?>;
    let global_lat;
    let global_lng;
    let kos_marker;
    var mymap = L.map('kos-map').setView([-7.446441141902094, 112.71884192158748], 15);
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
    $(document).ready(function() {
        <?php if(isset($kos->lat_kos) || (isset($kos->lng_kos))){ ?>
            kos_marker = L.marker([<?= $kos->lat_kos ?>, <?= $kos->lng_kos ?>]).addTo(mymap);
        <?php ?>
    });
    function removeFasilitas(el){
        console.log(el);
        $('div[data-fasilitas-wrapper="'+el+'"]').remove();
    }
    function clickMap(e) {
        global_lat = e.latlng.lat;
        global_lng = e.latlng.lng;
        if(kos_marker) { mymap.removeLayer(kos_marker); }
        kos_marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
    }
    mymap.on('click', clickMap);

    $('#add_fasilitas').click((e) => {
        e.preventDefault();
        let date = new Date(),
            f_unique = date.getUTCSeconds()+'f'+date.getUTCMilliseconds(),
            fasilitas = `
                <div class="row" data-fasilitas-wrapper="${f_unique}">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <input type="text" name="f_tambahan_desc[]" class="form-control" placeholder="Fasilitas Tambahan">
                        </div>
                    </div>
                    <div class="col-md-5 pl-1">
                        <div class="form-group">
                            <input type="text" name="f_tambahan_value[]" class="form-control" placeholder="Keterangan Fasilitas Tambahan">
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <button class="btn btn-danger btn-fill pull-right remove_fasilitas" onClick="removeFasilitas('${f_unique}')">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
             `;
        $('.fasilitas-tambahan-wrapper').append(fasilitas);
    });
    $('#save_kos').click((e) => {
        e.preventDefault();
        Swal.fire({
          title: 'Menyimpan',
          text: 'Sedang memproses permintaan Anda',
          allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
        let f_tambahan_desc = $('input[name="f_tambahan_desc[]"]').map(function(){return $(this).val();}).get();
        let f_tambahan_value = $('input[name="f_tambahan_value[]"]').map(function(){return $(this).val();}).get();
        let f_tambahan = [];
        $.each(f_tambahan_desc, function(index, val) {
             let obj = {}; obj[f_tambahan_desc[index]] = f_tambahan_value[index];
             f_tambahan.push(obj);
        });
        let form_data = $('.form_kos').serializeArray();
        form_data.push(
            {name: 'f_ac', value : $('input[name="f_ac"]:checked').length},
            {name: 'f_kamar_mandi', value: $('input[name="f_kamar_mandi"]:checked').length },
            {name: 'f_listrik', value: $('input[name="f_listrik"]:checked').length},
            {name: 'f_lain', value : JSON.stringify(f_tambahan)},
            {name: 'lat_kos', value: global_lat},
            {name: 'lng_kos', value: global_lng},
            {name: 'attachment', value: JSON.stringify(global_attachment)}
        );

        $.ajax({
            url: "<?= base_url('admin/save_kos/'.(isset($id_kos) ? $id_kos : '')) ?>",
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
                  if (result.dismiss === Swal.DismissReason.timer) {
                    window.location = "<?= base_url('admin') ?>";
                  }
                })
            },
        });
    });
    $("#dropzone").dropzone({
        url: "<?= base_url('admin/temp_upload') ?>" ,
        addRemoveLinks: true,
        sending : (file, xhr, formData) => {
            formData.append('file_uuid', file.upload.uuid);
        },
        removedfile : (file) => {
            console.log(file.upload.uuid);
            let index = global_attachment.indexOf(file.upload.uuid);
            global_attachment.splice(index);
            console.log(global_attachment);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        success : (file, response) => {
            global_attachment.push(response);
            console.log(global_attachment);
        },
    });
</script>