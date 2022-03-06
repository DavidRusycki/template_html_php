<?php
namespace ModelBo;
use \Model\ModelRotina;
/**
 * Modelo de Rotina
 * @author David Rusycki
 * @since 05/03/2022
 */
class ModelBoRotina
{

    private ModelRotina $model;
    
    /**
     * Construtor da classe
     */
    public function __construct($oModel) {
        $this->setModel($oModel);
    }
    
    /**
     * Valida se a rotina existe pelo nome da mesma.
     * @param type $sNome
     * @return bool
     */
    public function validaRotinaExiste($sNome) : bool
    {
        $xResult = $this->getModel()->buscaRotinaFromNome($sNome);
        if (!$xResult) 
        {
            throw new \Exception('A rotina solicitada não existe');
        }
        return true;
    }
    
    public function getModel(): ModelRotina 
    {
        return $this->model;
    }

    public function setModel(ModelRotina $model)
    {
        $this->model = $model;
        return $this;
    }
        
}
