<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER["DOCUMENT_ROOT"]));
$parse = parse_url($_SERVER["REQUEST_URI"]);
if(mb_substr($parse['path'], -1) === '/') {
    $parse['path'] .= $_SERVER["SCRIPT_NAME"];
};
if(mb_substr($_SERVER["REQUEST_URI"],11,1) == 'i'||'M'||'t'){
    include(ROOT_PATH.'views'.$parse['path']);
};

 ?>
