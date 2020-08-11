<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pinjaman</h1>
            </div>
        </div>
    </div>

</div>
<?php
if (count($pembayaran) < 3 && $this->session->status == 'admin') { 
    $jumlah = ceil($detail->jumlah / 3);
    $jumlah_dibayar = $jumlah + ($jumlah * 0.02);
    ?>


    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Pembayaran</h3>
                </div>
                <?php echo $this->session->flashdata('message'); ?>
                <form action="<?= base_url() ?>pinjaman/simpan_pembayaran" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pinjaman" value="<?= $detail->id_pinjaman ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" placeholder="" readonly value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah yang Dibayar</label>
                            <input type="number" class="form-control" name="jumlah" placeholder="" required value="<?= $jumlah_dibayar ?>" readonly>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php }
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah yang dibayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pembayaran as $key) { ?>
                            <tr>
                                <td><?= date('d F Y', strtotime($key->tanggal_pembayaran));  ?></td>
                                <td><?= $key->jumlah_dibayar ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>