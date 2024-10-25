<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/includes/conexion.php';

class BD
{
    public $CNX1;

    public function __construct()
    {
        $this->CNX1 = conexion::mysql();
    }

    public function inserRegistro($Query)
    {

        if (!isset($_SESSION["idUsuarios"])) {
            $UserSession = 3;
        } else {
            $UserSession = $_SESSION["idUsuarios"];
        }
        ///validar cantidad
        $sql1 = "select idSeguimiento_Bd num from seguimiento_bd order by idSeguimiento_Bd ASC;";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($row) >= 5) {
            // Obtener el número mínimo de idSeguimiento_Bd para mantener solo los últimos 5 registros
            $sqlMinId = "SELECT MAX(idSeguimiento_Bd) - 3 AS min_id FROM seguimiento_bd";
            $stmtMinId = $this->CNX1->query($sqlMinId);
            $minId = $stmtMinId->fetchColumn();

            // Eliminar los registros que tengan un idSeguimiento_Bd menor que el mínimo calculado
            $sqlDelete = "DELETE FROM seguimiento_bd WHERE idSeguimiento_Bd < :minId";
            $stmtDelete = $this->CNX1->prepare($sqlDelete);
            $stmtDelete->bindValue(':minId', $minId, PDO::PARAM_INT);
            $stmtDelete->execute();
        }


        $fechaHoy = date('Y-m-d H:i');
        if (is_string($Query)) {
            $sql = "INSERT INTO seguimiento_bd (Usuarios_idUsuarios, SegSentencia,SegFechaEje)
            VALUES (:UserSession, :Query, :fechaHoy)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->bindParam(':UserSession', $UserSession);
            $stmt->bindParam(':Query', $Query);
            $stmt->bindParam(':fechaHoy', $fechaHoy);
            $stmt->execute();
        }
    }
    public function TbSeg()
    {
        $sql1 = "SELECT tb1.idSeguimiento_Bd,tb1.SegSentencia,tb1.SegFechaEje ,tb2.UsuUser FROM seguimiento_bd tb1 LEFT join usuarios tb2 on tb2.idUsuarios=tb1.Usuarios_idUsuarios;        ";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}
