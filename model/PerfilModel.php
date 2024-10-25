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
    public function InfoUser($User)
    {
        $sql1 = "SELECT tb1.*,tb2.RolNombre Rol FROM usuarios tb1 INNER JOIN roles tb2 on tb2.idRoles=tb1.Roles_idRoles where idUsuarios=$User";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $this->BD->inserRegistro($sql1);
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function MisPresupuestos($User)
    {
        $sql1 = "SELECT tb1.idPresupuesto,tb3.PaisNombre,tb2.CiuNombre,tb1.PreValorLocal,tb1.PreValorPaisSelect,tb1.PreValorAlem,tb1.PreEstado , tb3.PaisSimMon,COUNT(tb5.idPermisos)Contar
        FROM presupuesto tb1
        INNER JOIN ciudad tb2 on tb2.idCiudad=tb1.Ciudad_idCiudad
        INNER JOIN pais tb3 on tb3.idPais=tb2.Pais_idPais
        INNER JOIN usuarios tb4 on tb4.idUsuarios=tb1.Usuarios_idUsuarios
        LEFT JOIN permisoscompartir tb5 on tb5.presupuesto_idPresupuesto=tb1.idPresupuesto
        WHERE tb1.Usuarios_idUsuarios =$User
        GROUP BY tb1.idPresupuesto,tb3.PaisNombre,tb2.CiuNombre,tb1.PreValorLocal,tb1.PreValorPaisSelect,tb1.PreValorAlem,tb1.PreEstado, tb3.PaisSimMon;";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $this->BD->inserRegistro($sql1);
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function tbComp($User)
    {
        $sql1 = "SELECT tb1.idPermisos ,tb4.UsuNombres,tb4.UsuApellidos,tb5.PaisNombre,tb3.CiuNombre,tb2.PreValorLocal,tb2.PreValorPaisSelect,tb2.PreValorAlem,tb5.PaisSimMon
        FROM permisoscompartir tb1 
        INNER JOIN presupuesto tb2 on tb2.idPresupuesto=tb1.presupuesto_idPresupuesto
        INNER JOIN ciudad tb3 on tb3.idCiudad=tb2.Ciudad_idCiudad
        INNER JOIN usuarios tb4 on tb4.idUsuarios=tb2.Usuarios_idUsuarios
        INNER JOIN pais tb5 on tb5.idPais=tb3.Pais_idPais
        where tb1.Usuarios_idUsuarios=$User";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $this->BD->inserRegistro($sql1);
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function UsuariosList($user)
    {
        $sql1 = "SELECT idUsuarios,UsuNombres,UsuApellidos FROM `usuarios` WHERE Roles_idRoles=2 AND idUsuarios<>$user ";
        $sql = $this->CNX1->prepare($sql1);
        $sql->execute();
        $this->BD->inserRegistro($sql1);
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function CompartirPre($data)
    {
        try {

            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql1 = "INSERT INTO permisoscompartir ($columnas) VALUES ($placeholders)";
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
