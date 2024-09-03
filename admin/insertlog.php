<?php
if(isset($_POST['full_name']) && isset($_POST['nic']) && isset($_POST['page_title']) && isset($_POST['current_date'])) {
    // Check if required fields are not empty
    if(!empty($_POST['full_name']) && !empty($_POST['nic'])) {
        include('../connection.php');

        $full_name = $_POST['full_name'];
        $nic = $_POST['nic'];
        $service_name = $_POST['page_title'];
        $current_date = $_POST['current_date'];

        $sql = "INSERT INTO `log`(`full_name`, `nic`, `service_name`, `current_date`) VALUES (?, ?, ?, ?)";
        $stmt = $database->prepare($sql);

        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ssss", $full_name, $nic, $service_name, $current_date);

            if ($stmt->execute()) {
                // Redirect back to the previous page with message as URL parameter
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
                exit();
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $database->error;
        }

        $database->close();
    } else {
        // Redirect back to the previous page with message as URL parameter
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        exit();
    }
} else {
    echo "لا يوجد بيانات مدخلة!";
}
?>
