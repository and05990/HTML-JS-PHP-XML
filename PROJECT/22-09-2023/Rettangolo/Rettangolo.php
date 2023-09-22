<?php
    class Rettangolo
    {
        private $base;
        private $altezza;

        public function __construct($b, $a)
        {
            $this -> base = $b;
            $this -> altezza = $a;
        }

        public function getBase()
        {
            return $this -> base;
        }

        public function getAltezza()
        {
            return $this -> altezza;
        }

        public function getArea()
        {
            return $this -> base * $this -> altezza;
        }

        public function print($lingua)
        {
            $frase = "";
            switch ($lingua)
            {
                case "RUS":
                    $frase = "Район: ".$this -> getArea();
                    break;
                case "ARM":
                    $frase = "Տարածքն է. ".$this -> getArea();
                    break;
                default:
                    $frase = "L'area è: ".$this -> getArea();
            }
            return $frase;
        }
    }

    class Quadrato extends Rettangolo
    {
        public function __construct($l)
        {
            parent::__construct($l, $l);
        }

        public function getLato()
        {
            return parent::getBase();
        }

        public function print($lingua)
        {
            return parent::print($lingua);
        }
    }
?>