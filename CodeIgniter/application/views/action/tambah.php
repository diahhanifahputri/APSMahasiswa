<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view("_isi/head.php"); ?>
    </head>
    <body>
        <?php $this->load->view("_isi/navbar.php"); ?>
        <div class="container">
            <div class="col-md-9">
                <h3>Tambah data Mahasiswa</h3>
                <hr>
                <form action="<?php echo site_url('crud/simpanData') ?>" method = "post">
                    <div class = "form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class = "form-group">
                        <label>Jurusan</label>
                        <textarea name="jurusan" rows="3" class="form-control"></textarea>
                    </div>
                     <div class = "form-group">
                        <label>Agama</label>
                        <textarea name="agama" rows="3" class="form-control"></textarea>
                    </div>
                    <div class = "form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control"></textarea>
                    </div>
                    <div class = "form-group">
                        <label>Nilai IPK</label>
                        <select name="NilaiIPK" class="form-control">
                            <?php foreach ($nilai as $n): ?>
                                <option value="<?php echo $n->id_nilai ?>"><?php echo $n->IPK ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <input type="submit" class="btn btn-success" value="Simpan">
                </form>
            </div>
        </div>
        <?php $this->load->view("_isi/footer.php"); ?>
        <!--javascript-->
        <?php $this->load->view("_isi/js.php"); ?>
    </body>
</html>