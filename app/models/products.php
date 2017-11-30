<?php

class Products extends Model{
    protected $table = "local";
    protected $primaryKey = "codigo";
    
    public $products_per_page = 16;
    public $nombre;
    public $precio;
    public $tipo;
    public $img;
    public $proveedor;
    
    public static function findlimit($pagina=1, $cantidad=4){
        $model = new static();
        $empezar_desde = ($pagina-1) * $model->products_per_page;
        
        $sql = "SELECT * FROM ".$model->table." LIMIT $empezar_desde, $model->products_per_page";
        return DB::queryall($sql);
    }

    public static function findall(){
        $model = new static();
        $sql = "SELECT * FROM ".$model->table;
        return DB::queryall($sql);
    }

    public static function coutPages(){
        $model = new static();
        $sql= "SELECT COUNT(*) as `count` FROM ".$model->table;
        $total = DB::queryall($sql);
        $total = $total->fetch();
        return ceil(((object)$total)->count / $model->products_per_page);
    }

    public static function buscar($param){
        $model = new static();
        $param = explode(" ", trim($param));
        $sql= "SELECT * FROM ".$model->table." WHERE ";
        foreach($param as $p) { 
            $sql.="nombre LIKE '%$p%'";
            if ($p !== end($param)) $sql.=" and ";
        }
        $resultado = DB::queryall($sql);
        return $resultado;
    }
}