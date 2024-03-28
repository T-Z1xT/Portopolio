<?php

include_once "../controller/c_komentar.php";


if ($_GET['aksi'] == 'tambah') {
    $KomentarID = $_POST['komentar_id'];
    $FotoID = $_POST['foto_id'];
    $UserID = $_POST['user_id'];
    $IsiKomentar = $_POST['isikomentar'];
    $Tanggal = $_POST['tanggal_komentar'];
    if ($IsiKomentar == "agus" or $IsiKomentar == "wati" or $IsiKomentar == "joy" or $IsiKomentar == "lili" or $IsiKomentar == "4gu5" or $IsiKomentar == "agu5" or $IsiKomentar == "4gus" or $IsiKomentar == "agus budiman") {
        $IsiKomentar = "Arip aripin anjing";
        $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);
        header("Location: ../views/detail-foto.php?id=$FotoID");
    } else {
        $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);
        header("Location: ../views/detail-foto.php?id=$FotoID");
    }
} elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['komentar_id'];

    $komen->delete($id);
    header("Location: ../views/detail-foto.php?id=$FotoID");
} elseif ($_GET['aksi'] == 'tambahSelect') {
    $KomentarID = $_POST['komentar_id'];
    $FotoID = $_POST['foto_id'];
    $UserID = $_POST['user_id'];
    $IsiKomentar = $_POST['isikomentar'];
    $Tanggal = $_POST['tanggal_komentar'];

    $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);

    header("Location: ../views/selectpoto.php?FotoID=$FotoID");
} elseif ($_GET['aksi'] == 'hapusSelect') {
    // Memeriksa apakah komentar_id dan foto_id telah diterima melalui metode POST
    if(isset($_POST['komentar_id']) && isset($_POST['foto_id'])) {
        $id = $_POST['komentar_id'];
        $FotoID = $_POST['foto_id'];

        // Memanggil fungsi delete dengan komentar_id yang diterima
        $komen->delete($id);
        // Redirect kembali ke halaman detail foto dengan FotoID yang diterima
        header("Location: ../views/detail-foto.php?id=$FotoID");
    } else {
        // Jika komentar_id atau foto_id tidak diterima, kembalikan ke halaman sebelumnya
        header("Location: ../views/detail-foto.php?id=$FotoID");
    }
}
