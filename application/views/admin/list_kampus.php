<style type="text/css" media="screen">
    .table-full-width{
        margin: 0;
    }
    #table_kampus{
        width: 100% !important;
    }
    #btn-add{
        float: right;
    }
    .card .table tbody td:last-child{
        display: table-cell;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Kampus</h4>
                        </div>
                        <div class="col-6 add-wrapper">
                            <a href="<?= base_url('admin/form_kampus') ?>" title="">
                                <button type="button" class="btn btn-info btn-fill" id="btn-add"><i class="fa fa-plus"></i></button>
                            </a>
                        </div>
                    </div>
                    <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped" id="table_kampus">
                        <thead>
                            <th>No. </th>
                            <th>Nama Kampus</th>
                            <th>Alamat</th>
                            <th>Koordinat Lat.</th>
                            <th>Koordinat Lng.</th>
                            <th></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#table_kampus').DataTable( {
            processing: true,
            serverSide: true,
            ordering: true,
            deferRenderer: true,
            paging: true,
            ajax: {
                url : "<?= base_url('admin/get_kampus') ?>",
                method: "POST"
            },
            columns : [
                {
                    data : 'id_kampus',
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data : 'nama_kampus' },
                { data : 'alamat_kampus' },
                { data : 'lat_kampus' },
                { data : 'lng_kampus' },
                {
                    data : 'id_kampus',
                    render: (data, type, full) => {
                        let html = `
                            <button type="button" onClick="editKampus('${data}')" class="btn btn-warning btn-fill"><i class="fa fa-pencil"></i></button>
                            &nbsp;&nbsp;
                            <button type="button" onClick="deleteKampus('${data}')" class="btn btn-danger btn-fill"><i class="fa fa-trash"></i></button>
                        `;
                        return html;
                    },
                }
            ],
        } );

    });

    function editKampus(id) {
        window.location = "<?= base_url('admin/form_kampus/') ?>"+id;
    }

    function deleteKampus(id) {
        Swal.fire({
            title: 'Perhatian',
            title: 'Apakah Anda yakin akan menghapus data ini?',
            showCancelButton: true,
            icon: 'warning',
            confirmButtonText: `Ya`,
            cancelButtonText : 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("<?= base_url('admin/delete_kampus/') ?>"+id, function(data, textStatus, xhr) {
                    console.log(data);
                    $('#table_kampus').DataTable().ajax.reload();
                    Swal.fire('Sukses', data.msg, 'success');
                 }, 'json');
            }
        })
    }
</script>