<?php
    require_once "AbstractLogger.php";
    class NULL_LOGGER extends ABSTRACT_LOGGER
    {
        public function Log($Level, $Message, array $Context = array())
        {
    
        }
    }
?>