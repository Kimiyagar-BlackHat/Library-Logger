<?php
    trait LOGGER_TRAIT
    {
        public function Emergency($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::EMERGENCY, $Message, $Context);
        }
        public function Alert($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::ALERT, $Message, $Context);
        }
        public function Critical($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::CRITICAL, $Message, $Context);
        }
        public function Error($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::ERROR, $Message, $Context);
        }
        public function Warning($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::WARNING, $Message, $Context);
        }
        public function Notice($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::NOTICE, $Message, $Context);
        }
        public function Info($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::INFO, $Message, $Context);
        }
        public function Debug($Message, array $Context = array())
        {
            $this->Log(LOG_LEVEL::DEBUG, $Message, $Context);
        }
        abstract public function Log($Level, $Message, array $Context = array());
    }
?>