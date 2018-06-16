<?php
    trait LOGGER_AWARE_TRAIT
    {
        protected $Logger;
        public function _Logger(LOGGER_INTERFACE $Logger)
        {
            $this->Logger = $Logger;
        }
    }
?>