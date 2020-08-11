<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pinjaman</h1>
            </div>
        </div>
    </div>

</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pinjaman</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php
                if ($this->session->status == 'admin') { ?>
                    <a href="<?= base_url('pinjaman/buat') ?>" class="btn btn-info">Buat Pinjaman</a>
                <?php }
                ?>

                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Pinjaman</th>
                            <th>Nama</th>
                            <th>Jumlah yang dipinjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pinjaman as $key) { ?>
                            <tr>
                                <td><?= date('d F Y', strtotime($key->tanggal));  ?></td>
                                <td><?= $key->nama ?></td>
                                <td><?= $key->jumlah ?></td>
                                <td><a href="<?= base_url('pinjaman/detail/' . $key->id_pinjaman) ?>" class="btn btn-info">Detail</a></td>
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