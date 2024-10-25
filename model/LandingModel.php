<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Bogota');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/includes/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/model/RegBdModel.php';

class modelo
{


    public $CNX1;
    public $BD;

    public function __construct()
    {
        $this->CNX1 = conexion::mysql();
        $this->BD = new BD();
    }
    public function ListPais()
    {
        $sql1 = "SELECT tb1.idPais,tb1.PaisNombre ,tb1.PaisFoto ,COUNT(tb2.idCiudad) Conteo FROM pais tb1 
LEFT JOIN ciudad tb2 on tb2.Pais_idPais=tb1.idPais
GROUP BY tb1.idPais,tb1.PaisNombre ,tb1.PaisFoto";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        $this->BD->inserRegistro($sql1);
        return $row;
    }
    public function ListCiudad($idPais)
    {
        $sql1 = "SELECT idCiudad,CiuNombre FROM `ciudad` where  Pais_idPais=$idPais";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        $this->BD->inserRegistro($sql1);

        return $row;
    }
    public function GetInfoCiudad($idCiudad)
    {
        $sql1 = "SELECT idCiudad,CiuNombre,CiudadFoto,CiudDes FROM `ciudad` where  idCiudad =$idCiudad";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        $this->BD->inserRegistro($sql1);

        return $row;
    }
    public function InfoDetalle($idCiudad)
    {
        $sql1 = "SELECT tb1.idCiudad,tb1.CiuNombre,tb1.CiuCoord,tb1.CiudadFoto,tb2.* 
        FROM ciudad tb1 
        INNER JOIN pais tb2 on tb2.idPais=tb1.Pais_idPais 
        WHERE idCiudad=$idCiudad";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        $this->BD->inserRegistro($sql1);
        return $row;
    }
}
