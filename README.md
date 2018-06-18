# Library-Logger
A library for print php files log By {- kimiyagar - BlackHat -}
*******************************************************************************
# FIRST TO DO
*******************************************************************************
1) Include Logger/Logger.php file in your file like sample index.php file<br />
2) For every log type these :<br />
*******************************************************************************
    _Log('EMERGENCY' , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('ALERT'     , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('CRITICAL'  , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('ERROR'     , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('WARNING'   , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('NOTICE'    , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('INFO'      , __FILE__ , __LINE__ , 'Your Log Message');
    _Log('DEBUG'     , __FILE__ , __LINE__ , 'Your Log Message');
*******************************************************************************
3) To change config of logger , go to Config.php file and change config like these :<br />
*******************************************************************************
    define('EnableLog'      ,  true);
    define('LogLevel'       , 'Debug');
    define('LogFilePath'    , 'OutputLogFiles/');
*******************************************************************************
EnableLog : true or false<br>
LogLevel : 'Debug'|'Info'|'Notice'|'Warning'|'Error'|'Critical'|'Alert'|'Emergency'<br>
LogFilePath : Path to create log file<br>
*******************************************************************************
4) To see your web log , go to LogFilePath that you insert. 
*******************************************************************************