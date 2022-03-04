<?php
namespace Components\FacadeDb;
abstract class Manager
{

    const ARRAY = 1;
    const OBJECT = 2;

    const POSTGRES = 1;
    const MYSQL = 2;

    private \PDO $Pdo;
    private string $type;
    protected static self $instance;

    /**
     * Retorna as configurações para o PDO.
     */
    abstract public function getConfigForPdo();
    /**
     * Retorna o usuário para o PDO.
     */
    abstract public function getUser();
    /**
     * Retorna a senha para o PDO.
     */
    abstract public function getPassword();
    /**
     * Retorna o tipo de banco da instância atual.
     */
    abstract public function getType();

    /**
     * Executa o begin da transação.
     */
    public function begin() 
    {
        $this->getPdo()->beginTransaction();
    }
    
    /**
     * Executa o Commit da transação.
     */
    public function commit() 
    {
        $this->getPdo()->commit();
    }
    
    /**
     * Executa o rollback da transação.
     */
    public function rollback() 
    {
        $this->getPdo()->rollback();
    }

    /**
     * Comando de select.
     * @param string $sSql - SQL a ser executado.
     * @param int $iType - Tipo de retorno Array ou Objeto
     * @return Object | Array
     */
    public function select(string $sSql, int $iType = self::ARRAY) 
    {
        $xRetorno = null;
        if ($iType == self::ARRAY) {
            $xRetorno = $this->getAsArray($sSql);
        }
        else if ($iType == self::OBJECT) {
            $xRetorno = $this->getAsObject($sSql);
        }
        return $xRetorno;
    }
    
    /**
     * Retorna como um array
     */
    public function getAsArray(string $sSql) 
    {
        $statement = $this->getPdo()->query($sSql);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retorna como um objeto
     */
    public function getAsObject(string $sSql) 
    {
        $statement = $this->getPdo()->query($sSql);
        return $statement->fetchObject();
    }

    /**
     * Executa uma query que não deve possuir retorno.
     * Serve para Delete, Update, Alter etc.
     * @param string $sSql - SQL a ser executado.
     */
    public function execute(string $sSql) : bool
    {
        try {
            $statement = $this->getPdo()->query($sSql);
            return $statement->execute();
        } catch (\Throwable $th) {
            $this->rollback();
            throw $th;
        }   
    }

    /**
     * Get the value of Pdo
     */ 
    public function getPdo()
    {
        if (empty($this->Pdo)) {
            $this->Pdo = new \PDO($this->getConfigForPdo(), $this->getUser(), $this->getPassword());
        }
        return $this->Pdo;
    }

    /**
     * Set the value of Pdo
     *
     * @return  self
     */ 
    public function setPdo($Pdo)
    {
        $this->Pdo = $Pdo;

        return $this;
    }

}