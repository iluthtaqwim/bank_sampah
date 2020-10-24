<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data RW 01</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data RW 01</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-6">
                    <form id="form" method="post">
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
                        <div class="form-group">
                            <label for="">Jenis Sampah</label>
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Berat Sampah</label>
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Input Saldo</label>
                            <input type="number" name="saldo" id="saldo" class="form-control" placeholder="" aria-describedby="helpId">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div id="detail_nasabah" class="col-lg-6 col-sm-12">

                </div>
            </div>
        </div>
</div>
<script>
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