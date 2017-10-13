<?php
    include "Connection.php";

    class Points
    {
        protected $month;
        protected $day;
        protected $timeOne;
        protected $timeTwo;
        protected $timeThree;
        protected $timeFour;
        protected $userId;

        public function __construct($u, $m, $d, $t1, $t2, $t3, $t4)
        {
            $this->userId = $u;
            $this->month = $m;
            $this->day = $d;
            $this->timeOne = $t1;
            $this->timeTwo = $t2;
            $this->timeThree = $t3;
            $this->timeFour = $t4;
        }

        public function newMonthTime()
        {
            $createTable = "CREATE TABLE IF NOT EXISTS `".$this->getMonth()."`(
                                id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                userId int NOT NULL,
                                dia int NOT NULL,
                                entrada1 varchar(5) NOT NULL,
                                saida1 varchar(5) NOT NULL,
                                entrada2 varchar(5) NOT NULL,
                                saida2 varchar(5) NOT NULL
                                )";
            
            $conn = new Connection();
            $conn = $conn->getInstance();

            $tryQuery = $conn->prepare($createTable);
            if($tryQuery->execute())
            {
                return $this->newTime();
            }
        }
        public function newTime()
        {
            $sql = "INSERT INTO `" . $this->getMonth() ."`(userId, dia, entrada1, saida1, entrada2, saida2) VALUES
                                                        (:userId, :dia, :entrada1, :saida1, :entrada2, :saida2)";
            $conn = new Connection();
            $conn = $conn->getInstance();
            $tryQuery = $conn->prepare($sql);
            $tryQuery->bindValue(':dia', $this->getDay());
            $tryQuery->bindValue(':userId', $this->getUserId());
            $tryQuery->bindValue(':entrada1', $this->getTimeOne());
            $tryQuery->bindValue(':saida1', $this->getTimeTwo());
            $tryQuery->bindValue(':entrada2', $this->getTimeThree());
            $tryQuery->bindValue(':saida2', $this->getTimeFour());

            if($tryQuery->execute())
            {
                return true;
            }
            return false;
        }
        public function editTime()
        {
            $conn = new Connection();
            $conn = $conn->getInstance();

            $sql = "UPDATE `".$this->getMonth()."` SET
                        `entrada1` = :entrada1,
                        `saida1` = :saida1,
                        `entrada2` = :entrada2,
                        `saida2` = :saida2 WHERE `dia` = :dia and `userId` = :userId";
            $tryQuery = $conn->prepare($sql);
            $tryQuery->bindValue(':entrada1', $this->getTimeOne());
            $tryQuery->bindValue(':saida1', $this->getTimeTwo());
            $tryQuery->bindValue(':entrada2', $this->getTimeThree());
            $tryQuery->bindValue(':saida2', $this->getTimeFour());
            $tryQuery->bindValue(':dia', $this->getDay());
            $tryQuery->bindValue(':userId', $this->getUserId());

            if($tryQuery->execute())
            {
                return true;
            }
            return false;
        }


        //Setters
        public function getUserId()
        {
            return $this->userId;
        }
        public function getMonth()
        {
            return $this->month;
        }
        public function getDay()
        {
            return $this->day;
        }
        public function getTimeOne()
        {
            return $this->timeOne;
        }
        public function getTimeTwo()
        {
            return $this->timeTwo;
        }
        public function getTimeThree()
        {
            return $this->timeThree;
        }
        public function getTimeFour()
        {
            return $this->timeFour;
        }

        //Setters
        public function setUserId($u)
        {
            $this->userId = $u;
        }
        public function setMonth($m)
        {
            $this->month = $m;
        }
        public function setDay($d)
        {
            $this->day = $d;
        }
        public function setTimeOne($t1)
        {
            $this->timeOne = $t1;
        }
        public function setTimeTwo($t2)
        {
            $this->timeTwo = $t2;
        }
        public function setTimeThree($t3)
        {
            $this->timeThree = $t3;
        }
        public function setTimeFour($t4)
        {
            $this->timeFour = $t4;
        }
    }
?>