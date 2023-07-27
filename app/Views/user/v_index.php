<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-user"></i>
            User
            <small>Arsip 2023</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data User</h3>

                        <div class="box-tools pull-right">
                            <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"> Tambahkan</i></a>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                            # code...
                        }
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Departemen</th>
                                    <th>Foto</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['nama_user']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['password']; ?></td>
                                        <td><?php if ($value['level'] == 1) {
                                                echo 'admin';
                                            } else {
                                                echo 'user';
                                            }
                                            ?></td>
                                        <td><?= $value['nama_departemen']; ?></td>
                                        <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="40px"></td>
                                        <td class="text-center">

                                            <a href="<?= base_url('user/edit/' . $value['id_user']) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"> Edit</i></a>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                <?php    } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>

    <!-- /.modal delete User -->
    <?php foreach ($user as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_user']; ?>">
            <div class="modal-dialog modal-sm modal-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Admin</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Hapus <b><?= $value['nama_user']; ?></b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" type="submit" class="btn btn-primary">Ya</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <!-- end modal delete User -->

</div>