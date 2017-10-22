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

        public function __construct($u)
        {
            $this->userId = $u;
        }

        public function newMonthTime($m, $d, $t1, $t2, $t3, $t4)
        {
            $createTable = "CREATE TABLE IF NOT EXISTS `".$m."`(
                                id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                userId int NOT NULL,
                                dia int NOT NULL,
                                entrada1 varchar(5) NOT NULL,
                                saida1 varchar(5) NOT NULL,
                                entrada2 varchar(5) NOT NULL,
                                saida2 varchar(5) NOT NULL,
                                UNIQUE KEY `unique_index` (`userId`, `dia`)
                                )";
            
            $conn = new Connection();
            $conn = $conn->getInstance();

            $tryQuery = $conn->prepare($createTable);
            if ($tryQuery->execute()) {
                return $this->newTime($m, $d, $t1, $t2, $t3, $t4);
            }
        }

        public function newTime($m, $d, $t1, $t2, $t3, $t4)
        {
            $sql = "INSERT INTO `" . $m ."`(userId, dia, entrada1, saida1, entrada2, saida2) VALUES
                                                        (:userId, :dia, :entrada1, :saida1, :entrada2, :saida2)";
            $conn = new Connection();
            $conn = $conn->getInstance();
            $tryQuery = $conn->prepare($sql);
            $tryQuery->bindValue(':dia', $d);
            $tryQuery->bindValue(':userId', $this->getUserId());
            $tryQuery->bindValue(':entrada1', $t1);
            $tryQuery->bindValue(':saida1', $t2);
            $tryQuery->bindValue(':entrada2', $t3);
            $tryQuery->bindValue(':saida2', $t4);
            try{
                if ($tryQuery->execute()) {
                    return true;
                }
            }
            catch(PDOException $e){
                echo "Impossivel gravar os dados desejados. Favor verificar se esse dia já existe em <a href='edit-table-checks.php'>consultar dias</a>.";
            }
            return false;
        }
        public function editTime($m, $d, $t1, $t2, $t3, $t4)
        {
            $conn = new Connection();
            $conn = $conn->getInstance();

            $sql = "UPDATE `".$m."` SET
                        `entrada1` = :entrada1,
                        `saida1` = :saida1,
                        `entrada2` = :entrada2,
                        `saida2` = :saida2 WHERE `dia` = :dia and `userId` = :userId";
            $tryQuery = $conn->prepare($sql);
            $tryQuery->bindValue(':entrada1', $t1);
            $tryQuery->bindValue(':saida1', $t2);
            $tryQuery->bindValue(':entrada2', $t3);
            $tryQuery->bindValue(':saida2', $t4);
            $tryQuery->bindValue(':dia', $d);
            $tryQuery->bindValue(':userId', $this->getUserId());

            if ($tryQuery->execute()) {
                return true;
            }
            return false;
        }

        public function listPoints($m)
        {
            $sql = "SELECT `dia`,`entrada1`,`saida1`,`entrada2`,`saida2` FROM `".$m."` WHERE `userId` = :userId ORDER BY `dia`"; 
            $conn = new Connection();
            $conn = $conn->getInstance();
            $tryQuery = $conn->prepare($sql);
            $tryQuery->bindValue(':userId', $this->getUserId());
            try{
                if($tryQuery->execute()){
                    return $tryQuery;
                }
            }
            catch(PDOException $e){
                $error = $e->getMessage();
                if (preg_match("/doesn't exist/", $error)) {
                    echo "<br>Essa tabela não existe.";
                    die;
                } else {
                    echo $error;
                }
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