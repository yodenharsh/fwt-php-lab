<?php

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once('./vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i++) {
            $rollno = "";
            if (isset($spreadSheetAry[$i][0])) {
                $rollno = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $name = "";
            if (isset($spreadSheetAry[$i][1])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $batch = "";
            if (isset($spreadSheetAry[$i][2])) {
                $batch = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $specialization = "";
            if (isset($spreadSheetAry[$i][3])) {
                $specialization = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $email = "";
            if (isset($spreadSheetAry[$i][4])) {
                $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $semester = "";
            if (isset($spreadSheetAry[$i][5])) {
                $semester = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $phone = "";
            if (isset($spreadSheetAry[$i][6])) {
                $phone = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }

            if (!empty($name)) {
                $query = "insert into  student_details_sot(S_roll,S_name,S_batch,S_specialization,S_email,S_semester,S_phone) values(?,?,?,?,?,?,?)";
                $paramType = "sssssss";
                $paramArray = array(
                    $rollno,
                    $name,
                    $batch,
                    $specialization,
                    $email,
                    $semester,
                    $phone
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into student_details_sot(S_roll,S_name,S_batch,S_specialization,S_email,S_semester_S_phone) values('" . $rollno . "','" . $name. "','" . $batch . "','" . $specialization. "','" . $email . "','" . $semester . "','" . $phone . "')";
                // $result = mysqli_query($conn, $query);

                if ($insertId) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
                $type = "success";
                $message = "Uploaded Successfully";
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial;
            width: 550px;
        }

        .outer-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 40px 20px;
            border-radius: 2px;
        }

        .btn-submit {
            background: #333;
            border: #1d1d1d 1px solid;
            border-radius: 2px;
            color: #f0f0f0;
            cursor: pointer;
            padding: 5px 20px;
            font-size: 0.9em;
        }

        .tutorial-table {
            margin-top: 40px;
            font-size: 0.8em;
            border-collapse: collapse;
            width: 100%;
        }

        .tutorial-table th {
            background: #f0f0f0;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .tutorial-table td {
            background: #FFF;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display: none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
        }
    </style>
</head>

<body>
    <h2>Upload student details</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import" class="btn-submit">Upload</button>

            </div>

        </form>

    </div>
    <div id="response" class="<?php if (!empty($type)) {
                                    echo $type . " display-block";
                                } ?>"><?php if (!empty($message)) {
                                            echo $message;
                                        } ?></div>


    <?php
    $sqlSelect = "SELECT * FROM student_details_sot";
    $result = $db->select($sqlSelect);
    if (!empty($result)) {
    ?>

        <table class='tutorial-table'>
            <thead>
                <tr>
                    <th>Roll no.</th>
                    <th>Student name</th>
                    <th>Batch</th>
                    <th>Specialization</th>
                    <th>E-mail</th>
                    <th>Semester</th>
                    <th>Phone no.</th>

                </tr>
            </thead>
            <?php
            foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['S_roll']; ?></td>
                        <td><?php echo $row['S_name']; ?></td>
                        <td><?php echo $row['S_batch']; ?></td>
                        <td><?php echo $row['S_specialization']; ?></td>
                        <td><?php echo $row['S_email']; ?></td>
                        <td><?php echo $row['S_semester']; ?></td>
                        <td><?php echo $row['S_phone']; ?></td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
        </table>
    <?php
    }
    ?>

</body>

</html>