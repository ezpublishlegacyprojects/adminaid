<?php

$Module = array( 'name' => 'AdminAid' );

$ViewList = array();
// Administrator user switching
$ViewList['user_switch'] = array( 'script' => 'user_switch.php', 'functions' => array( 'user_switch' ), 'params' => array( 'user_id' ) );
$ViewList['object_list'] = array( 'script' => 'object_list.php', 'functions' => array( 'object_view' ), 'params' => array( 'class_id', 'limit' ), 'unordered_params' => array( 'offset' => 'offset' ) );
$ViewList['object_view'] = array( 'script' => 'object_view.php', 'functions' => array( 'object_view' ), 'params' => array( 'object_id' ) );

// Access permission functions
$FunctionList = array();
$FunctionList['user_switch'] = array();
$FunctionList['object_view'] = array();

?>
