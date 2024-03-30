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
    $occupation = $_POST['occupation'];

    if(empty($gender) || empty($phone) || empty($occupation))
    {
        header("location: citizen.php?msg=empty_fields");
        exit();
    }
    if(strlen($phone) != 10)
    {
        header("location: citizen.php?msg=invalid_phone");
        exit();
    }


    $given_national_id_2 = str_replace(' ', '', $given_national_id);
    $national_id = str_replace('-', '', $given_national_id_2);

    if(empty($national_id) || empty($names) || empty($sector) || empty($cell))
    {
        header("location: citizen.php?msg=empty_fields");
        exit();
    }

    if(strlen($national_id) != 16)
    {
        header("location: citizen.php?msg=invalid_id");
        exit();
    }

    $sql_check = "SELECT * FROM citizens WHERE national_id = '$national_id';";
    $result = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result) > 0)
    {
        header("location: citizen.php?msg=already_exists");
        exit();
    }

    $sql = "INSERT INTO citizens (national_id, names, sector, cell, gender, phone, occupation) VALUES('$national_id', '$names', '$sector', '$cell', '$gender', '$phone', '$occupation');";
    mysqli_query($conn, $sql);
    header("location: citizen.php?msg=added");
    exit();
}
else
{
    header("location: citizen.php?msg=redirected");
    exit();
}