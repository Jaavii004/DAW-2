<?php

// hora espa
date_default_timezone_set('Europe/Madrid');
echo date('Y-m-d H:i:s');

$output = shell_exec('w');
echo "<pre>$output</pre>";

?>
