<?php



session_start();
//Bikin koneksi
$c = mysqli_connect('localhost','root','','kasir');


//login
if(isset($_POST['login'])){
    //initiate variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($c,"SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //jika datanya ditemukan
        //berhasil login

        $_SESSION['login'] = 'True';
        header('location:index.php');
    } else {
        //data tidak ditemukan
        //gagal login
        echo '
        <script>alert("username atau password salah");
        window.location.href="login.php"
        </script>
        ';
    }

}

    if(isset($_POST['tambahbarang'])){
        $namaproduk = $_POST['namaproduk'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];
        $harga = $_POST['harga'];

        $insert = mysqli_query($c,"insert into produk (namaproduk,deskripsi,harga,stock) values('$namaproduk',
        '$deskripsi','$harga','$stock')");
        
        if($insert){
            header('location:stock.php'); 
        } else {
            echo '
            <script>alert("Gagal menambah barang baru");
            window.location.href="stock.php"
            </script>
            ';

        }

 }
?>







