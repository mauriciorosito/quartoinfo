<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('P'));
?>

<a href="../../system/logout.php" class="btn"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sair</a>