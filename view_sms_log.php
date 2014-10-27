<?php
    $db_host = "localhost";
    $db_name = "";
    $db_user = "";
    $db_pw = "";

    $con = mysql_connect($db_host, $db_user, $db_pw);
    mysql_select_db($db_name, $con);

    if(isset($_GET["download"])){
        $sql = "SELECT number, message FROM incoming ORDER BY time DESC";
    }
    else{
        $sql = "SELECT number, message FROM incoming ORDER BY time DESC LIMIT 0 , 30";
    }
    $res = mysql_query($sql);

    $row_count = mysql_num_rows($res);
    $rows = array();
    $i = 1;
    while($row = mysql_fetch_array($res)){
        array_push($rows, array("id"=>$i, "number"=>$row[0], "msg"=>$row[1]));
        $i += 1;
    }

    if(isset($_GET["download"])){
        header("Content-Type: text");
        foreach($rows as $row){
            echo $row["number"]."\n";
        }
        return;
    }
?>
<html>
    <head>
        <title>SMS Log</title>
    </head>
    <body>
        Total Recieved: <?php echo $row_count; ?>
        <br/>
        <a href="view_sms_log.php?download=1">Download Numbers</a>
        <br />
        <table>
            <thead>
                <th>#</th>
                <th>Number</th>
                <th>Message</th>
            </thead>
            <tbody>
                <?php
                    foreach($rows as $row){
                        echo sprintf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row["id"], $row["number"], $row["msg"]);
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>