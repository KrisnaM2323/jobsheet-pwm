<?php
$connect = mysqli_connect("localhost", "root", "", "sekolah");
if (mysqli_connect_error()) {
    echo "Database Tidak Nyambung";
} else {
    echo " ";
}
