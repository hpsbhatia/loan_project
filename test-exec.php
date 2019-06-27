<?php

$output = shell_exec('/usr/bin/python3 /var/www/aicom2/aspire_test.py');
# preg_match('/(\{.*\})/', $output, $outputs);
# preg_replace("'", '"', $outputs);
echo $output." \n";
$js = json_decode($output, false);
echo "printing out json_decode array \n";
print_r($js);
echo " \n"
?>
