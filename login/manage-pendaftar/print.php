<?php
//menyertakan file fpdf, file fpdf.php di dalam folder FPDF yang diekstrak
include "../fpdf185/fpdf.php";

//membuat objek baru bernama pdf dari class FPDF
//dan melakukan setting kertas l : landscape, A5 : ukuran kertas
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// menyetel font yang digunakan, font yang digunakan adalah arial, bold dengan ukuran 16
$pdf->SetFont('Arial', 'B', 16);
// judul
$pdf->Cell(100, 7, 'List Pendaftar Program MBKM 2023', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(7, 6, "No", 1, 0);
$pdf->Cell(45, 6, "Nama Mahasiswa", 1, 0);
$pdf->Cell(25, 6, "NIM", 1, 0);
$pdf->Cell(55, 6, "Program MBKM", 1, 0);
$pdf->Cell(20, 6, "Semester", 1, 0);
$pdf->Cell(30, 6, "NO HP", 1, 0);
$pdf->Cell(70, 6, "Email", 1, 0);
$pdf->Cell(25, 6, "Status", 1, 1);

$pdf->SetFont('Arial', '', 10);

include("../koneksi.php");

$no = 1;
$tampil = mysqli_query($koneksi, "select * from registrasi WHERE status='Terverifikasi' ORDER BY timestamp ASC");
while ($hasil = mysqli_fetch_array($tampil)) {
    $pdf->Cell(7, 6, $no++, 1, 0);
    $pdf->Cell(45, 6, $hasil['nama'], 1, 0);
    $pdf->Cell(25, 6, $hasil['nim'], 1, 0);
    $pdf->Cell(55, 6, $hasil['program'], 1, 0);
    $pdf->Cell(20, 6, $hasil['semester'], 1, 0);
    $pdf->Cell(30, 6, $hasil['no_hp'], 1, 0);
    $pdf->Cell(70, 6, $hasil['email'], 1, 0);
    $pdf->Cell(25, 6, $hasil['status'], 1, 1);
}

$pdf->Output();
