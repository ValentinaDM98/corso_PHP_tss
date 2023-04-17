<?php
// echo phpinfo();


$dirs = [
 "vincenzo_mola"
,"alana"
,"andrea_fabbricatore"
,"cinzia_vittone"
,"emanuela_velardo"
,"fabio_miseo"
,"matteo_peiretti"
,"matteo_vayr"
,"mattia_caddeo"
,"simone_greco"
,"valentina_del_monaco"
];

foreach ($dirs as $dir) {
    # code...
    mkdir($dir."/todolist_html",0777,true);
}