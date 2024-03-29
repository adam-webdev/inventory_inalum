<?php
require_once('./config/database.php');

if (isset($_SESSION['hapus_sukses'])) {
  echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data Berhasil dihapus', 'success');
      });
    </script>";
}
if (isset($_SESSION['hapus_gagal'])) {
  echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data gagal dihapus', 'error');
      });
    </script>";
}
if (isset($_SESSION['sukses_update'])) {
  echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data Berhasil diupdate', 'success');
      });
    </script>";
}
unset($_SESSION['hapus_sukses']);
unset($_SESSION['sukses_update']);
unset($_SESSION['hapus_gagal']);

if (isset($_POST['submit'])) {
  $tanggal = validasi_input($_POST['tanggal']);
  $noresi = validasi_input($_POST['no_resi']);
  $nama_sparepart = validasi_input($_POST['nama_sparepart']);
  $meker = validasi_input($_POST['meker']);
  $no_rak = validasi_input($_POST['no_rak']);
  $jumlah = validasi_input($_POST['jumlah']);
  if ($_POST['penempatan']) {
    $penempatan = validasi_input($_POST['penempatan']);
  } else {
    $penempatan = validasi_input($_POST['pilihan_penempatan']);
  }
  $data = [$tanggal, $noresi, $nama_sparepart, $meker, $no_rak, $jumlah, $penempatan];
  $sql = "INSERT INTO rak_depan (tanggal, no_resi, nama_sparepart, meker, no_rak,jumlah, penempatan) VALUES ('$tanggal','$noresi','$nama_sparepart','$meker','$no_rak','$jumlah','$penempatan')";

  $query = mysqli_query($conn, $sql);

  if ($query) {

    // echo "<script>alert('Data Berhasil disimpan')</script>";
    echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data Berhasil disimpan', 'success');
      });
    </script>";
  } else {
    echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data Berhasil disimpan', 'error');
      });
    </script>";
  }
}

function validasi_input($data)
{
  if (empty($data)) {
    return $data;
  }
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Rak Depan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <label for="tanggal">Tanggal :</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="noresi">No SAP :</label>
              <input type="text" name="no_resi" id="noresi" class="form-control" required>
            </div>
          </div>
          <div class="row  mt-2 mb-2">
            <div class="col-md-12">
              <label for="nama">Nama Barang :</label>
              <input type="text" name="nama_sparepart" id="nama" class="form-control" required>
            </div>
          </div>
          <label for="">MAKER :</label><br>
          <div class="row  mt-2">
            <div class="col-md-6">
              <div class="d-flex align-items-centers justify-content-center">
                <label for="hew">HEWRITCH</label>
                <input type="radio" name="meker" id="hew" class=" ml-2" value="HERWITCH"
                  style="width:25px; height:25px;cursor:pointer" required>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="d-flex align-items-centers justify-content-center">
                <label for="hy">HYCASHT</label>
                <input type="radio" name="meker" id="hy" class=" ml-2" value="HYCASHT"
                  style="width:25px; height:25px;cursor:pointer">
              </div>
            </div>
          </div>
          <div class="row  mt-2 mb-2">
            <div class="col-md-12">
              <label for="nama">No Rak:</label>
              <input type="text" name="no_rak" id="nama" class="form-control" required>
            </div>
          </div>
          <div class="row  mt-2 mb-2">
            <div class="col-md-12">
              <label for="jumlah">Jumlah Barang :</label>
              <input type="text" name="jumlah" id="jumlah" class="form-control" required>
            </div>
          </div>
          <p>Penempatan :</p>

          <div class="row  mt-2 mb-2">
            <div class="col-md-6">
              <div class="d-flex align-items-centers justify-content-center">
                <label for="meker1">AICPL</label>
                <input type="radio" name="pilihan_penempatan" id="meker1" class=" ml-2" value="AICPL"
                  style="width:25px; height:25px;cursor:pointer">
              </div>

            </div>
            <div class="col-md-6 ">
              <div class="d-flex align-items-centers justify-content-center">
                <label for="meker2">BCPL</label>
                <input type="radio" name="pilihan_penempatan" id="meker2" class=" ml-2" value="BCPL"
                  style="width:25px; height:25px;cursor:pointer">
              </div>
            </div>
          </div>
          <div class="row  mt-2 mb-2">
            <div class="col-md-6" id="alcpl">

            </div>
            <div class="col-md-6 " id="bcpl">

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="card p-2 m-4">
  <h3>Data Rak Depan</h3>
</div>
<div class="card p-4 m-4">

  <div class="mb-4 d-flex justify-content-between">

    <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target=".bd-example-modal-lg"> +
      Tambah
      Data</button>
    <!-- <a type="button" href="cetak-rakdepan.php" class="btn btn-primary"> + Cetak PDF
    </a> -->
    <a type="button" target="_blankc" href="export-excel-rakdepan.php" class="btn btn-primary"> Export Excel
      <i class="fas fa-file-excel"></i>
    </a>

  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>No SAP</th>
        <th>Nama Sparepart</th>
        <th>Maker</th>
        <th>No Rak</th>
        <th>Jumlah Barang</th>
        <th>Penempatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $rak_depan = "SELECT * FROM rak_depan";
      $query = mysqli_query($conn, $rak_depan);
      $no = 1;
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= DateTime::createFromFormat('Y-m-d', $row['tanggal'])->format('d-m-Y') ?></td>
        <td><?= $row['no_resi'] ?></td>
        <td><?= $row['nama_sparepart'] ?></td>
        <td><?= $row['meker'] ?></td>
        <td><?= $row['no_rak'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td><?= $row['penempatan'] ?></td>
        <td align="center" width="15%">
          <a href="index.php?page=edit-rak-depan&id=<?= $row['id'] ?>" data-toggle="tooltip" title="Edit"
            style="background:  #2A3042;color:#ffffff;" class="d-none  d-sm-inline-block btn btn-sm shadow-sm">
            <i class="fas fa-edit fa-sm text-white-50"></i>
          </a>
          <a href="delete-rak-depan.php?id=<?= $row['id'] ?>" data-toggle="tooltip" title="Hapus"
            onclick="return confirm('Yakin Ingin menghapus data?')" style="background: red"
            class="d-none d-sm-inline-block btn btn-sm  shadow-sm">
            <i class="fas fa-trash-alt fa-sm text-white-50"></i>
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>No SAP</th>
        <th>Nama Sparepart</th>
        <th>Maker</th>
        <th>No Rak</th>
        <th>Jumlah Barang</th>
        <th>Penempatan</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<script>
$(document).ready(function() {
  $('#example').DataTable();

  $('input[type=radio][name=pilihan_penempatan]').change(function() {
    if (this.value == 'AICPL') {
      $('#alcpl').html(
        `
        <div id="alcpl-child" style="display:none">

            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker3">CAST WHILE</label>
              <input type="radio" checked name="penempatan" id="meker2" class=" ml-2" value="AICPL"
                style="width:25px; height:25px;cursor:pointer">
            </div>


            </div>`
      )
      $('#bcpl-child').remove()
    } else if (this.value == 'BCPL') {
      $('#bcpl').html(
        `<div id="bcpl-child">
            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker5">Billet Casting</label>
              <input type="radio" name="penempatan" id="meker5" class=" ml-2" value="BCPL Billet Casting"
                style="width:25px; height:25px;cursor:pointer" required>
            </div>

            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker7">Billet Handling</label>
              <input type="radio" name="penempatan" id="meker7" class=" ml-2" value="BCPL Billet Handling"
                style="width:25px; height:25px;cursor:pointer">
            </div>
            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker6">Homogenezing</label>
              <input type="radio" name="penempatan" id="meker6" class=" ml-2" value="BCPL Homogenezing"
                style="width:25px; height:25px;cursor:pointer">
            </div>

            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker8">Billet Sawing</label>
              <input type="radio" name="penempatan" id="meker8" class=" ml-2" value="BCPL Billet Sawing"
                style="width:25px; height:25px;cursor:pointer">
            </div>
        </div>`
      )
      $('#alcpl-child').remove()

    }
  });

});
</script>