<?php
session_start();

include "./config/db.php";

    //Verify user Start
    if (isset($_POST['cert_search_btn'])) {

        $certNum = $conn->real_escape_string($_POST['certNum']);

            $query = "SELECT * FROM certificate WHERE certNum='$certNum'";
            $results = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results)) {
                $certNum = $row['certNum'];
                $client = $row['client'];
                $title = $row['title'];
                $image = $row['image'];
            }
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['certNum'] = $certNum;
                $_SESSION['client'] = $client;
                $_SESSION['title'] = $title;
                $_SESSION['image'] = $image;
            header('location: certificate-details');
            }else {
                $_SESSION['message_title'] = "Incorrect Certificate No.";
                $_SESSION['message'] = "Please Verify Certificate No.";
            }
    }

?>