<?php  include('dbcon.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>ADMIN DASHBOARD</title>
        
        <link rel = "stylesheet" type = "text/css" href = "CSS/ADMIN_DASHBOARD_STYLE.css">

    </head>
    
    <body>
        <h2>TABLES</h2>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="SEARCH A TABLE..." title="Type in a name">
            <ul id="myUL">
                <li><a href="http://localhost/PROJECT/TABLES/CLUB.php">CLUB</a></li>
                <li><a href="#">OWNER</a></li>                

                <li><a href="#">PLAYER</a></li>
                <li><a href="#">COACH</a></li>
                <li><a href="#">MANAGER</a></li>

                <li><a href="#">STADIUM</a></li>
                <li><a href="#">KIT</a></li>


                <li><a href="#">MEDICAL STUFF</a></li>
                <li><a href="#">GROUND STUFF</a></li>
            </ul>

        <div class="cards">
        <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM CLUB ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>CLUB</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM OWNER ';

                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>OWNER</span>
                </div>
            </div>


            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM PLAYER ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>PLAYER</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM COACH ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>COACH</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM MANAGER ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>MANAGER</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM STADIUM ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>STADIUM</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM KIT ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>KIT</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM MEDICAL_STUFF ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>MEDICAL_STUFF</span>
                </div>
            </div>

            <div class="card">
                <div>
                   <h3><?php $sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM GROUND_STUFF ';
                    $stmt= oci_parse($conn, $sql_query);
                    oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
                    oci_execute($stmt);
                    oci_fetch($stmt);
                    echo $number_of_rows;?></h3>
                    <span>GROUND_STUFF</span>
                </div>
            </div>

            
        </div>


        <script>
            function myFunction() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName("li");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
        </script>
    </body>
</html>
