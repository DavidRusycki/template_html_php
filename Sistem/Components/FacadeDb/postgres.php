<?php
namespace Components\FacadeDb;

class Postgres extends Manager {

    /**
     * Nome da DataBase
     */
    const NOME_BD = 'template';

    public function getConfigForPdo()
    {
        return "pgsql:host=localhost;dbname={$this->getBdName()}";
    }
    
    public function getUser()
    {
        return 'postgres';
    }
    
    public function getPassword()
    {
        return 'postgres';
    }

    public function getType() 
    { 
        return Manager::POSTGRES;
    }

    /**
     * Retorna uma instância.
     * @return self;
     */
    public static function getInstance() : self
    {
        if (empty(self::$instance)) {
            self::$instance = new Self();
        }
        return self::$instance;
    } 

    /**
     * Retorna o nome da data base.
     */
    private function getBdName() : string
    {
        return self::NOME_BD;
    }

}