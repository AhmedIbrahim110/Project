<?php
include_once 'database.php';

if (isset($_POST['upload'])) {
    $file_name = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $uploaded_time = date('Y-m-d H:i:s');
    $folder = "upload/";

    /* new file size in KB */
    $new_size = $file_size / 1024;
    /* new file size in KB */

    /* make file name in lower case */
    $new_file_name = strtolower($file_name);
    /* make file name in lower case */

    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql = "INSERT INTO file (file_name, uploaded_time, size) VALUES ('$final_file', '$uploaded_time', '$new_size')";

        mysqli_query($conn, $sql);

        echo "File successfully uploaded";

        header('Refresh: 1; URL=index.php');
    } else {
        echo "Error. Please try again";
    }
}
?>

<a class="button" href="index.php">Go Back</a>