<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function generatePassword() {
            const randPassword = Math.random().toString(36).slice(2, 10);
            document.getElementById("password").value = randPassword;
        }
    </script>
</head>

<body>
    <header>
        <h1 class="header-text">Database Admin page</h1>
    </header>

    <div class="form-card">
        <h3>Add a new user</h3>
        <form>
            <div>
                <label for="email-id">Email ID: </label>
                <input type="email" name="emailid" placeholder="example@example.com" />
            </div>
            <br>
            <div style="margin-top: 3px;">
                <label for="password">Password</label>
                <input type="text" name="password" value="" id="password">
                <button class="password-btn" type="button" onclick="generatePassword()">Generate random password </button>
            </div>
            <div style="margin-top: 10px;">
                <label for="exam-details-boolean">Can upload exam details?</label>
                <input type="radio" name="exam-details-boolean" value="no">No</input>
                <input type="radio" name="exam-details-boolean" value="yes">Yes</input>
            </div>
            <div class="submit-btn-div">
                <button type="submit" class="submit-btn">Add user</button>
            </div>
        </form>
        <br /><br />
    </div>
</body>

</html>