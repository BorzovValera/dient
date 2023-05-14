<?php

$conn = mysqli_connect('localhost', 'root', '', 'dip');

if(!$conn){
    echo 'Connect error: ' . mysqli_connect_error();
}