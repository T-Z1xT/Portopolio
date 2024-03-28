<?php

include_once "../controller/c_foto.php";
$photoo = new c_foto();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id'];
    $iduser = $_POST['user_id'];
    $album_id = $_POST['album_id'];
    $poto = $_FILES['poto']['name']; 
    $can = array('jpg', 'png', 'jpeg');
    $x = explode('.', $poto);
    $ekstensi = strtolower(end($x));
    $tmp = $_FILES['poto']['tmp_name'];

    if (in_array($ekstensi, $can) == true) {
        move_uploaded_file($tmp, '../assets/img/' . $poto);

        $photoo->insert( $id_user, $album_id, $poto);

        echo "<script>alert ('Foto telah berhasil ditambahkan')</script>";
        
    }else {
        echo "<script>alert ('Tolong masukan foto')</script>";
        
    }
}elseif ($_GET['aksi'] == 'delete') {
    
}elseif ($_GET['aksi'] == 'update') {
    $FotoID = $_POST['foto_id'];
    $dalbum = $_POST['album_id'];

}
