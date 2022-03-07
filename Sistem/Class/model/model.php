<?php
namespace Model;
use Components\FacadeDb\Manager;

/**
 * Modelo base do sistema
 * @author David Rusycki
 * @since 06/03/2022
 */
abstract class Model
{

    private Manager $Db;
 
    public function getDb() 
    {
        return $this->Db;
    }

    public function setDb($Db)
    {
        $this->Db = $Db;
        return $this;
    }
    
}

