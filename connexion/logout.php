<?php
    require_once("./open_session.php");  
    setcookie("sid", SID, 1);                   //unset the cookie
    session_destroy();
?>
<script lang="JavaScript">
    window.location.replace("../pages/Accueil.php");
</script>