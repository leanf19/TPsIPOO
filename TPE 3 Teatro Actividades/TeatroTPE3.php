<?php

include "FuncionCine.php";
include "FuncionTeatro.php";
include "FuncionMusical.php";

class TeatroTPE3
{
    private $nombre;
    private $direccion;
    private $cantFunciones;
    private $funciones;

    public function __construct($nom,$dir,$cant)
    {
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->cantFunciones = $cant;
        $this->funciones = array();
    }
    /* public function __construct($nom,$dir,$cant,$nomFuncion, $hora, $tiempo, $costo)
     {
         $this->nombre = $nom;
         $this->direccion = $dir;
         $this->cantFunciones = $cant;
         $this->funciones = new FuncionTp3($nomFuncion,$hora,$tiempo,$costo);
     }
 */
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getFunciones()
    {
        return $this->funciones;

    }
    public function getCantFunciones()
    {
        return $this->cantFunciones;

    }
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }
    public function setCantFunciones($cant)
    {
        $this->direccion = $cant;
    }


    public function setFunciones(array $func): void
    {
        $this->funciones = $func;
    }


    public function agregarFunciones($index, $unaFuncion)
    {
        //devuelve false si no se pudo agregar la funcion dentro del arreglo de funciones
        $exito = false;
        $horaFuncion = $unaFuncion->getHoraInicio();
        $duracionFuncion = $unaFuncion->getDuracion();
        //Se comprueba que no se solapen los horarios con otra funcion
        if ($this->comprobarHorario($index,$horaFuncion, $duracionFuncion)) {
            $tempFunciones = $this->getFunciones();
            $tempFunciones[] = $unaFuncion;
            $this->setFunciones($tempFunciones);
            $exito = true;
        }
        return $exito;
    }
    public function modificarFunciones($opcion, $indice, $valor)
    {
        $aux = $this->funciones[$indice];
        switch($opcion) {

            case 1:
                //cambiar nombre
                $aux->setNombre($valor);
                break;

            case 2:
                //cambiar hora inicio
                $aux=$this->funciones[$indice];
                $duracion = $aux->getDuracion();
                $existe = $this->comprobarHorario($indice,$valor,$duracion);
                if($existe)
                {

                    $aux->setHoraInicio($valor);
                }
                else
                {
                    echo "El horario elegido se superpone con el horario de otra funcion \n";
                }
                break;

            case 3:
                //cambiar duracion
                $aux=$this->funciones[$indice];
                $horaFuncion = $aux->getHoraInicio();
                $existe = $this->comprobarHorario($indice,$horaFuncion,$valor);
                if($existe)
                {
                    $aux->setDuracion($valor);
                }
                else
                {
                    echo "La duracion de la funcion superpone el horario con otra funcion, por favor primero modifica el horario de la funcion \n";
                }
                break;

            case 4:
                //cambiar precio
                $aux->setPrecio($valor);
                break;
        }
    }
    //Transforma una hora en formato hh:mm en minutos
    public function aMinutos($horario){
        $horas = (int)substr($horario,0,2);
        $mins = (int)substr($horario,3,2);
        $enMinutos = $horas*60+$mins;

        return $enMinutos;
    }
    //Este metodo se encarga de comprobar si el horario o duracion a modificar no superpone los horarios entre Funciones
    public function comprobarHorario($indice,$valor,$dur)
    {
        //Hora Inicio y Fin de la funcion nueva pasadas a minutos para comprobar disponibilidad de horarios
        $auxInicio = $this->aMinutos($valor);
        $auxFin = $auxInicio+$dur;
        $disponible = true;
        $i = 0;

        //Mientras no se solape o se compruebe en todos los horarios la disponibilidad
        while($disponible && $i < count($this->funciones))
        {

            //No realiza la comprobacion sobre la funcion que se desea modificar
            if($i != $indice)
            {

                //Comprueba que la hora INICIO de la funcion del indice actual no este entre la hora de Inicio y Fin de la nueva funcion
                $aux= $this->funciones[$i];
                $otroHorario = $this->aMinutos($aux->getHoraInicio());
                if($auxInicio <= $otroHorario && $otroHorario <= $auxFin)
                {

                    $disponible = false;
                }
                //Comprueba que la hora FIN de la funcion del indice actual no este entre la hora de Inicio y Fin de la nueva funcion
                $otroHorario = $otroHorario + $aux->getDuracion();

                if($auxInicio <= $otroHorario && $otroHorario <= $auxFin)
                {

                    $disponible = false;
                }


            }
            $i++;

        }

        return $disponible;
    }



    public function __toString()
    {
        $salida = "Nombre teatro: {$this->getNombre()}
                   \nDireccion: {$this->getDireccion()}
                    \nFunciones disponibles:\n";
        //a continuacion se muestra cada funcion del arreglo
        $salida .= $this->concatenarFunciones();

        return $salida;
    }
    //Recorre tod* el arreglo, concatena y devuelve al __toString
    public function concatenarFunciones()
    {
        $i=0;
        $salida = "";
        foreach ($this->funciones as $funcion) {
            $salida .= "-----------------------------------------------\n";
            $salida .= "Funcion $i:";
            $salida .= $funcion->__toString();
            $salida .= "-----------------------------------------------\n";
            $i++;
        }
        return $salida;
    }

    public function darCosto()
    {
        $costo = 0;
        //se recorre el arreglo de funciones del teatro guardando y sumando el valor del costo total por el uso del mismo
        foreach ($this->getFunciones() as $funcion) {
            $costo += $funcion->calcularCosto();
        }
        return $costo;
    }

}