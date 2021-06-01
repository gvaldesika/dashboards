<?php

// Permite cosultar clientes desd la tabla ext_clientes (Sistema: IKA Extranet CLientes V2.0)
class ClientesModelo{

    public static function mdlVerClientes()
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('select * from ext_clientes
');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    // Muestra un cliente por su nombre de Fantasia
    public static function mdlVerClientesNombre($nombre)
    {
        try {
            $stmt = Conexion::conectarGoDaddy()->prepare('SELECT * FROM ext_clientes
where cli_nom_fant = :nombre');
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
