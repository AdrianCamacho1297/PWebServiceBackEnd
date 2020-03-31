<?php
    function InsertaSen(&$post){
        $id = $post['idsen'];
        $noms = $post['nomsensor'];
        $val = $post['valor'];
        $sentencia = "INSERT INTO cuerpo.sensado(idsen,nomsensor,valor) values($id, '$noms', $val)";
        return Ejecuta($sentencia);
    }

    function ActualizarSen($post){
        $ids = $post['idsen'];
        $noms = $post['nomsensor'];
        $val = $post['valor'];
        $sentencia = "UPDATE cuerpo.sensado SET nomsensor='$noms', valor=$val WHERE idsen=$ids";
        return Ejecuta($sentencia);
    }

    function InsActSen($post){
        if (InsertaSen($post)!=1)
            return ActualizarSen($post);
        else
            return 1;
    }

    function obj2array($obj) {
        $out = array();
        foreach ($obj as $key => $val) {
        switch(true) {
            case is_object($val):
            $out[$key] = obj2array($val);
            break;
            case is_array($val):
            $out[$key] = obj2array($val);
            break;
            default:
            $out[$key] = $val;
        }
        }
        return $out;
    }
?>