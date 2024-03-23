<?php

namespace App\Backend\Models\Calculator;

use App\Support\Utils\Models\Model;

/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 * This class represents a calculator model.
 * It extends from the base Model class.
 * It has four private properties: numA, numB, ope, and precision.
 * It also has several public methods to perform calculations and manipulate the properties.
 */

class CalculatorModel extends Model
{
    // The first number in the calculation
    private $numA;
    // The second number in the calculation
    private $numB;
    // The operation to be performed
    private $ope;
    // The precision of the calculation result
    private $precision;

    // Constructor method. Initializes the properties with the provided values.
    public function __construct($numA, $numB, $ope, $precision = 2)
    {
        $this->numA = $numA;
        $this->numB = $numB;
        $this->ope = $ope;
        $this->precision = $precision;
    }

    // Method to perform addition. Returns the result rounded to the specified precision.
    public function suma()
    {
        return round($this->numA + $this->numB, $this->precision);
    }

    // Method to perform subtraction. Returns the result rounded to the specified precision.
    public function resta()
    {
        return round($this->numA - $this->numB, $this->precision);
    }

    // Method to perform multiplication. Returns the result rounded to the specified precision.
    public function multiplicacion()
    {
        return round($this->numA * $this->numB, $this->precision);
    }

    // Method to perform division. Returns the result rounded to the specified precision.
    public function division()
    {
        return round($this->numA / $this->numB, $this->precision);
    }

    // Getter for numA
    public function getNumA()
    {
        return $this->numA;
    }

    // Getter for numB
    public function getNumB()
    {
        return $this->numB;
    }

    // Getter for ope
    public function getOpe()
    {
        return $this->ope;
    }

    // Setter for numA
    public function setNumA($numA)
    {
        $this->numA = $numA;
    }

    // Setter for numB
    public function setNumB($numB)
    {
        $this->numB = $numB;
    }

    // Setter for ope
    public function setOpe($ope)
    {
        $this->ope = $ope;
    }

    // Setter for precision
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    // Getter for precision
    public function getPrecision()
    {
        return $this->precision;
    }

    // Method to convert the object to a string. Returns a string representation of the object.
    public function __toString()
    {
        return "numA: " . $this->numA . " numB: " . $this->numB . " ope: " . $this->ope;
    }

    // Method to convert the object to an array. Returns an associative array representation of the object.
    public function __toArray()
    {
        return [
            'numA' => $this->numA,
            'numB' => $this->numB,
            'ope' => $this->ope,
            'precision' => $this->precision
        ];
    }
}