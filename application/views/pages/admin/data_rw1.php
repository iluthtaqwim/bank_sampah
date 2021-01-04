<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Nasabah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Nasabah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar data nasabah dan total tabungan</h3>
                            <button style="float:right;" type="button" onclick="addFunction()" class="btn btn-primary">Tambah Nasabah</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Wilayah</th>
                                        <th>No Hp</th>
                                        <th>Tabungan (Rp)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal edit-->
<div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" method="post">
                    <input type="text" hidden name="id_nasabah" id="id_nasabah">
                    <div class="form-group">
                        <label for="">Nama Nasabah</label>
                        <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="">Wilayah</label>
                        <select class="form-control" name="id_wilayah" id="id_wilayah">
                            <option></option>
                            <?php
                            $query = $this->db->query("SELECT * 
                                                           FROM wilayah ORDER BY id_wilayah");
                            $dropdowns = $query->result();

                            foreach ($dropdowns as $dropdown) {
                            ?>
                                <option value="<?php echo $dropdown->id_wilayah ?>"><?php echo $dropdown->nama_wilayah, ' , RT', $dropdown->rt, '/ RW', $dropdown->rw ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script script script script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#datatable').DataTable({

            "processing": false, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "lengthMenu": [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('datarw1/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, 2], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [0, 5, 6, 7, 8],
                    "className": 'text-center'
                },
            ],
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    })
</script>
<script>
    function addFunction() {
        save_method = 'add';
        $('#form').attr('action', '<?= base_url() ?>datarw1/tambah_nasabah');
        $('#form')[0].reset(); // reset form on modals
        $('#modelEdit').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Data Nasabah'); // Set title to Bootstrap modal title
    }

    function editFunction(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#form').attr('action', '<?= base_url() ?>datarw1/edit_nasabah');

        //Ajax Load data from ajax
        $.ajax({
            url: "<?= base_url() ?>datarw1/ajax_edit_nasabah/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id_nasabah').val(data.id_nasabah);
                $('#nama_nasabah').val(data.nama_nasabah);
                $('#alamat').val(data.alamat);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#id_wilayah').val(data.id_wilayah).attr("selected", "selected");
                $('#no_hp').val(data.no_hp);

                $('#modelEdit').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Nasabah'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }

    function deleteFunction(id) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "But you will still be able to retrieve this file.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, archive it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>datarw1/hapus_nasabah/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {

                            location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error deleting data');
                        }
                    });
                    swal("Deleted!", "Data Berhasil Dihapus.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    }
</script>