<?php
	include_once 'Config.php';
	include_once "LoggerLibrary/Logger.php";
	if(_ENABLE_LOG == TRUE)
	{
		$Logger = new LOGGER(_LOG_FILE_PATH , _LOG_LEVEL);
	}
	define("DEBUG" , "Debug");
	define("Debug" , "Debug");
	define("debug" , "Debug");
	
	define("INFO" , "Info");
	define("Info" , "Info");
	define("info" , "Info");

	define("NOTICE" , "Notice");
	define("Notice" , "Notice");
	define("notice" , "Notice");

	define("WARNING" , "Warning");
	define("Warning" , "Warning");
	define("warning" , "Warning");

	define("ERROR" , "Error");
	define("Error" , "Error");
	define("error" , "Error");

	define("CRITICAL" , "Critical");
	define("Critical" , "Critical");
	define("critical" , "Critical");

	define("ALERT" , "Alert");
	define("Alert" , "Alert");
	define("alert" , "Alert");

	define("EMERGENCY" , "Emergency");
	define("Emergency" , "Emergency");
	define("emergency" , "Emergency");

	function _Log($LogLevel , $ConstantFile , $ConstantLine , $LogMessage)
	{
		if(_ENABLE_LOG == TRUE)
		{
			global $Logger;			
			switch ($LogLevel) 
			{
				case 'Debug':
					$Logger->Debug('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Info':
					$Logger->Info('      ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Notice':
					$Logger->Notice('    ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Warning':
					$Logger->Warning('   ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Error':
					$Logger->Error('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Critical':
					$Logger->Critical('  ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Alert':
					$Logger->Alert('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'Emergency':
					$Logger->Emergency(' ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;					
			}
		}
	}
?>