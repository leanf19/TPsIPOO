<?php


class Calculadora
{
    private $num1;
    private $num2;

    /**
     * Calculadora constructor.
     * @param $num1
     * @param $num2
     */
    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function suma()
    {
        return $this->num1 + $this->num2;
    }

    public function resta()
    {
        return $this->num1 - $this->num2;

    }

    public function multiplicacion()
    {
        return $this->num1 * $this->num2;
    }

    public function division()
    {
        return $this->num1 / $this->num2;

    }

    public function __toString()
    {
        return "El primer número es: {$this->num1}.\nEl segundo número es: {$this->num2}";
    }
}