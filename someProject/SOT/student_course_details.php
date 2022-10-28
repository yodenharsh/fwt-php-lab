<?php

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once '../DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once('../vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = '../uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {
            $subjectName = "";
            if (isset($spreadSheetAry[$i][0])) {
                $subjectName = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $subjectCode = "";
            if (isset($spreadSheetAry[$i][1])) {
                $subjectCode = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $semester = "";
            if (isset($spreadSheetAry[$i][2])) {
                $semester = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $credits = "";
            if (isset($spreadSheetAry[$i][3])) {
                $credits = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $programCode = "";
            if (isset($spreadSheetAry[$i][4])) {
                $programCode = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            if (!empty($subjectCode)) {
                $query = "insert into  student_course_details_sot(S_subject_name,S_subject_code,S_semester,S_credits,S_program_code) values(?,?,?,?,?)";
                $paramType = "sssss";
                $paramArray = array(
                    $subjectName,
                    $subjectCode,
                    $semester,
                    $credits,
                    $programCode
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into student_course_details_sot(S_roll,S_name,S_batch,S_specialization,S_email,S_semester_S_phone) values('" . $rollno . "','" . $name. "','" . $batch . "','" . $specialization. "','" . $email . "','" . $semester . "','" . $phone . "')";
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

        .instructions {
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    <h2>Upload Student Course Details</h2>
    <div class="outer-container instructions">
        <h3> Required Excel sheet format: </h3>
        <ul>
            <li>
                <h3>Row layout:&emsp;&emsp; Subject name , Subject code , Semester , Credits , Program code</h3>
            </li>
            <li>
                <h3>Actual Data should start from the second row and first column. No column and row headings </h3>
            </li>
            <li>
                <button type="input" class="btn-submit"><a style="color:white;text-decoration:none;" href="/someProject/Template/Student_course_details.xlsx">Download spreadsheet template</a></button>
            </li>
        </ul>
    </div>
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
    $sqlSelect = "SELECT * FROM student_course_details_sot";
    $result = $db->select($sqlSelect);
    if (!empty($result)) {
    ?>

        <table class='tutorial-table'>
            <thead>
                <tr>
                    <th>Subject name</th>
                    <th>Subject ID</th>
                    <th>Semester</th>
                    <th>Credits</th>
                    <th>Program code</th>
                </tr>
            </thead>
            <?php
            foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['S_subject_name']; ?></td>
                        <td><?php echo $row['S_subject_code']; ?></td>
                        <td><?php echo $row['S_semester']; ?></td>
                        <td><?php echo $row['S_credits']; ?></td>
                        <td><?php echo $row['S_program_code']; ?></td>
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