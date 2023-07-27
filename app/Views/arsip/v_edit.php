<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-file-text-o"></i>
            Edit Document
            <small>arsipp 2023</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Document</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <h5>Ada Kesalahan !!!</h5>
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value) ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php
                        echo form_open_multipart('arsip/update/' . $arsip['id_arsip']);
                        ?>

                        <div class="form-group">
                            <label>No Document</label>
                            <input name="no_arsip" class="form-control" value="<?= $arsip['no_arsip']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="id_kategori" class="form-control">
                                <option value="<?= $arsip['id_kategori'] ?>"><?= $arsip['nama_kategori'] ?></option>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama Document</label>
                            <input name="nama_arsip" value="<?= $arsip['nama_arsip'] ?>" class="form-control" placeholder="Nama Arsip">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5"><?= $arsip['deskripsi'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Ganti File</label>
                            <input type="file" name="file_arsip" class="form-control">
                            <label class="text-danger">File Harus Format .PDF</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('arsip') ?>" class="btn btn-success">Kembali</a>
                        </div>

                        <?php echo form_close() ?>


                    </div>
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-3">
            </div>
        </div>
    </section>


</div>