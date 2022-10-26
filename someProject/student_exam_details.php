<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');

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

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $rollno = "";
            if (isset($spreadSheetAry[$i][0])) {
                $rollno = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $cgpa = "";
            if (isset($spreadSheetAry[$i][1])) {
                $cgpa = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $subjectID = "";
            if (isset($spreadSheetAry[$i][2])) {
                $subjectID = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $grade = "";
            if (isset($spreadSheetAry[$i][3])) {
                $grade = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $sgpa1 = "";
            if (isset($spreadSheetAry[$i][4])) {
                $sgpa1 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $sgpa2 = "";
            if (isset($spreadSheetAry[$i][5])) {
                $sgpa2 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $sgpa3 = "";
            if (isset($spreadSheetAry[$i][6])) {
                $sgpa3 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
            $sgpa4 = "";
            if (isset($spreadSheetAry[$i][7])) {
                $sgpa4 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }
            $sgpa5 = "";
            if (isset($spreadSheetAry[$i][8])) {
                $sgpa5 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            $sgpa6 = "";
            if (isset($spreadSheetAry[$i][9])) {
                $sgpa6 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }
            $sgpa7 = "";
            if (isset($spreadSheetAry[$i][10])) {
                $sgpa7 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
            }
            $sgpa8 = "";
            if (isset($spreadSheetAry[$i][11])) {
                $sgpa8 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);

            }
            if (! empty($rollno)) {
                $query = "insert into  student_exam_details_sot(S_roll,S_cgpa,S_subjectID,S_grade,S_sgpa1,S_sgpa2,S_sgpa3,S_sgpa4,S_sgpa5,S_sgpa6,S_sgpa7,S_sgpa8) values(?,?,?,?,?,?,?,?,?,?,?,?)";
                $paramType = "ssssssssssss";
                $paramArray = array(
                    $rollno,
                    $cgpa,
                    $subjectID,
                    $grade,
                    $sgpa1,
                    $sgpa2,
                    $sgpa3,
                    $sgpa4,
                    $sgpa5,
                    $sgpa6,
                    $sgpa7,
                    $sgpa8
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
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
    <h2>Upload Student Exam Details</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport"
            id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file"
                    name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Upload</button>

            </div>

        </form>

    </div>
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


<?php
$sqlSelect = "SELECT * FROM student_exam_details_sot";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Roll no.</th>
                <th>CGPA</th>
                <th>Subject ID</th>
                <th>Grade</th>
                <th>Semester 1 GPA</th>
                <th>Semester 2 GPA</th>
                <th>Semester 3 GPA</th>
                <th>Semester 4 GPA</th>
                <th>Semester 5 GPA</th>
                <th>Semester 6 GPA</th>
                <th>Semester 7 GPA</th>
                <th>Semester 8 GPA</th>

            </tr>
        </thead>
<?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['S_roll']; ?></td>
                <td><?php  echo $row['S_cgpa']; ?></td>
                <td><?php  echo $row['S_subjectID']; ?></td>
                <td><?php  echo $row['S_grade']; ?></td>
                <td><?php  echo $row['S_sgpa1']; ?></td>
                <td><?php  echo $row['S_sgpa2']; ?></td>
                <td><?php  echo $row['S_sgpa3']; ?></td>
                <td><?php  echo $row['S_sgpa4']; ?></td>
                <td><?php  echo $row['S_sgpa5']; ?></td>
                <td><?php  echo $row['S_sgpa6']; ?></td>
                <td><?php  echo $row['S_sgpa7']; ?></td>
                <td><?php  echo $row['S_sgpa8']; ?></td>
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