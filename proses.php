<?php
session_start();
require 'db.php';
if($_GET["act"] == "login") {
    $uname = addslashes($_POST["Username"]);
    $upass = addslashes(md5($_POST["Password"]));
    $sql = "select * from user where username = '".$uname."'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result)) {
        $row = mysqli_fetch_object($result);
        if ($row->isDelete == 0 ) {
            if(trim($row->password) == $upass) {
            $_SESSION["logkaryawan"] = $uname;
            $_SESSION["idkaryawan"] = $row->Karyawan_idKaryawan;

            $sqlJabatan = "SELECT * FROM karyawan WHERE idKaryawan = '".$row->Karyawan_idKaryawan."'";
            $resultJabatan = mysqli_query($link,$sqlJabatan);
            if ($rowJabatan = mysqli_fetch_object($resultJabatan)) {
                $_SESSION["jabatan"] = $rowJabatan->jabatan;
            }
            header("Location: index.php");
        }
        else {
            header("Location: login.php?msg=wrongpassword");
        }

        }
        else {
            header("Location: login.php?msg=notfound");
        }
        
    } else {
        header("Location: login.php?msg=notfound");
    }
}
else if($_GET["act"] == "logout") {
    unset($_SESSION["logkaryawan"]);
    header("Location: login.php");
}
?>