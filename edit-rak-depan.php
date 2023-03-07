<?php
require_once('./config/database.php');
$id = $_GET['id'];
$sql = "SELECT * FROM rak_depan WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) < 0) {
  $data = "Data tidak ditemukan !";
} else {
  while ($row = mysqli_fetch_array($query)) {
    $row_id = $row['id'];
    $tanggal = $row['tanggal'];
    $no_resi = $row['no_resi'];
    $nama_sparepart = $row['nama_sparepart'];
    $meker = $row['meker'];
    $no_rak = $row['no_rak'];
    $jumlah = $row['jumlah'];
    $penempatan = $row['penempatan'];
  }
}


if (isset($_POST['update'])) {
  $tanggal = validasi_input($_POST['tanggal']);
  $noresi = validasi_input($_POST['no_resi']);
  $nama_sparepart = validasi_input($_POST['nama_sparepart']);
  $meker = validasi_input($_POST['meker']);
  $no_rak = validasi_input($_POST['no_rak']);
  $jumlah = validasi_input($_POST['jumlah']);
  $penempatan = validasi_input($_POST['penempatan']);

  $sql = "UPDATE rak_depan SET tanggal='$tanggal',no_resi='$noresi',nama_sparepart='$nama_sparepart',meker='$meker',no_rak='$no_rak',jumlah='$jumlah',penempatan='$penempatan' WHERE id='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $_SESSION['sukses_update'] = true;
    // echo "<script>alert('Data Berhasil disimpan')</script>";
    echo "<script>
    $(document).ready(function(){
      swal('Berhasil!', 'Data Berhasil disimpan', 'success');
      });
      window.location.href = 'index.php?page=rak-depan';
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

<div class="card p-4 m-4">
  <h3>Edit Data</h3>


  <form action="index.php?page=edit-rak-depan&id=<?= $row_id ?>" method="post">
    <div class="modal-body">

      <div class="row">
        <div class="col-md-12">
          <label for="tanggal">Tanggal :</label>
          <input type="date" name="tanggal" id="tanggal" value="<?= $tanggal ?>" class="form-control" required>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-12">
          <label for="noresi">No SAP :</label>
          <input type="text" name="no_resi" id="noresi" value="<?= $no_resi ?>" class="form-control" required>
        </div>
      </div>
      <div class="row  mt-2 mb-2">
        <div class="col-md-12">
          <label for="nama">Nama Barang :</label>
          <input type="text" name="nama_sparepart" value="<?= $nama_sparepart ?>" id="nama" class="form-control"
            required>
        </div>
      </div>
      <label for="">MEKER :</label><br>
      <div class="row  mt-2">
        <div class="col-md-6">
          <div class="d-flex align-items-centers justify-content-center">
            <label for="hew">HEWRITCH</label>
            <input type="radio" name="meker" id="hew" value="HERWITCH"
              <?php echo ($meker == "HERWITCH" ? 'checked="chechked"' : "") ?> class=" ml-2" value="HERWITCH"
              style="width:25px; height:25px;cursor:pointer" required>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="d-flex align-items-centers justify-content-center">
            <label for="hy">HYCASHT</label>
            <input type="radio" name="meker" value="HYCASHT" id="hy"
              <?php echo ($meker == "HYCASHT" ? 'checked="chechked"' : "") ?> class=" ml-2"
              style="width:25px; height:25px;cursor:pointer">
          </div>
        </div>
      </div>
      <div class="row  mt-2 mb-2">
        <div class="col-md-12">
          <label for="nama">No Rak:</label>
          <input type="text" name="no_rak" id="nama" value=<?= $no_rak ?> class="form-control" required>
        </div>
      </div>
      <div class="row  mt-2 mb-2">
        <div class="col-md-12">
          <label for="jumlah">Jumlah Barang :</label>
          <input type="text" name="jumlah" id="jumlah" value=<?= $jumlah ?> class="form-control" required>
        </div>
      </div>
      <p>Penempatan :</p>

      <div class="row  mt-2 mb-2">
        <div class="col-md-6">
          <div class="d-flex align-items-centers justify-content-center">
            <label for="meker1">AICPL</label>
            <input type="radio" <?php echo ($penempatan == "AICPL" ? 'checked="chechked"' : "") ?>
              name="pilihan_penempatan" id="meker1" class=" ml-2" value="AICPL"
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

          <!-- <div class="d-flex align-items-centers justify-content-center">
            <label for="cast">CAST WHILE</label>
            <input type="radio" name="penempatan" id="cast" class=" ml-2"
              <?php echo ($penempatan == "ALCPL Casting While" ? 'checked="chechked"' : "") ?>
              value="ALCPL Casting While" style="width:25px; height:25px;cursor:pointer">
          </div>
          <div class="d-flex align-items-centers justify-content-center">
            <label for="do">DROP OUT</label>
            <input type="radio" name="penempatan" id="do" class=" ml-2"
              <?php echo ($penempatan == "ALCPL Drop Out" ? 'checked="chechked"' : "") ?> value="ALCPL Drop Out"
              style="width:25px; height:25px;cursor:pointer">
          </div> -->


        </div>
        <div class="col-md-6 " id="bcpl">
          <div class="d-flex align-items-centers justify-content-center">
            <label for="cm">Bilet Casting</label>
            <input type="radio" name="penempatan" id="cm"
              <?php echo ($penempatan == "BCPL Bilet Casting" ? 'checked="chechked"' : "") ?> class=" ml-2"
              value="BCPL Bilet Casting" style="width:25px; height:25px;cursor:pointer" required>
          </div>

          <div class="d-flex align-items-centers justify-content-center">
            <label for="fc">Bilet Headling</label>
            <input type="radio" name="penempatan" id="fc"
              <?php echo ($penempatan == "BCPL Bilet Headling" ? 'checked="chechked"' : "") ?> class=" ml-2"
              value="BCPL Bilet Headling" style="width:25px; height:25px;cursor:pointer">
          </div>
          <div class="d-flex align-items-centers justify-content-center">
            <label for="homogenzing">Homogenezing</label>
            <input type="radio" name="penempatan" id="homogenezing"
              <?php echo ($penempatan == "BCPL Homogenezing" ? 'checked="chechked"' : "") ?> class=" ml-2"
              value="BCPL Homogenezing" style="width:25px; height:25px;cursor:pointer">
          </div>
          <div class="d-flex align-items-centers justify-content-center">
            <label for="sw">Bilet Sawing</label>
            <input type="radio" name="penempatan" id="sw"
              <?php echo ($penempatan == "BCPL Bilet Sawing" ? 'checked="chechked"' : "") ?> class=" ml-2"
              value="BCPL Bilet Sawing" style="width:25px; height:25px;cursor:pointer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </div>
  </form>


</div>

<script>
$(document).ready(function() {
  $('#example').DataTable();

  $('input[type=radio][name=pilihan_penempatan]').change(function() {
    if (this.value == 'AICPL') {
      //   $('#alcpl').html(
      //     `
      //   <div id="alcpl-child">

      //       <div class="d-flex align-items-centers justify-content-center">
      //         <label for="cast">CAST WHILE</label>
      //         <input type="radio" name="penempatan" id="cast" class=" ml-2" value="ALCPL Casting While"
      //           style="width:25px; height:25px;cursor:pointer">
      //       </div>
      //       <div class="d-flex align-items-centers justify-content-center">
      //         <label for="do">DROP OUT</label>
      //         <input type="radio" name="penempatan" id="do" class=" ml-2" value="ALCPL Drop Out"
      //           style="width:25px; height:25px;cursor:pointer">
      //       </div>


      //       </div>`
      //   )
      $('#bcpl-child').remove()
    } else if (this.value == 'BCPL') {
      $('#bcpl').html(
        `<div id="bcpl-child">
            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker5">Bilet Casting</label>
              <input type="radio" name="penempatan" id="meker5" class=" ml-2" value="BCPL Bilet Casting"
                style="width:25px; height:25px;cursor:pointer" required>
            </div>

            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker7">Bilet Headling</label>
              <input type="radio" name="penempatan" id="meker7" class=" ml-2" value="BCPL Bilet Headling"
                style="width:25px; height:25px;cursor:pointer">
            </div>
            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker6">Homogenezing</label>
              <input type="radio" name="penempatan" id="meker6" class=" ml-2" value="BCPL Homogenezing"
                style="width:25px; height:25px;cursor:pointer">
            </div>

            <div class="d-flex align-items-centers justify-content-center">
              <label for="meker8">Bilet Sawing</label>
              <input type="radio" name="penempatan" id="meker8" class=" ml-2" value="BCPL Bilet Sawing"
                style="width:25px; height:25px;cursor:pointer">
            </div>
        </div>`
      )
      $('#alcpl-child').remove()

    }
  });

});
</script>