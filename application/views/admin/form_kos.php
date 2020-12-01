<style type="text/css" media="screen">
    #kos-map{
        width: 100%;
        height: 25em;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form id="dropzone" class="form_kos">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Kos</label>
                            <input type="text" name="nama_kos" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="2" name="alamat_kos" cols="80" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Panjang Kamar (m)</label>
                            <input type="text" name="panjang_kos" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 pl-1">
                        <div class="form-group">
                            <label>Lebar Kamar (m)</label>
                            <input type="text" name="lebar_kos" class="form-control">
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
                          <input type="checkbox" name="f_kamar_mandi" value="1" class="custom-control-input" id="switch-kmdalam">
                          <label class="custom-control-label" for="switch-kmdalam">KM Dalam</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="f_ac" value="1" class="custom-control-input" id="switch-ac">
                          <label class="custom-control-label" for="switch-ac">AC Kamar</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="f_listrik" value="1" class="custom-control-input" id="switch-listrik">
                          <label class="custom-control-label" for="switch-listrik">Listrik Include</label>
                        </div>
                    </div>
                </div>
                <div class="fasilitas-tambahan-wrapper">
                    <div class="row" data-fasilitas-wrapper="00f000">
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
                                <button class="btn btn-danger btn-fill pull-right remove_fasilitas" onClick="removeFasilitas('00f000')">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                            </div>
                        </div>
                    </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="file" />
                    </div>
                </div>
                <button id="save_kos" class="btn btn-info btn-fill pull-right">Update</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    var mymap = L.map('kos-map').setView([-7.446441141902094, 112.71884192158748], 15);
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">UMIKOS | OpenStreetMap OpenSource Maps API</a>'
    }).addTo(mymap);
    function removeFasilitas(el){
        console.log(el);
        $('div[data-fasilitas-wrapper="'+el+'"]').remove();
    }
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
        let f_tambahan_desc = $('input[name="f_tambahan_desc[]"]').map(function(){return $(this).val();}).get();
        let f_tambahan_value = $('input[name="f_tambahan_value[]"]').map(function(){return $(this).val();}).get();
        let f_tambahan = [];
        $.each(f_tambahan_desc, function(index, val) {
             f_tambahan.push({val : f_tambahan_value[index]});
        });
        let form_data = $('.form_kos').serializeArray();
        form_data.push(
            {name: 'f_ac', value : $('input[name="f_ac"]:checked').length},
            {name: 'f_kamar_mandi', value: $('input[name="f_kamar_mandi"]:checked').length },
            {name: 'f_listrik', value: $('input[name="f_listrik"]:checked').length},
            {name: 'f_lain', value : JSON.stringify(f_tambahan)},
            {name: 'lat_kos', value: '-7.44684'},
            {name: 'lng_kos', value: '112.71866'}
        );

        $.ajax({
            url: "<?= base_url('admin/save_kos/'.(isset($id_kos) ? $id_kos : '')) ?>",
            type: 'POST',
            data: form_data,
        });
    });
    $("#dropzone").dropzone({ url: "/file/post" });
</script>