<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
  body {
    font-family: sans-serif;
  }

  table {
    margin: 20px auto;
    border: 1px solid black;
    border-collapse: collapse;
  }


  table th,
  table td {
    border: 1px solid black;
    padding: 10px 12px;
    text-align: center;

  }

  a {
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  </style>
</head>

<body>

  <?php
  // header("Content-type: application/vnd-ms-excel");
  // header('Content-Type: text/csv; charset=utf-8');
  // header("Content-Disposition: attachment; filename=Data Rak Depan.xls");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  // header('Content-Disposition: attachment; filename= data-rak-depan.xlsx');
  ?>

  <div class="card p-4 m-4">
    <div class="mb-4 d-flex justify-content-between">


      <!-- <a type="button" href="cetak-rakdepan.php" class="btn btn-primary"> + Cetak PDF
    </a> -->

    </div>
    <h4 style="text-align: center;">Data Rak Belakang</h4>
    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>No Resi</th>
          <th>Nama Sparepart</th>
          <th>Meker</th>
          <th>No Rak</th>
          <th>Jumlah Barang</th>
          <th>Penempatan</th>
        </tr>
      </thead>
      <tbody> -->
    <?php

    require './vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Tanggal');
    $sheet->setCellValue('C1', 'No Resi');
    $sheet->setCellValue('D1', 'Nama Sparepart');
    $sheet->setCellValue('E1', 'Meker');
    $sheet->setCellValue('F1', 'No Rak');
    $sheet->setCellValue('G1', 'Jumlah');
    $sheet->setCellValue('H1', 'Penempatan');
    require_once('./config/database.php');


    // $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A1:H1')->getFill()->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN);
    $sheet->getStyle('A1:H1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

    $sheet->getStyle('A1:H1')->getFont()->setBold(true);

    $rak_belakang = "SELECT * FROM rak_belakang";
    $query = mysqli_query($conn, $rak_belakang);
    $no = 1;
    $i = 2;


    while ($row = mysqli_fetch_array($query)) {
      $sheet->setCellValue('A' . $i, $no++);
      $sheet->setCellValue('B' . $i, DateTime::createFromFormat('Y-m-d', $row['tanggal'])->format('d-m-Y'));
      $sheet->setCellValue('C' . $i, $row['no_resi']);
      $sheet->setCellValue('D' . $i, $row['nama_sparepart']);
      $sheet->setCellValue('E' . $i, $row['meker']);
      $sheet->setCellValue('F' . $i, $row['no_rak']);
      $sheet->setCellValue('G' . $i, $row['jumlah']);
      $sheet->setCellValue('H' . $i, $row['penempatan']);
      $i++;
    }




    $sheet->getStyle('A1:H' . $no)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A1:H' . $no)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $writer = new Xlsx($spreadsheet);
    $writer->save('Data Rak Belakang.xlsx');
    echo "<script>window.location = 'Data Rak Belakang.xlsx'</script>";
    ?>
    </tbody>

    </table>
  </div>

</body>

</html>