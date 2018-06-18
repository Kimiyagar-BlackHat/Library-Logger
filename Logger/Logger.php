<?php
//------------------------------------------------------------------------------------------------
	include_once 'Config.php';
	include_once 'Main.php';
//------------------------------------------------------------------------------------------------
	if(EnableLog)
	{
		$Logger = new LOGGER(LogFilePath , strtoupper(LogLevel));
	}
//------------------------------------------------------------------------------------------------
	function _Log($LogLevel , $ConstantFile , $ConstantLine , $LogMessage)
	{
		if(EnableLog)
		{
			$LogLevel = strtoupper($LogLevel);
			global $Logger;			
			switch ($LogLevel) 
			{
				case 'DEBUG':
					$Logger->Debug('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'INFO':
					$Logger->Info('      ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'NOTICE':
					$Logger->Notice('    ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'WARNING':
					$Logger->Warning('   ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'ERROR':
					$Logger->Error('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'CRITICAL':
					$Logger->Critical('  ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'ALERT':
					$Logger->Alert('     ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;
				case 'EMERGENCY':
					$Logger->Emergency(' ['.basename($ConstantFile).':' . $ConstantLine .']   ' . $LogMessage);
					break;					
			}
		}
	}
//------------------------------------------------------------------------------------------------
?>