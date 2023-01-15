<?php
if(!empty($_SESSION['start_time']))
{
    if((time() - $_SESSION['start_time']) > 10)
    {
        session_destroy();
    }
}
?>