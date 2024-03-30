<?php
header('Content-Type: application/json');
if (isset($_GET['nid'])) {
    include_once 'dbconnect.php';
    $nid = $_GET['nid'];
    if (strlen($nid) != 16) {
        echo json_encode(['ResultStatus' => false, 'ResultData' => 'Invalid NID']);
        exit();
    }
    $sql_check = "SELECT * FROM sectors WHERE national_id = '$nid';";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) < 1) {
        echo json_encode(['ResultStatus' => false, 'ResultData' => 'Your National ID is not registered.']);
        exit();
    }
    $user_details = mysqli_fetch_assoc($result);
    echo json_encode(['ResultStatus' => true, 'ResultData' => $user_details]);
} else {
    echo json_encode(['ResultStatus' => false, 'ResultData' => 'No National ID given']);
    exit();
}
