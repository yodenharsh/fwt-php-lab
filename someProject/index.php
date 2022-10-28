<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div>
        <h1>Placeholder header</h1>
    </div>
    <ul class="main-list">
        <li>
            <div>
                <h3>Student login</h3>
                <form>
                    <div>
                        <label for="rollno">Roll No./UGID </label>
                        <input type="text" name="rollno" title="rollno" />
                    </div>
                    <div>
                        <label for="school">Select school </label>
                        <select name="school">
                            <option value="sot">School of Technology </option>
                            <option value="sob">School of Business </option>
                            <option value="soad">School of Arts & Design </option>
                            <option value="soap">School of Architecture & Planning </option>
                            <option value="soah">School of Arts & Humanities</option>
                        </select>
                    </div>
                </form>
                <a href="SOT\student_exam_details.php"><button>Login and View Marksheet</button></a>
            </div>
        </li>
        <li>
            <div>
                <h3>COE login</h3>
                <div>
                    <label for="password">Enter password: </label>
                    <input type="password" name="password" title="password" />
                </div>
            </div>
        </li>
    </ul>
</body>

</html>