<?php

    $id=$_REQUEST['codigo'];
    $ban=0;

    if($id>10){
        $ban=1;
    }

    echo $ban;

?>