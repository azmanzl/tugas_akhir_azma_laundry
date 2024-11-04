<?php
    require 'connection.php';

    if(isset($_GET['action']) && isset($_GET['id'])){
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch($action){
            case 'delete' :
                delete_data($id);
                break;
            case 'edit' :
                echo "";
                break;
            default:
            echo "Aksi tidak di definisikan";
        }
    }else{
        echo " ";
    }

    //Function untuk menghapus data pelanggan
    function delete_data($id_pelanggan){
        //Open global connection ke database
        global $connection;
        //Query untuk menghapus pelanggan berdasarkan id
        $res = mysqli_query($connection, "DELETE FROM tb_pelanggan WHERE id_pelanggan = " . $id_pelanggan);
        echo "Data ini akan menghapus ID : " . $id_pelanggan;

        if($res){
            //Jika kondisi true maka data berhasil dihapus dan menampilkan pesan berhasil menghapus data
            header("Location: data_pelanggan.php?messages=Berhasil dihapus");
            exit();
        }else{
            //Jika kondisi false maka data tidak iterhapus dan menampilkan pesan gagal menghapus data
             header("Location: data_pelanggan.php?messages=Gagal dihapus");
             exit();
        }
    }

    function update($data_pelanggan){
       

     }
?>