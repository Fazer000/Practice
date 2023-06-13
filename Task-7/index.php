<?php

    abstract class Planes
    {
        public $airName;

        public $maxSpeed;

        public $status;

        public $fly;

        public $fuel;

        public $fell;

        function __construct($airName, $maxSpeed)
        {

            $this -> airName = $airName;

            $this -> maxSpeed = $maxSpeed;

            $this -> fly = false;

            $this -> fuel = true;

            $this -> fell = true;

        }

        function vzlet()
        {
            $this -> fly = true;
            echo $this -> airName . "Взлет самолета";
        }

        function posadka()
        {
            $this -> fly = false;
            echo $this -> airName . "Посадка самолета";
        }

        function getStatus()
        {
            return ($this -> fly) ? "В воздухе" : "На земле";
        }
    
        function getName()
        {
            return $this -> airName;
        }

    }

    class MIG extends Planes
    {

        function ataka()
        {
            echo $this -> airName . "атакует";
        }

    }

    class TU154 extends Planes
    {

    }

    class Airport
    {
        public $planec = array();

        public $max_capacity;
        
        function __construct($max_capacity)
        {
            $this -> max_capacity = $max_capacity;
        }

        function receptionAricraft(Planes $planes)
        {
            if(count($this -> planec) < $this -> max_capacity)
            {
                $this -> planec[] = $planes;
                echo $planes -> getStatus() . " " . $planes -> getName() . " принят в аэропорт";
            }
            else
            {
                echo "Аэропорт заполнен, посадка невозможна";
            }
        }

        function whereIsThePlane(Planes $planes)
        {
            $position = array_search($planes, $this -> $planes);
            if($position !== false)
            {
                unset($this -> planec, $position);
                echo $planes -> getStatus() . " " . $planes -> getName() . " покинул аэропорт";
            }
            else
            {
                echo $planes -> getName() . " освободил место и улетел";
            }
        }

        function parkPlane(Planes $planes)
        {
            $position = array_search($planes, $this -> planec);
            if($position !== false)
            {
                unset($this -> planec, $position);
                echo $planes -> getStatus() . " " . $planes -> getName() . " находиться на стоянке в аэропорту";
            }
            else
            {
                echo $planes -> getName() . " нет в аэропорту";
            }
        }

        function preparePlane(Planes $planes, $fly)
        {
            if($this -> $fly = true)
            {
                echo $planes -> getName() . " готов к взлету";
            }
            else
            {
                echo $planes -> getName() . " не готов к взлету";
            }
        }

        function сheckFuel(Planes $planes, $fuel)
        {
            if($this -> $fuel = true)
            {
                echo $planes -> getName() . " бак полон";
            }
            else
            {
                echo $planes -> getName() . " бак пуст";
            }
        }

        function crashPlane(Planes $planes, $fell)
        {
            if($this -> $fell = true)
            {
                echo $planes -> getName() . " летит в штатном режиме";
            }
            else
            {
                echo $planes -> getName() . " разбился об скалу, но все пассажиры живы";
            }
        }

    }

        $airport = new Airport(4);
        $mig = new MIG("MIG", 2000);
        $tu = new TU154("TU-154", 1000);


        $planec = [$mig, $tu];
        $airport = new Airport(4);
        foreach ($planec as $p)
        {
            $airport -> receptionAricraft($p);
            echo "<br>";
        }


        $airport = new Airport(4);
        $airport -> receptionAricraft(new MIG("MIG", 2000));
        echo "<br>";
        $airport -> receptionAricraft(new TU154("TU-154", 1000));

?>
