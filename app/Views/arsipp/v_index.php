<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-file-text-o"></i>
            Document Keluar
            <small>arsipp 2023</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Document</h3>

                        <div class="box-tools pull-right">
                            <a href="<?= base_url('arsipp/add') ?>" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i> Add</a>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success! - ';
                            echo session()->getFlashdata('pesan');
                            echo '</h4></div>';
                        }
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No arsipp</th>
                                    <th>Nama </th>
                                    <th>Kategori</th>
                                    <th>Upload</th>
                                    <th>Update</th>
                                    <th>File</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($arsipp as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['no_arsipp']; ?></td>
                                        <td><?= $value['nama_arsipp']; ?></td>
                                        <td><?= $value['nama_kategori']; ?></td>
                                        <td><?= $value['tgl_upload']; ?></td>
                                        <td><?= $value['tgl_update']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('arsipp/viewpdf/' . $value['id_arsipp']) ?>">
                                                <i class="fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                                            <?= number_format($value['ukuran_file'], 0) ?> Byte
                                        </td>
                                        <td class="text-center">

                                            <a href="<?= base_url('arsipp/edit/' . $value['id_arsipp']) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_arsipp']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

    <!-- /.modal delete kategori -->
    <?php foreach ($arsipp as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_arsipp']; ?>">
            <div class="modal-dialog modal-sm modal-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus User</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Hapus <b><?= $value['nama_arsipp']; ?></b>..?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('arsipp/delete/' . $value['id_arsipp']) ?>" type="submit" class="btn btn-primary">Ya</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <!-- end modal delete kategori -->

</div>