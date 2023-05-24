<?php
   $authenticated = false;
   if(isset($_POST['uname']) && $_POST['psw']=="Username")
   {
       $username = $_POST['uname'];
       $pwd = $_POST['psw'];

       $host = "dumbo.db.elephantsql.com";
       $user = "ifyxdeeh";
       $pass = "2ztEW94Zan3R-EGWlW90JiR0WZsDlndx";
       $db = "ifyxdeeh";

       // Open a PostgreSQL connection
       $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
           or die ("Could not connect to server\n");

       // Query to check if user exists with the given username and password
       $query = "SELECT * FROM users WHERE username = '$username' AND password = '$pwd'";
       $result = pg_query($con, $query);

       if (pg_num_rows($result) > 0) {
           // User authentication successful
           $authenticated = true;
       }

       if($authenticated)
       {
           echo "Authentication successful";
       }
       else
       {
           echo "Invalid credentials";
       }
   }
?>
