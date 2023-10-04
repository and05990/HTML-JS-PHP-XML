<?php
    echo "<link rel='stylesheet' href='style.css'>";
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['date'])){
        //if field are "" print some thing
        if($_POST['name'] == "" || $_POST['surname'] == "" || $_POST['date'] == ""){
            echo "<p> You are 110% GAY </p>";
        } else {
            $random = rand(0, 100);
            if($random % 2 == 0)
            {
                echo "<p> You are gay </p>";
            } else {
                echo "<p> You are normal </p>";
            }
        }

        echo "<form action='main.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='submit' value='Go back'>";
        echo "</form>";

    } else {
        echo "Error: missing data";
    }
?>