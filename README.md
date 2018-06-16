# Library-Logger
A library for print php files log By {- kimiyagar - BlackHat -}
*******************************************************************************
# FIRST TO DO
*******************************************************************************
1) include LoggerController.php file in your file like sample index.php file<br />
2) For every log type these :<br />
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
3) To change config of logger , go to Config.php file and change config like these :<br />
*******************************************************************************
	define('_ENABLE_LOG'        , TRUE);<br />
	define('_LOG_LEVEL'         , 'DEBUG');<br />
	define('_LOG_FILE_PATH'     , 'OutputLogFiles/');<br />
*******************************************************************************
**help )
*******************************************************************************
_ENABLE_LOG : TRUE or FALSE;<br />
_LOG_LEVEL : 'EMERGENCY' or 'ALERT' or 'CRITICAL' or 'ERROR' or 'WARNING' or 'NOTICE' or 'INFO' or 'DEBUG';<br />
_LOG_FILE_PATH : path of make log file;<br />
*******************************************************************************
		