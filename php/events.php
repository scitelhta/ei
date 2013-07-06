<?php

function do_get_data() {


    $imgb = $_SERVER[HTTP_HOST].dirname($_SERVER[REQUEST_URI])."/images/events/";

    $query = "SELECT id, itime fechai, ftime fechaf,
                name nombre, place lugar, url,
                concat('{$imgb}', guid, '.jpg') imagen
              FROM events
              WHERE itime<now() limit 10;";
    $q = query($query);

    return $q;
}


?>