<?php 
if($type == 'add2cart'):
$data = array();

$data['ok'] = 1;
$data['total'] = $total;

echo json_encode($data);

endif;
?>