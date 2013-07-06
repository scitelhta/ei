<?php
function do_get_data()
{
    global $dodo;
    $q = "";
    if ($dodo) {
        $q = " AND idmedia={$dodo}";
    }

    $query = "SELECT idmedia id, title titulo,
        concat('images/media/', image) imagen,
        description descripcion, dateu fecha
        FROM media
        WHERE status=1
        {$q};";
    return query($query);
}


?>