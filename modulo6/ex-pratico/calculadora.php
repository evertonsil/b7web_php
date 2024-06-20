<?php

class Calculadora
{
    private $result;
    public function __construct()
    {
        $this->result = 0;
    }
    public function add($num)
    {
        $this->result += $num;
    }

    public function sub($num)
    {
        $this->result -= $num;
    }

    public function multiply($num)
    {
        $this->result *= $num;
    }

    public function divide($num)
    {
        $this->result /= $num;
    }

    public function total()
    {
        return $this->result;
    }

    public function clear()
    {
        $this->result = 0;
    }
}