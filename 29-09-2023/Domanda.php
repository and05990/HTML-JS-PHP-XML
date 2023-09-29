<?php
    class Domanda {
        private $quest;

        public function __construct()
        {
            $this -> quest = array("5 + 1 = " => array(6, 9, 10, 4),
                                    "3 - 3 = " => array(1 , 4, 0, 3),
                                    "6 - 3 = " => array(2, 4, 3, 8),
                                    "5 + 5 = " => array(10, 5, 0, 9),
                                    "0 * 0 = " => array(0, 5, 10, 15));
        }

        function getQuest($index)
        {
            return $this -> quest[$index];
        }
    }
?>