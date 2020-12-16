<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Owner</h4>
                    <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped" id="table_owner">
                        <thead>
                            <th>No. </th>
                            <th>Nama Owner</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Email</th>
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
        $('#table_owner').DataTable( {
            processing: true,
            serverSide: true,
            ordering: true,
            deferRenderer: true,
            paging: true,
            ajax: {
                url : "<?= base_url('admin/get_owner') ?>",
                method: "POST"
            },
            columns : [
                {
                    data : 'id_owner',
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data : 'nama_pemilik' },
                { data : 'alamat_pemilik' },
                { data : 'notelp_pemilik' },
                { data : 'email' },
                { data : 'id_pemilik' }
            ],
        } );

    });
</script>