<?php


class Producto extends Conectar {


    public function get_producto(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql ="SELECT * FROM tm_producto WHERE est=1 ORDER BY prod_nom DESC";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_producto($prod_id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql ="UPDATE tm_producto SET est=0 WHERE prod_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_producto_x_id($prod_id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql ="SELECT * FROM tm_producto WHERE prod_id=? AND est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($prod_nom, $prod_oficial, $prod_soles, $prod_usd, $prod_plazo,$fech_inicio, $fech_fin, $prod_monto, $prod_ie){
        $conectar = parent::conexion();
        parent::set_names();
        $sql ="INSERT INTO tm_producto (prod_id, prod_nom, prod_oficial, prod_soles, prod_usd, prod_plazo, fech_inicio, fech_fin, fech_elim, prod_monto, prod_ie, est) VALUES (NULL,?,?,?,?,?,?,?,NULL,?,?,1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->bindValue(2, $prod_oficial);
        $sql->bindValue(3, $prod_soles);
        $sql->bindValue(4, $prod_usd);
        $sql->bindValue(5, $prod_plazo);
        $sql->bindValue(6, $fech_inicio);
        $sql->bindValue(7, $fech_fin);
        $sql->bindValue(8, $prod_monto);
        $sql->bindValue(9, $prod_ie);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_producto($prod_id, $prod_nom, $prod_oficial, $prod_soles, $prod_usd, $prod_plazo,$fech_inicio, $fech_fin, $prod_monto, $prod_ie){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_producto SET prod_nom=?, prod_oficial=?, prod_soles=?, prod_usd=?, prod_plazo=?, fech_inicio=?, fech_fin=? , prod_monto=?, prod_ie=? WHERE prod_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->bindValue(2, $prod_oficial);
        $sql->bindValue(3, $prod_soles);
        $sql->bindValue(4, $prod_usd);
        $sql->bindValue(5, $prod_plazo);
        $sql->bindValue(6, $fech_inicio);
        $sql->bindValue(7, $fech_fin);
        $sql->bindValue(8, $prod_monto);
        $sql->bindValue(9, $prod_ie);
        $sql->bindValue(10,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>