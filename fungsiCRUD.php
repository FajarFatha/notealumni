<?php

function ubahData($data){
    global $koneksi;

    $id=$data["id"];
    $nisn=$data["nisn"];
    $nama=$data["nama_siswa"];
    $no=$data["no_telepon"];
    $jurusan=$data["jurusan"];
    $angkatan=$data["angkatan"];
    $jalur=$data["jalur_masuk"];
    $tahun=$data["tahun_masuk"];
    $kode=$data["kode_ptn"];
    $namaptn=$data["nama_ptn"];
    $fakultas=$data["fakultas"];
    $prodi=$data["prodi"];

    $query1 = "UPDATE siswa SET NISN='$nisn', NAMA_SISWA='$nama', NO_TELEPON='$no', JURUSAN='$jurusan', ANGKATAN=$angkatan WHERE ID_MASUK='$id'";
    $input1 = mysqli_query($koneksi, $query1);

    $query2 = "UPDATE jalur SET NISN='$nisn', KODE_PTN=$kode, JALUR_MASUK='$jalur', TAHUN_MASUK=$tahun WHERE ID_MASUK='$id'";
    $input2 = mysqli_query($koneksi, $query2);

    $query3 = "UPDATE ptn SET KODE_PTN=$kode, NAMA_PTN='$namaptn', FAKULTAS='$fakultas', PRODI='$prodi' WHERE ID_MASUK='$id'";
    $input3 = mysqli_query($koneksi, $query3);

    if($input1 && $input2 && $input3){
        echo"<script>
            alert('Data Berhasil di Update')
            document.location.href='admin.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal di Update')
            document.location.href='admin.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);

}

function tambahData($data){
    global $koneksi;
    $nisn=$data["nisn"];
    $nama=$data["nama_siswa"];
    $no=$data["no_telepon"];
    $jurusan=$data["jurusan"];
    $angkatan=$data["angkatan"];
    $jalur=$data["jalur_masuk"];
    $tahun=$data["tahun_masuk"];
    $kode=$data["kode_ptn"];
    $namaptn=$data["nama_ptn"];
    $fakultas=$data["fakultas"];
    $prodi=$data["prodi"];

    $query = "SELECT * FROM jalur ORDER BY ID_MASUK DESC LIMIT 1;";
    $data = mysqli_query($koneksi, $query);

    $ambilid=mysqli_fetch_assoc($data);
    $id = $ambilid["ID_MASUK"];

    $sub_id=intval(substr($id, 1));

    if(mysqli_num_rows($data)!=0){
        $sub_id+=1;
    }else{
        $sub_id = "M1";
    }

    $hasilid = "M{$sub_id}";

    $queryadd1= "INSERT INTO siswa (NISN, id_masuk, nama_siswa, no_telepon, jurusan, angkatan) VALUES ('$nisn', '$hasilid', '$nama', '$no', '$jurusan', $angkatan);";
    $add1=mysqli_query($koneksi, $queryadd1);

    $queryadd2= "INSERT INTO jalur (id_masuk, NISN, kode_ptn, jalur_masuk, tahun_masuk) VALUES('$hasilid', '$nisn', $kode, '$jalur', $tahun);";
    $add2=mysqli_query($koneksi, $queryadd2);

    $queryadd3= "INSERT INTO ptn (kode_ptn, id_masuk, nama_ptn, fakultas, prodi) VALUES ($kode, '$hasilid', '$namaptn', '$fakultas', '$prodi');";
    $add3=mysqli_query($koneksi, $queryadd3);

    if($add1 && $add2 && $add3){
        echo"<script>
            alert('Data Berhasil ditambahkan')
            document.location.href='admin.php'
        </script>";
    }else{
        echo"<script>
            alert('Data gagal ditambahkan')
            document.location.href='admin.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);
    


}

function hapusData($data){
    global $koneksi;

    $id=$data["id_barang"];
    $query1 = "DELETE FROM siswa WHERE siswa.ID_MASUK = '$id'";
    $delete1 = mysqli_query($koneksi, $query1);

    $query2 = "DELETE FROM jalur WHERE jalur.ID_MASUK = '$id'";
    $delete2 = mysqli_query($koneksi, $query2);

    $query3 = "DELETE FROM ptn WHERE ptn.ID_MASUK = '$id'";
    $delete3 = mysqli_query($koneksi, $query3);

    if($delete1 && $delete2 && $delete3){
        echo"<script>
            alert('Data Berhasil dihapus')
            document.location.href='admin.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal dihapus')
            document.location.href='admin.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);
}

?>