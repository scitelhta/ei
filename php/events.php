<?php

function do_get_data() {


    $imgb = $_SERVER[HTTP_HOST].dirname($_SERVER[REQUEST_URI])."/images/events/";

    $query = "SELECT idevent id, datei fechai, datef fechaf,
                name nombre, place lugar, url,
                concat('{$imgb}', guid, '.jpg') imagen
              FROM ei_event
              WHERE itime>now();";
    $q = query($query);

    return $q;
}


?>