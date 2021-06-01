<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/cargos.modelo.php';
/**
 * Permite realizar consultas a la API de Talana (Software de remuneraciones)
 *
 * Class TalanaControlador
 */
class TalanaControlador
{

    /**
     * Actualiza los contratos del mes actual
     */
    public static function actualizaContratosMesActual()
    {
        $listaContratos = array();
        $listaFinal = array();
        $a = self::conectaAPI('https://talana.com/es/api/remuneraciones/contract/current-month');
        $puntero = $a['next'];

        foreach ($a['results'] as $row)
        {
            $listaContratos[] = $row;
        }

        while ($puntero != null)
        {
            $a = self::conectaAPI($puntero);
            $puntero = $a['next'];
            foreach ($a['results'] as $row)
            {
                $listaContratos[] = $row;
            }

        }

        foreach ($listaContratos as $row)
        {
            $a = array(
                'periodo' => date('Y'),
                'mes' => date('n'),
                'cco' => $row['centroCosto']['codigo'],
                'nom_cco' => $row['centroCosto']['nombre'],
                'cargo' => $row['cargo'],
                'empresa' => $row['empleadorRazonSocial']['razonSocial']
            );
            $listaFinal[] = $a;
        }

        foreach ($listaFinal as $row)
        {
            $res = CargosModelo::insertarFilas($row);
        }


        // Escribe en la BD




    }

    public function actualizaContratosMes($ano,$mes)
    {
        $res = CargosControlador::ctrVerPeriodos();

        $flag = false;
        foreach ($res as $row)
        {
            if ($row['mes'] == $mes && $row['periodo'] == $ano)
            {
                $flag = true;
            }
        }


        if (!$flag)
        {
            $mesFormato = '';
            if (strlen($mes)== 1)
            {
                $mesFormato = '0'.$mes;
            }else
            {
                $mesFormato = $mes;
            }


            $listaContratos = array();
            $listaFinal = array();
            $a = self::conectaAPI('https://talana.com/es/api/remuneraciones/contract/'.$ano.'-'.$mesFormato.'');


            $puntero = $a['next'];

            foreach ($a['results'] as $row)
            {
                $listaContratos[] = $row;
            }

            while ($puntero != null)
            {
                $a = self::conectaAPI($puntero);
                $puntero = $a['next'];
                foreach ($a['results'] as $row)
                {
                    $listaContratos[] = $row;
                }

            }

            foreach ($listaContratos as $row)
            {
                $a = array(
                    'periodo' => $ano,
                    'mes' => $mes,
                    'cco' => $row['centroCosto']['codigo'],
                    'nom_cco' => $row['centroCosto']['nombre'],
                    'cargo' => $row['cargo'],
                    'empresa' => $row['empleadorRazonSocial']['razonSocial'],
                    'rut' => $row['empleado']['rut'],
                    'nombre' => $row['empleado']['nombre'],
                    'appaterno' => $row['empleado']['apellidoPaterno'],
                    'apmaterno' => $row['empleado']['apellidoMaterno'],
                );
                $listaFinal[] = $a;
            }


            foreach ($listaFinal as $row)
            {
                $res = CargosModelo::insertarFilas($row);


            }
            // Escribe en la BD

        }else
        {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> El periodo seleccionado ya existe en la base de datos</i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }


    }










    private static function conectaAPI($url)
    {
        $ch = curl_init();
        $username = 'integracion-centralizacion@ika.cl';
        $password = 'InfaliblementeKinetico912-';
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'rohit');
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $resultArray = json_decode($result,true);
        return $resultArray;
    }



}
