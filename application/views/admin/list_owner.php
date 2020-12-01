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
                            <tr>
                                <td>1</td>
                                <td>Dakota Rice</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
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
            "processing": true,
            "serverSide": true,
            "ajax": "scripts/server_processing.php"
        } );

    });
</script>