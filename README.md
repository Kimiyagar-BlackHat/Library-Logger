# Library-Logger
A library for print php files log By {- kimiyagar - BlackHat -}
*******************************************************************************
#FIRST TO DO
*******************************************************************************
1) include LoggerController.php file in your file like sample index.php file
2) For every log type these :
*******************************************************************************
    _Log(EMERGENCY , __FILE__ , __LINE__ , 'Emergency Message');
    _Log(ALERT     , __FILE__ , __LINE__ , 'ALert Message');
    _Log(CRITICAL  , __FILE__ , __LINE__ , 'Critical Message');
    _Log(ERROR     , __FILE__ , __LINE__ , 'Error Message');
    _Log(WARNING   , __FILE__ , __LINE__ , 'Warning Message');
    _Log(NOTICE    , __FILE__ , __LINE__ , 'Notice Message');
    _Log(INFO      , __FILE__ , __LINE__ , 'Info Message');
    _Log(DEBUG     , __FILE__ , __LINE__ , 'Debug Message');
*******************************************************************************
3) To change config of logger , go to Config.php file and change config like these :
*******************************************************************************
	define('_ENABLE_LOG'		, TRUE);
	define('_LOG_LEVEL'         , 'DEBUG');
	define('_LOG_FILE_PATH'     , 'OutputLogFiles/');
*******************************************************************************
**help )
*******************************************************************************
_ENABLE_LOG : TRUE or FALSE
_LOG_LEVEL : 'EMERGENCY' or 'ALERT' or 'CRITICAL' or 'ERROR' or 'WARNING' or 'NOTICE' or 'INFO' or 'DEBUG'
_LOG_FILE_PATH : path of make log file
*******************************************************************************
		