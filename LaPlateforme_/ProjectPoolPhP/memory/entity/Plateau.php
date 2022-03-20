<?php
include ('Carte.php');

class Plateau {

        private $myArray = [];        

        public function __construct()
        {
          $x = 0;

            for ($i=0;$i<12;$i++)
            {
              if ($i % 2 == 0)
                $x = $x + 1;
              $this->myArray[$i] = new Carte;
              $this->myArray[$i]->setId($i);
              $this->myArray[$i]->setimgSrc("./media/card".$x.".gif");
              
            }
            $numbers = range(0, 11);
            shuffle($numbers);
            foreach ($numbers as $i) {
                $temp = $this->myArray[0];
                $this->myArray[0] = $this->myArray[$i];
                $this->myArray[$i] = $temp;
            }
            
        }

        public function getMyArray ()
        {
            return $this->myArray;
        }
}
    
?>