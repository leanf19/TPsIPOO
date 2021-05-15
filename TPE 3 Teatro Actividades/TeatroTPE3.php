<?php
include "FuncionTPE3.php";

class TeatroTP3
{
    private $nombre;
    private $direccion;
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

    public function agregarFunciones($indice,$nom,$hora,$tiempo,$costo)
    {
        $auxFuncion = new FuncionTPE3($nom,$hora,$tiempo,$costo);
        $this->funciones[$indice] = $auxFuncion;
    }

    public function setFunciones($opcion,$indice,$valor)
    {
        $aux = $this->funciones[$indice];
        switch($opcion) {

            case 1:
                //cambiar nombre
                $aux->setNombre($valor);
                break;

            case 2:
                //cambiar hora inicio
                $duracion = $this->funciones[$indice]->getDuracion();
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
                $horaFuncion = $this->funciones[$indice]->getHoraInicio();
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
        while($disponible && $i < $this->cantFunciones-1)
        {

            //No realiza la comprobacion sobre la funcion que se desea modificar
            if($i != $indice)
            {

                //Comprueba que la hora INICIO de la funcion del indice actual no este entre la hora de Inicio y Fin de la nueva funcion
                $otroHorario = $this->aMinutos($this->funciones[$i]->getHoraInicio());
                if($auxInicio <= $otroHorario && $otroHorario <= $auxFin)
                {

                    $disponible = false;
                }
                //Comprueba que la hora FIN de la funcion del indice actual no este entre la hora de Inicio y Fin de la nueva funcion
                $otroHorario = $otroHorario + $this->funciones[$i]->getDuracion();

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
        return "(" . $this->getNombre().",".$this->getDireccion().",".print_r($this->getFunciones()).")";
    }
}