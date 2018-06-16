<?php
    interface LOGGER_INTERFACE
    {
        public function Emergency($Message, array $Context = array());
        public function Alert($Message, array $Context = array());
        public function Critical($Message, array $Context = array());
        public function Error($Message, array $Context = array());
        public function Warning($Message, array $Context = array());
        public function Notice($Message, array $Context = array());
        public function Info($Message, array $Context = array());
        public function Debug($Message, array $Context = array());
        public function Log($Level, $Message, array $Context = array());
    }
?>