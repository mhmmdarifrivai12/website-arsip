<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-folder-open"></i>
            Departemen
            <small>Arsip 2023</small>
        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Departemen</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                <i class="fa fa-plus"> Tambahkan</i></button>
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
                                    <th>Departemen</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($Departemen as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['nama_departemen']; ?></td>
                                        <td class="text-center">

                                            <button href="" class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $value['id_departemen']; ?>"><i class="fa fa-pencil-square-o"> Edit</i></button>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_departemen']; ?>"><i class="fa fa-trash"></i> Delete</button>

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
</div>


<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Departemen</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('departemen/add')
                ?>
                <div class="form-group">
                    <label>Nama departemen</label>
                    <input name="nama_departemen" class="form-control" placeholder="Enter ..." required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php foreach ($Departemen as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_departemen']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit departemen</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('departemen/edit/' . $value['id_departemen'])
                    ?>
                    <div class="form-group">
                        <label>Nama departemen</label>
                        <input name="nama_departemen" value="<?= $value['nama_departemen']; ?>" class="form-control" placeholder="Enter ..." required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <li class="fa fa-save"></li> Save
                    </button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<?php foreach ($Departemen as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_departemen']; ?>">
        <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus departemen</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <?= $value['nama_departemen']; ?>...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('departemen/delete/' . $value['id_departemen']) ?>" type="submit" class="btn btn-primary">Ya</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>