<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-user"></i>
            Add User
            <small>Arsip 2023</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data User</h3>

                        <div class="box-tools pull-right">

                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <h5>Ada Kesalahan</h5>
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value) ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <?php echo form_open_multipart('user/insert'); ?>

                        <div class="form-group">
                            <label>Nama User</label>
                            <input name="nama_user" class="form-control" placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input name="email" class="form-control" placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" class="form-control" placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Pilih Level--</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Departemen</label>
                            <select name="id_departemen" class="form-control">
                                <option value="">--Pilih Departemen--</option>
                                <?php foreach ($departemen as $key => $value) { ?>
                                    <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="sumbit" class="btn btn-primary">
                                <li class="fa fa-save"></li> Save
                            </button>
                            <a href="<?= base_url('user') ?>" class="btn btn-success">Kembali</a>

                        </div>



                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </section>


</div>