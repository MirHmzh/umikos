<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Indekos</h4>
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
                            <th></th>
                        </thead>
                        <tbody>
                            <!-- <tr>
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
        $('#table_indekos').DataTable( {
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
                { data : 'nama_pemilik' },
                { data : 'notelp_pemilik' },
                { data : 'nama_kos' },
                { data : 'alamat_kos' },
                { data : 'tarif_kos' },
                { data : 'id_kos' }
            ],
        } );

    });
</script>