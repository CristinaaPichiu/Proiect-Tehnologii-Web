<?php
    session_start();
    include "DataBaseConn.php";

    if(isset($_POST['uname']) && isset($_POST['psw']))
    {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return data;
        }

        $username = validate($_POST['uname']);
        $pwd = validate($_POST['psw']);

        if(empty($username))
        {
            echo "Username is required";
        }
        if(empty($pwd))
        {
            echo "Password is required";
        }

        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pwd'";
        echo "ajunge aici";

        $result = mysqli_query($conn,$sql);

        if(myssqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password']===$pwd){
                echo "Logged in";
                exit();
            }
            else {
                echo "Credentialele au fost gresite";
            }
        }
    }
?>

