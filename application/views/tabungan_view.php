<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tabungan</h1>
            </div>
        </div>
    </div>

</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabungan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <?php
                if ($this->session->status == 'admin') { ?>
                    <a href="<?= base_url('tabungan/tambah') ?>" class="btn btn-info">Tambah Tabungan</a>
                <?php }
                ?>
                
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Tabungan</th>
                            <th>Nama</th>
                            <th>Jumlah yang ditabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tabungan as $key) { ?>
                            <tr>
                                <td><?= date('d F Y', strtotime($key->tanggal));  ?></td>
                                <td><?= $key->nama ?></td>
                                <td><?= $key->jumlah ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>