<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Tabungan</h1>
            </div>
        </div>
    </div>

</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form</h3>
            </div>
            <form action="<?= base_url() ?>tabungan/simpan_tabungan" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <select class="form-control-select2 form-control" name="id_user" required>
                            <?php
                            foreach ($user as $users) { ?>
                                <option value="<?= $users->id_user ?>"><?= $users->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah yang ditabung</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>