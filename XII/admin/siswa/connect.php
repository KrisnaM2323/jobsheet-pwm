<?php
$connect = mysqli_connect("localhost", "root", "", "sekolah");
if (mysqli_connect_error($connect)) {
    echo "Database Tidak Nyambung";
} else {
    echo " ";
}
