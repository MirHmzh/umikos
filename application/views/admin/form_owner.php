<style type="text/css" media="screen">
    .card-profile{
        margin-top: 3em;
    }
    a:hover{
        color:#333;
    }
    a{
        color: #333;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <form id="form_owner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama_pemilik" class="form-control" value="<?= isset($owner->nama_pemilik) ? $owner->nama_pemilik : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="text" name="notelp_pemilik" class="form-control" value="<?= isset($owner->notelp_pemilik) ? $owner->notelp_pemilik : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="4" cols="80" name="alamat_pemilik" class="form-control"><?= isset($owner->alamat_pemilik) ? $owner->alamat_pemilik : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?= isset($owner->email) ? $owner->email : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info btn-fill pull-right" id="save_profile">Save Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $('#save_profile').click((e) => {
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
        let form_data = $('#form_owner').serializeArray();
        $.ajax({
            url: "<?= base_url('admin/save_owner/'.(isset($id_pemilik) ? $id_pemilik : '')) ?>",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            success : (data) => {
                Swal.close();
                Swal.fire({
                  title: 'Sukses',
                  text: 'Data Anda telah disimpan',
                  icon: 'success',
                  timer: 2000,
                }).then((result) => {
                  window.location = "<?= base_url('admin/owner') ?>";
                })
            },
        });
    });
</script>