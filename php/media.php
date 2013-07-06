<?php
function do_get_data()
{
    global $dodo;
    $q = "";
    if ($dodo) {
        $q = " AND idmedia='{$dodo}''";
    }

    $imgb = $_SERVER[HTTP_HOST].dirname($_SERVER[REQUEST_URI])."/images/media/";

    $query = "SELECT idmedia id, title titulo,
        concat('{$imgb}', image) imagen,
        description descripcion, dateu fecha
        FROM ei_media
        WHERE status=1
        {$q};";
    return query($query);
}


?>