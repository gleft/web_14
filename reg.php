<?php
        include "config.php";
        session_start();
        $link=mysql_connect($db_server["host"], $db_server["username"],
$db_server["password"]) or die(mysql_error());
        mysql_select_db($db_server["database"]) or die(mysql_error());
        mysql_query("SET CHARACTER SET greek", $link);

        $allquery="select * from users";
        $allresult=mysql_query($allquery) or die(mysql_error());

        for ($j=0; $j<mysql_num_rows($allresult); $j++)
        {
                $allrow = mysql_fetch_row($allresult);
                $alllastname=$allrow[1];
                $allfrstname=$allrow[2];
                $allemail=$allrow[4];

                $endiamesquery="update nendiamesosapof set
nenapofemail='".$allemail."' where (nenapoflastname='".$alllastname."' AND
nenapoffrstname='".$allfrstname."')";

                $endiamesresult=mysql_query($endiamesquery) or
die(mysql_error());
        }

        mysql_close;
?>
