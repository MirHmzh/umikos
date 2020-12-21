<style type="text/css" media="screen">
    .table-full-width{
        margin: 0;
    }
    #table_indekos{
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
                            <h4 class="card-title">Indekos</h4>
                        </div>
                        <div class="col-6 add-wrapper">
                            <a href="<?= base_url('main/form_kos') ?>" title="">
                                <button type="button" class="btn btn-info btn-fill" id="btn-add"><i class="fa fa-plus"></i></button>
                            </a>
                        </div>
                    </div>
                    <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped" id="table_indekos">
                        <thead>
                            <th>No. </th>
                            <th>Nama Kos</th>
                            <th>Nama Owner</th>
                            <th>No. Telp Owner</th>
                            <th>Alamat Kos</th>
                            <th>Tarif</th>
                            <th>&nbsp;&nbsp;&nbsp;</th>
                        </thead>
                        <tbody>
<!--                             <tr>
                                <td>1</td>
                                <td>Dakota Rice</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {

    });
    let table_indekos = $('#table_indekos').DataTable( {
            processing: true,
            serverSide: true,
            ordering: true,
            deferRender: true,
            paging: true,
            ajax: {
                url : "<?= base_url('admin/get_kos') ?>",
                method: "POST"
            },
            columns : [
                {
                    data : 'id_kos',
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data : 'nama_kos' },
                { data : 'nama_pemilik' },
                { data : 'notelp_pemilik' },
                { data : 'alamat_kos' },
                { data : 'tarif_kos' },
                {
                    data : 'id_kos',
                    render: (data, type, full) => {
                        let html = `
                            <button type="button" onClick="editKos('${data}')" class="btn btn-warning btn-fill"><i class="fa fa-pencil"></i></button>
                            &nbsp;&nbsp;
                            <button type="button" onClick="deleteKos('${data}')" class="btn btn-danger btn-fill"><i class="fa fa-trash"></i></button>
                        `;
                        return html;
                    },
                }
            ],
        });
        $('#table_indekos').on('click', 'tr', () => {
            let data = table_indekos.row(this).data();
            console.log(data);
        });

    function editKos(id) {
        window.location = "<?= base_url('admin/form_kos/') ?>"+id;
    }

    function deleteKos(id) {
        Swal.fire({
            title: 'Perhatian',
            title: 'Apakah Anda yakin akan menghapus data ini?',
            showCancelButton: true,
            icon: 'warning',
            confirmButtonText: `Ya`,
            cancelButtonText : 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("<?= base_url('admin/delete_kos/') ?>"+id, function(data, textStatus, xhr) {
                    console.log(data);
                    $('#table_indekos').DataTable().ajax.reload();
                    Swal.fire('Sukses', data.msg, 'success');
                 }, 'json');
            }
        })
    }
</script>