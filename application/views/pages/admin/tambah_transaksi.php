<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAMBAH TRANSAKSI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="form" class="form" method="post">
                <input type="text" name="uniqid" id="uniqid" hidden value="<?php echo uniqid(); ?>">
                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Nama Nasabah</label>
                            <select class="select2 form-control" name="nama_nasabah" id="nama_nasabah" data-placeholder="Nama Nasabah">
                                <option></option>
                                <?php foreach ($nasabah as $n) : ?>
                                    <option value="<?php echo $n->id_nasabah ?>"><?php echo $n->nama_nasabah ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Wilayah</label>
                            <input type="text" name="" readonly id="id_wilayah" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div id="detail_nasabah" class="col-lg-6 col-sm-12">

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Jenis Sampah</label>
                            <select class="select2 form-control" name="jenis_sampah" required id="jenis_sampah" data-placeholder="Jenis Sampah">
                                <option></option>
                                <?php foreach ($jenis as $jenis) : ?>
                                    <option value="<?php echo $jenis->id_jenis_sampah ?>"><?php echo $jenis->nama_jenis ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Berat Sampah</label>
                            <input type="number" name="berat_sampah" id="berat_sampah" class="form-control" placeholder="" required aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-2" style="margin-top:32px;">
                        <input type="button" class="btn btn-primary" id="btn_add" value="Tambah">
                    </div>
                </div>
            </form>
            <table id="rincian_table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Sampah</th>
                        <th>Berat</th>
                        <th>Harga (/kg)</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
            </table>

        </div>

</div>

<script>
    function tampil_data_barang() {
        var uniqid = $('#uniqid').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>transaksi/get_list',
            async: true,
            data: {
                uniqid: uniqid
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {

                    html += '<tr id="' + data[i].id_transaksi + '">' +
                        '<td>' + no + '</td>' +
                        '<td>' + data[i].jenis_sampah + '</td>' +
                        '<td>' + data[i].berat_sampah + '</td>' +
                        '<td>' + data[i].harga + '</td>' +
                        '<td>' + data[i].total_harga + '</td>' +
                        '<td>' +
                        '<button id="btn_delete" class="btn btn-danger btn-sm item_hapus" onclick="btn_delete(' + data[i].id_transaksi + ')" value="' + data[i].id_transaksi + '"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
                        '</td>' +
                        '</tr>';
                    no++;
                    if (i > 0) {
                        console.log('sudah ada')
                    } else {
                        var uniqid1 = $('#uniqid').val();
                        var jenis_sampah1 = $('#jenis_sampah').val();
                        var berat_sampah1 = $('#berat_sampah').val();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() ?>transaksi/add_list_trans',
                            data: {
                                uniqid: uniqid1,
                                jenis_sampah: jenis_sampah1,
                                berat_sampah: berat_sampah1,
                            },
                            success: function(response) {
                                console.log('success')
                            }
                        })
                    }
                }
                $('#show_data').html(html);
            }

        });
        $selectElement = $('#jenis_sampah').select2({
            placeholder: "Please select an skill",
            allowClear: true
        });


        // $('#btn_add').click(function() {
        //     var form_data = $(this).serialize();
        //     $.ajax({
        //         type: "POST",
        //         url: 'transaksi/add_transaksi',
        //         data: form_data,
        //         success: function(data) {
        //             alert('Success');
        //         },
        //         error: function() {
        //             alert('failed');
        //         }
        //     });

        // });
    };


    $(document).ready(function() {

        //fungsi tampil barang


        $('#btn_add').on('click', function() {
            var w = document.forms["form"]["nama_nasabah"].value;
            var x = document.forms["form"]["jenis_sampah"].value;
            var y = document.forms["form"]["berat_sampah"].value;
            if (w == "" && x == "" && y == "") {
                alert("Kolom inputan harus diisi");
                return false;
            } else {
                var uniqid = $('#uniqid').val();
                var nama_nasabah = $('#nama_nasabah').val();
                var jenis_sampah = $('#jenis_sampah').val();
                var berat_sampah = $('#berat_sampah').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('transaksi/add_transaksi') ?>",
                    dataType: "JSON",
                    data: {
                        uniqid: uniqid,
                        nama_nasabah: nama_nasabah,
                        jenis_sampah: jenis_sampah,
                        berat_sampah: berat_sampah,
                    },
                    success: function(response) {
                        alert('Success');
                        $('[name="jenis_sampah"]').val("");
                        $('[name="berat_sampah"]').val("");
                        tampil_data_barang();
                    },
                    error: function() {
                        alert('Kolom inputan harus diisi');
                    }

                });
                return false;
            }
        });
    });

    function btn_delete(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('transaksi/delete_transaksi') ?>",
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(response) {
                alert('Anda Yakin Ingin Menghapus?');
                var myobj = document.getElementById(response.id);
                myobj.remove();

            }
        });
    }


    $('#nama_nasabah').change(function() {
        var valNas = $('#nama_nasabah').val();
        var url = '<?php echo site_url('transaksi/get_nasabah/'); ?>';
        $('#detail_nasabah').html('');
        $.ajax({
            url: "<?php echo site_url('transaksi/get_nasabah/'); ?>" + valNas,
            type: "GET",
            dataType: "JSON",
            success: function(a) {
                $('#id_wilayah').val(a.nama_wilayah)
                var tmp = '<div class="col-md-12">';
                tmp += '<label><b>Nama Nasabah :</b></label> ' + a.nama_nasabah + '<input type="hidden" id="det_nama_nasabah" value="' + a.nama_nasabah + '"><br/>';
                tmp += '<label><b>Alamat :</b></label> ' + a.alamat + '<br/>';
                tmp += '<label><b>Tanggal Lahir :</b></label> ' + a.tanggal_lahir + '<br/>';
                tmp += '<label><b>Tempat Lahir :</b></label> ' + a.tempat_lahir + '<br/>';
                tmp += '<label><b>No Hp :</b></label> ' + a.no_hp + '<br/>';
                tmp += '<label><b>Tabungan Saat Ini :</b></label> ' + a.total_tabungan + '<br/>';
                tmp += '</div>';
                $('#detail_nasabah').append(tmp);
            }


        });
    });
</script>