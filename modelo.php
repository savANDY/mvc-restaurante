<?php
class Platillo {
    private $platillo;
    private $link;

    public function __construct() {
        $this->platillo = array();
        $this->link = new mysqli('localhost', 'root', '', 'restaurante');
    }

    private function set_names() {
        return $this->link->query("SET NAMES 'utf8'");
    }

    public function lista_platillos() {
        self::set_names();
        $sql="select nombre, precio from platillos where disponible = 1";
        foreach ($this->link->query($sql) as $res) {
            $this->platillo[]=$res;
        }
        return $this->platillo;
        $this->link=null;
    }
}
?>
