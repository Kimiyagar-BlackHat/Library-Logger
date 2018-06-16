<?php
	include_once "LoggerController.php";
    _Log(EMERGENCY , __FILE__ , __LINE__ , 'Emergency Message');
    _Log(ALERT     , __FILE__ , __LINE__ , 'ALert Message');
    _Log(CRITICAL  , __FILE__ , __LINE__ , 'Critical Message');
    _Log(ERROR     , __FILE__ , __LINE__ , 'Error Message');
    _Log(WARNING   , __FILE__ , __LINE__ , 'Warning Message');
    _Log(NOTICE    , __FILE__ , __LINE__ , 'Notice Message');
    _Log(INFO      , __FILE__ , __LINE__ , 'Info Message');
    _Log(DEBUG     , __FILE__ , __LINE__ , 'Debug Message');
?>