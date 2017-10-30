<?php

class Products extends Model{
    protected $table = "local";
    protected $primaryKey = "codigo";
    
    public $nombre;
    public $precio;
    public $tipo;
    public $img;
    public $proveedor;
    
    public static function findlimit($pagina=1){
        $model = new static();
        $empezar_desde = ($pagina-1) * $model->products_per_page;
        
        $sql = "SELECT * FROM ".$model->table." LIMIT $empezar_desde, $model->products_per_page";
        return DB::queryall($sql);
    }

    public static function coutPages(){
        $model = new static();
        $sql= "SELECT COUNT(*) as `count` FROM ".$model->table;
        $total = DB::queryall($sql);
        $total = $total->fetch();
        return ceil(((object)$total)->count / $model->products_per_page);
    }
}