<?php
if(isset($_POST['submit']))
{
    include_once 'dbconnect.php';
    $names = $_POST['names'];
    $given_national_id = $_POST['national_id'];
    $sector = $_POST['sector'];
    $cell = $_POST['cell'];

    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    if(empty($gender) || empty($phone))
    {
        header("location: district.php?msg=empty_fields");
        exit();
    }
    if(strlen($phone) != 10)
    {
        header("location: district.php?msg=invalid_phone");
        exit();
    }

    $given_national_id_2 = str_replace(' ', '', $given_national_id);
    $national_id = str_replace('-', '', $given_national_id_2);

    if(empty($national_id) || empty($names) || empty($sector) || empty($cell))
    {
        header("location: district.php?msg=empty_fields");
        exit();
    }

    if(strlen($national_id) != 16)
    {
        header("location: district.php?msg=invalid_id");
        exit();
    }

    $sql_check = "SELECT * FROM districts WHERE national_id = '$national_id';";
    $result = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result) > 0)
    {
        header("location: district.php?msg=already_exists");
        exit();
    }

    $sql = "INSERT INTO districts (national_id, names, sector, cell, phone, gender) VALUES('$national_id', '$names', '$sector', '$cell', '$phone', '$gender');";
    mysqli_query($conn, $sql);
    header("location: district.php?msg=added");
    exit();
}
else
{
    header("location: district.php?msg=redirected");
    exit();
}