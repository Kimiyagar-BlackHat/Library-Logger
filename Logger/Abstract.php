<?php
//------------------------------------------------------------------------------------------------
    abstract class ABSTRACT_LOGGER
    {
//------------------------------------------------------------------------------------------------
        public function Emergency($Message, array $Context = array())
        {
            $this->Log(LOGGER::EMERGENCY, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Alert($Message, array $Context = array())
        {
            $this->Log(LOGGER::ALERT, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Critical($Message, array $Context = array())
        {
            $this->Log(LOGGER::CRITICAL, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Error($Message, array $Context = array())
        {
            $this->Log(LOGGER::ERROR, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Warning($Message, array $Context = array())
        {
            $this->Log(LOGGER::WARNING, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Notice($Message, array $Context = array())
        {
            $this->Log(LOGGER::NOTICE, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Info($Message, array $Context = array())
        {
            $this->Log(LOGGER::INFO, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
        public function Debug($Message, array $Context = array())
        {
            $this->Log(LOGGER::DEBUG, $Message, $Context);
        }
//------------------------------------------------------------------------------------------------
    }
//------------------------------------------------------------------------------------------------
?>