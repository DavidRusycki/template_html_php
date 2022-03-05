<?php
namespace Model;
/**
 * Modelo Principal do sistema.
 * @author David Rusycki
 * @since 04/03/2022
 */
class ModelSistema  
{
    
    private ModelUsuario $Usuario;

    /**
     * Get the value of Usuario
     */ 
    public function getUsuario() : ModelUsuario
    {
        if (empty($this->Usuario)) 
        {
            $this->Usuario = new ModelUsuario();
        }
        return $this->Usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */ 
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }
    
}