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
        <div class="col-md-8">
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
                                    <input type="text" name="nama_pemilik" class="form-control" value="<?= isset($profile->nama_pemilik) ? $profile->nama_pemilik : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="text" name="notelp_pemilik" class="form-control" value="<?= isset($profile->notelp_pemilik) ? $profile->notelp_pemilik : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea rows="4" cols="80" name="alamat_pemilik" class="form-control"><?= isset($profile->alamat_pemilik) ? $profile->alamat_pemilik : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?= isset($profile->email) ? $profile->email : '' ?>">
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
                        <button class="btn btn-info btn-fill pull-right" id="save_profile">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- <div class="card card-user card-profile">
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                            <h5 class="title">Mike Andrew</h5>
                        </a>
                    </div>
                    <p class="description text-center">
                        Jl. Mandala 418 Semambung
                        <br>Gedangan
                        <br>Sidoarjo
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $('#save_profile').click((e) => {
        e.preventDefault();
        let form_data = $('#form_owner').serializeArray();
        $.ajax({
            url: "<?= base_url('main/save_owner') ?>",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            success : (data) => {
                Swal.fire({
                  title: 'Sukses',
                  text: 'Data Anda telah disimpan',
                  icon: 'success',
                  timer: 2000,
                }).then((result) => {
                  window.location = "<?= base_url('main') ?>";
                })
            },
        });
    });
</script>