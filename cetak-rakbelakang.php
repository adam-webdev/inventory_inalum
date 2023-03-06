<?php
// memanggil library FPDF
require('./public/assets/fpdf/fpdf.php');
include './config/database.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();

$pdf->SetFont('Times', '', 18);
$pdf->Cell(200, 10, 'DATA RAK BELAKANG', 0, 0, 'C');
$pdf->SetMargins(15, 15, 15);

$pdf->Cell(10, 12, '', 0, 1);
$pdf->SetFont('Times', 'B', 12);
$pdf->SetFillColor('000000', '000000', '000000');
$pdf->Cell(10, 12, 'NO', 1, 0, 'C');
$pdf->Cell(25, 12, 'Tanggal', 1, 0, 'C');
$pdf->Cell(25, 12, 'No SAP', 1, 0, 'C');
$pdf->Cell(30, 12, 'Sparepart', 1, 0, 'C');
$pdf->Cell(25, 12, 'Meker', 1, 0, 'C');
$pdf->Cell(25, 12, 'No Rak', 1, 0, 'C');
$pdf->Cell(25, 12, 'Jumlah', 1, 0, 'C');
$pdf->Cell(30, 12, 'Penempatan', 1, 0, 'C');


$pdf->Cell(10, 12, '', 0, 1);
$pdf->SetFont('Times', '', 12);
$no = 1;
$data = mysqli_query($conn, "SELECT  * FROM rak_belakang");
while ($d = mysqli_fetch_array($data)) {
  $pdf->Cell(10, 12, $no++, 1, 0, 'C');
  $pdf->Cell(25, 12, DateTime::createFromFormat('Y-m-d', $d['tanggal'])->format('d-m-Y'), 1, 0, 'C');
  $pdf->Cell(25, 12, $d['no_resi'], 1, 0, 'C');
  $pdf->Cell(30, 12, $d['nama_sparepart'], 1, 0, 'C');
  $pdf->Cell(25, 12, $d['meker'], 1, 0, 'C');
  $pdf->Cell(25, 12, $d['no_rak'], 1, 0, 'C');
  $pdf->Cell(25, 12, $d['jumlah'], 1, 0, 'C');
  $pdf->Cell(30, 12, $d['penempatan'], 1, 1, 'C');
}

$pdf->Output();
