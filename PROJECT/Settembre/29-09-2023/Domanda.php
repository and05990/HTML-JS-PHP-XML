<?php
    class Domanda {
        private $quest;
        private $crrctAnswr;
        private $wrngAnswr;

        public function __construct($quest, $crrctAnswr, $wrngAnswr)
        {
            $this -> quest = $quest;
            $this -> crrctAnswr = $crrctAnswr;
            $this -> wrngAnswr = $wrngAnswr;
        }

        public function getQuest($index)
        {
            return $this -> quest;
        }

        public function getAnswr()
        {
            $answr = $this -> wrngAnswr;
            $answr[] = $this -> crrctAnswr;
            shuffle($answr);
            return $answr;
        }

        public function isCrrct($answer)
        {
            if($answer == $this -> crrctAnswr)
            {
                return true;
            } else {
                return false;
            }
        }
    }

    $quest = array(
                new Domanda("5 + 5 = ?", 10, array(9, 11)),
                new Domanda("3 - 2 = ?", 1, array(0, 2)),
                new Domanda("0 x 0 = ?", 0, array(2, 1)),
                new Domanda("6 + 2 = ?", 8, array(9, 7)),
                new Domanda("7 - 6 = ?", 1, array(0, 2))
    );
?>