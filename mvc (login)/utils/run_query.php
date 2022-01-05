<?php 
    include_once '../routes/router.php';
    include_once $dbPhp;

    function runQuery($sql){
        $con = createConnection();
        $result = $con->query($sql);

        return $result;
    };
?>