<?php
    if (session_status()==PHP_SESSION_ACTIVE){
        session_id(SID);
        session_start();
    }
    else{
        session_start();
        setcookie("sid", SID);
    }
?>