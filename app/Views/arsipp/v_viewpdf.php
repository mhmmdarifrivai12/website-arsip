<div class="content-wrapper bg-gray color-palette">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-file-text-o"></i>
            Review Document
            <small>arsipp 2023</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th width="100px">No Document</th>
                        <th width="30px">:</th>
                        <td><?= $arsipp['no_arsipp'] ?></td>
                        <th width="120px">Tanggal Upload</th>
                        <th width="30px">:</th>
                        <td><?= $arsipp['tgl_upload'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Document</th>
                        <th>:</th>
                        <td><?= $arsipp['nama_arsipp'] ?></td>
                        <th>Tanggal Update</th>
                        <th>:</th>
                        <td><?= $arsipp['tgl_update'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <th>:</th>
                        <td><?= $arsipp['deskripsi'] ?></td>
                        <th>Ukuran File</th>
                        <th>:</th>
                        <td><?= $arsipp['ukuran_file'] ?> Byte</td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-12">
                <iframe src="<?= base_url('file_arsipp/' . $arsipp['file_arsipp']) ?>" style="border:2px solid blue;" height="1000px" width="100%"></iframe>
            </div>

        </div>

    </section>
</div>