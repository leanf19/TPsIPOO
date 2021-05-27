<?php
include "TorneoNacional.php";
include "TorneoProvincial.php";

class MinisterioDeporte {

    private $anio;
    private $torneos;

    //Metodo constructor
    public function __construct($anio)
    {
        $this->anio = $anio;
        $this->torneos = array();
    }


    public function getAnio()
    {
        return $this->anio;
    }


    public function setAnio($anio): void
    {
        $this->anio = $anio;
    }


    public function getTorneos(): array
    {
        return $this->torneos;
    }


    public function setTorneos(array $torneos): void
    {
        $this->torneos = $torneos;
    }

    public function __toString(): string
    {
        $salida = "Anio: {$this->getAnio()}
        \nTorneos: \n";
        //a continuacion se muestra cada Torneo del arreglo
        $salida .= $this->concatenarFunciones();
        return $salida;
    }

    public function concatenarFunciones()
    {
        $i=1;
        $salida = "";
        foreach ($this->torneos as $torneo) {
            $salida .= "-----------------------------------------------\n";
            $salida .= "Torneo $i:";
            $salida .= $torneo->__toString();
            $salida .= "-----------------------------------------------\n";
            $i++;
        }
        return $salida;
    }

    public function registrarTorneo(array $colPartidos, $tipo, array $unArreglo ){
    // print_r($unArreglo);
        $id = $unArreglo[0]['idTorneo'];
        $monto = $unArreglo[0]['montoPremio'];
        $lugar = $unArreglo[0]['localidad'];

    if($tipo == "provincial") {
        $prov = $unArreglo[0]['provincia'];
        $unTorneo = new TorneoProvincial($id,$colPartidos,$monto,$lugar,$prov); }
    //Si el tipo es Nacional crea un Torneo Nacional
    else if ($tipo = "nacional")
        $unTorneo = new TorneoNacional($id,$colPartidos,$monto,$lugar);
    //Si el tipo no coincide con Nacional o Provincial sale mensaje de error.
    else {
        echo "No se pudo registrar el torneo";
        $unTorneo = null;
    }
    //Asigno un nuevo torneo a la lista de torneos
    $auxTorneos = $this->getTorneos();
    $auxTorneos[] = $unTorneo;
    $this->setTorneos($auxTorneos);


    return $unTorneo;
    }

    public function otorgarPremioTorneo($idTorneo){
        $exito = true;
        $i = 0;
        while($exito) {
            $auxTorneos =$this->torneos[$i];
            $auxIdTorneos = $auxTorneos->getIdTorneo();
            if($auxIdTorneos == $idTorneo)
            $exito = false;
        }
        $importePremio = $auxTorneos->ObtenerPremioTorneo();
        $equipoGanador = $auxTorneos->obtenerEquipoGanadorTorneo();
        $ganadorPremio = ["Ganador" => $equipoGanador, "Premio $"=>$importePremio];
        return $ganadorPremio;
    }


}