<?php

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
    public function ValidateUser($User)
    {
        $sql1 = "SELECT idUsuarios FROM usuarios where UsuUser='$User'";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $this->BD->inserRegistro($sql1);

        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function InsertUser($data)
    {
        try {

            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql1 = "INSERT INTO usuarios ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql1);
            $stmt->execute($valores);
            $this->BD->inserRegistro($sql1);
            return 1;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return 0;
        }
    }
    public function GetProfile($User, $Pass)
    {
        $sql1 = "SELECT idUsuarios ,Roles_idRoles,UsuNombres,UsuApellidos,UsuUser FROM usuarios where UsuUser='$User' AND UsuPass='$Pass'";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        $this->BD->inserRegistro($sql1);

        return $row;
    }
    public function LastSession($User)
    {
        try {
            $fechaHoy = date('Y-m-d H:i');
            $sql = "UPDATE usuarios SET UsuLastSession=:fechaHoy WHERE idUsuarios=:User";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->bindParam(':fechaHoy', $fechaHoy, PDO::PARAM_STR);
            $stmt->bindParam(':User', $User, PDO::PARAM_STR);
            $stmt->execute();
            $this->BD->inserRegistro($sql); // No está claro qué hace esta función, pero asumo que está bien.
            return 1; // Retorna 1 si la consulta se ejecuta correctamente
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return 0; // Retorna 0 si ocurre un error
        }
    }
    public function SavePresupuesto($data)
    {
        try {

            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql1 = "INSERT INTO presupuesto ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql1);
            $stmt->execute($valores);
            $this->BD->inserRegistro($sql1);
            return 1;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return 0;
        }
    }
}
