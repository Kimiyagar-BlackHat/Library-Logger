<?php
//------------------------------------------------------------------------------------------------
    require "Abstract.php";
//------------------------------------------------------------------------------------------------
    class LOGGER extends ABSTRACT_LOGGER
    {
//------------------------------------------------------------------------------------------------
        const EMERGENCY = 'EMERGENCY';
        const ALERT     = 'ALERT';
        const CRITICAL  = 'CRITICAL';
        const ERROR     = 'ERROR';
        const WARNING   = 'WARNING';
        const NOTICE    = 'NOTICE';
        const INFO      = 'INFO';
        const DEBUG     = 'DEBUG';
        protected $Options = array (
                                        'Extension'      => 'log',
                                        'DateFormat'     => 'Y-m-d G:i:s.u',
                                        'FileName'       => false,
                                        'FlushFrequency' => false,
                                        'Prefix'         => 'Logger_',
                                        'LogFormat'      => false,
                                        'AppendContext'  => true,
                                    );
        protected $LogLevels = array(
                                        self::EMERGENCY => 0,
                                        self::ALERT     => 1,
                                        self::CRITICAL  => 2,
                                        self::ERROR     => 3,
                                        self::WARNING   => 4,
                                        self::NOTICE    => 5,
                                        self::INFO      => 6,
                                        self::DEBUG     => 7
                                    );
        protected $LogLevelThreshold = self::DEBUG;
        private $LogFilePath;
        private $LogLineCount = 0;        
        private $FileHandle;
        private $LastLine = '';
        private $DefaultPermissions = 0777;
//------------------------------------------------------------------------------------------------
        public function __construct($LogDirectory, $LogLevelThreshold = self::DEBUG, array $Options = array())
        {
            $this->LogLevelThreshold = $LogLevelThreshold;
            $this->Options = array_merge($this->Options, $Options);
            $LogDirectory = rtrim($LogDirectory, DIRECTORY_SEPARATOR);
            if (!file_exists($LogDirectory)) 
            {
                mkdir($LogDirectory, $this->DefaultPermissions, true);
            }
            if(strpos($LogDirectory, 'php://') === 0) 
            {
                $this->_LogToStdOut($LogDirectory);
                $this->SetFileHandle('w+');
            }
            else 
            {
                $this->_LogFilePath($LogDirectory);
                if(file_exists($this->LogFilePath) && !is_writable($this->LogFilePath)) 
                {
                    throw new RuntimeException('The File Could Not Be Written To Check That Appropriate Permissions Have Been Set.');
                }
                $this->SetFileHandle('a');
            }
            if ( ! $this->FileHandle) 
            {
                throw new RuntimeException('The File Could Not Be Opened. Check Permissions.');
            }
        }
//------------------------------------------------------------------------------------------------
        public function _LogToStdOut($StdOutPath) 
        {
            $this->LogFilePath = $StdOutPath;
        }
//------------------------------------------------------------------------------------------------
        public function _LogFilePath($LogDirectory) 
        {
            if ($this->Options['FileName']) 
            {
                if (strpos($this->Options['FileName'], '.log') !== false || strpos($this->Options['FileName'], '.txt') !== false) 
                {
                    $this->LogFilePath = $LogDirectory.DIRECTORY_SEPARATOR.$this->Options['FileName'];
                }
                else 
                {
                    $this->LogFilePath = $LogDirectory.DIRECTORY_SEPARATOR.$this->Options['FileName'].'.'.$this->Options['Extension'];
                }
            } 
            else 
            {
                $this->LogFilePath = $LogDirectory.DIRECTORY_SEPARATOR.$this->Options['Prefix'].date('Y-m-d').'.'.$this->Options['Extension'];
            }
        }
//------------------------------------------------------------------------------------------------
        public function SetFileHandle($WriteMode) 
        {
            $this->FileHandle = fopen($this->LogFilePath, $WriteMode);
        }
//------------------------------------------------------------------------------------------------
        public function __destruct()
        {
            if ($this->FileHandle) 
            {
                fclose($this->FileHandle);
            }
        }
//------------------------------------------------------------------------------------------------
        public function SetDateFormat($DateFormat)
        {
            $this->Options['DateFormat'] = $DateFormat;
        }
//------------------------------------------------------------------------------------------------
        public function _LogLevelThreshold($LogLevelThreshold)
        {
            $this->LogLevelThreshold = $LogLevelThreshold;
        }
//------------------------------------------------------------------------------------------------
        public function Log($Level, $Message, array $Context = array())
        {
            if ($this->LogLevels[$this->LogLevelThreshold] < $this->LogLevels[$Level]) 
            {
                return;
            }
            $Message = $this->FormatMessage($Level, $Message, $Context);
            $this->Write($Message);
        }
//------------------------------------------------------------------------------------------------
        public function Write($Message)
        {
            if (null !== $this->FileHandle) 
            {
                if (fwrite($this->FileHandle, $Message) === false) 
                {
                    throw new RuntimeException('The file could not be written to. Check that appropriate permissions have been set.');
                }
                else 
                {
                    $this->LastLine = trim($Message);
                    $this->LogLineCount++;
                    if ($this->Options['FlushFrequency'] && $this->LogLineCount % $this->Options['FlushFrequency'] === 0) 
                    {
                        fflush($this->FileHandle);
                    }
                }
            }
        }
//------------------------------------------------------------------------------------------------
        public function GetLogFilePath()
        {
            return $this->LogFilePath;
        }
//------------------------------------------------------------------------------------------------
        public function LetLastLogLine()
        {
            return $this->LastLine;
        }
//------------------------------------------------------------------------------------------------
        protected function FormatMessage($Level, $Message, $Context)
        {
            if ($this->Options['LogFormat']) 
            {
                $Parts = array(
                    'Date'          => $this->GetTimestamp(),
                    'Level'         => strtoupper($Level),
                    'Level-Padding' => str_repeat(' ', 9 - strlen($Level)),
                    'Priority'      => $this->LogLevels[$Level],
                    'Message'       => $Message,
                    'Context'       => json_encode($Context),
                );
                $Message = $this->Options['LogFormat'];
                foreach ($Parts as $Part => $Value) 
                {
                    $Message = str_replace('{'.$Part.'}', $Value, $Message);
                }
            }
            else 
            {
                $Message = "[{$this->GetTimestamp()}] [{$Level}] {$Message}";
            }
            if ($this->Options['AppendContext'] && ! empty($Context)) 
            {
                $Message .= PHP_EOL.$this->Indent($this->ContextToString($Context));
            }
            return $Message.PHP_EOL;
        }
//------------------------------------------------------------------------------------------------
        private function GetTimestamp()
        {
            date_default_timezone_set("Asia/Tehran");
            $OriginalTime = microtime(true);
            $Micro = sprintf("%03d", intval(($OriginalTime - floor($OriginalTime)) * 1000000));
            $Date = new DateTime(date('Y-m-d H:i:s.'.$Micro, $OriginalTime));
            return $Date->Format($this->Options['DateFormat']);
        }
//------------------------------------------------------------------------------------------------
        protected function ContextToString($Context)
        {
            $Export = '';
            foreach ($Context as $Key => $Value) 
            {
                $Export .= "{$Key}: ";
                $Export .= preg_replace(
                                            array('/=>\s+([a-zA-Z])/im','/array\(\s+\)/im','/^  |\G  /m'), 
                                            array('=> $1','array()','    '),
                                            str_replace('array (','array(',var_Export($Value, true))
                                        );
                $Export .= PHP_EOL;
            }
            return str_replace(array('\\\\', '\\\''), array('\\', '\''), rtrim($Export));
        }
//------------------------------------------------------------------------------------------------
        protected function Indent($String, $Indent = '    ')
        {
            return $Indent . str_replace("\n", "\n".$Indent, $String);
        }
//------------------------------------------------------------------------------------------------ 
    }
//------------------------------------------------------------------------------------------------
?>