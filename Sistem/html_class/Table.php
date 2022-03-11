<?php
namespace Html;

class Table extends HtmlElement
{
    
    private $Linhas = [];
    private bool $altera = true;
    private bool $exclui = true;
    private string $nomeChave = 'codigo';

    public function __construct($aTitulos, $iLinhas, $aConteudo, $pagina)
    {
        $this->montaEstrutura($aTitulos, $iLinhas, $aConteudo, $pagina);
    }

    public function montaEstrutura(array $aTitulos, int $iLinhas, array $aConteudo, string $pagina) 
    {
        $aTr = [];
        $aTr[] = $this->getTrTitulos($aTitulos, $aConteudo);
        $aTr = array_merge($aTr, $this->getLinhasRestantes($iLinhas, $aConteudo, $pagina)); 
        $this->setLinhas($aTr);
    }

    private function getTrTitulos(array $aTitulos, array $aConteudo) 
    {
        $aTd = [];
        // Para a estrutura funcionar a quantidade de titulos deve ser a quantidade de indices do array de conteúdo.
        foreach($aTitulos as $sTitulo) {
            $oTd = $this->getNewTd($sTitulo);
            $aTd[] = $oTd;
        }
        return $this->getNewTr($aTd);
    }

    private function getNewTd($sTexto) : Td
    {
        return new Td($sTexto);
    }

    private function getNewTr($aTd) : Tr
    {
        return new Tr($aTd);
    }

    /**
     * Retorna as linhas baseadas no conteúdo passado.
     */
    private function getLinhasRestantes(int $iLinhas, array $aConteudo, string $pagina) : array
    {
        $iLimite = 1;
        $aTr = [];
        foreach($aConteudo as $aLinha)
        {
            $this->adicionaBotoes($aLinha, $pagina);
            $aTd = [];
            foreach($aLinha as $xColuna) 
            {
                $aTd[] = $this->getNewTd($xColuna);
            }
            $aTr[] = $this->getNewTr($aTd);
            $iLimite++;
            if ($iLimite > $iLinhas) {
                break;
            }
        }
        return $aTr;
    }

    /**
     * Adiciona os botões na tabela
     * @param type $aLinha
     */
    private function adicionaBotoes(&$aLinha, $pagina) 
    {
        if ($this->getAltera() && $this->getExclui()) {
            $iAcao = \Enum\EnumAcoes::ALTERAR;
            $iMetodo = \Enum\EnumSistema::MONTA_TELA;
            $oA1 = new A('<i class="fa-solid fa-pencil"></i>', "http://localhost/template_html_php/?pg={$pagina}&acao={$iAcao}&metodo={$iMetodo}&id={$aLinha[$this->getNomeChave()]}");
            $oA1->setClass('btn btn-danger btn-sm');
            
            $iAcao = \Enum\EnumAcoes::EXCLUIR;
            $iMetodo = \Enum\EnumSistema::MONTA_TELA;
            $oA2 = new A('<i class="fa-solid fa-trash-can"></i>', "http://localhost/template_html_php/?pg={$pagina}&acao={$iAcao}&metodo={$iMetodo}&id={$aLinha[$this->getNomeChave()]}");
            $oA2->setClass('botao_excluir btn btn-success btn-sm');
            
            $aLinha[] = $oA1 .' '. $oA2;
        }
        else 
        {   
            if ($this->getAltera()) {
                $iAcao = \Enum\EnumAcoes::ALTERAR;
                $iMetodo = \Enum\EnumSistema::MONTA_TELA;
                $oA = new A('<i class="fa-solid fa-pencil"></i>', "http://localhost/template_html_php/?pg={$pagina}&acao={$iAcao}&metodo={$iMetodo}&id={$aLinha[$this->getNomeChave()]}");
                $oA->setClass('btn btn-danger btn-sm');
                $aLinha[] = $oA;
            }
            if ($this->getExclui()) {
                $iAcao = \Enum\EnumAcoes::EXCLUIR;
                $iMetodo = \Enum\EnumSistema::MONTA_TELA;
                $oA = new A('<i class="fa-solid fa-trash-can"></i>', "http://localhost/template_html_php/?pg={$pagina}&acao={$iAcao}&metodo={$iMetodo}&id={$aLinha[$this->getNomeChave()]}");
                $oA->setClass('botao_excluir btn btn-success btn-sm');
                $aLinha[] = $oA;
            }
        }
    }
    
    public function __toString()
    {
        $sResult = "<table class=\"{$this->getClass()}\" name=\"{$this->getName()}\" > \n";
        foreach($this->getLinhas() as $oLinha) 
        {
            $sResult .= $oLinha . "\n";
        }
        $sResult .= "</table> \n";

        return $sResult;
    }

    /**
     * Get the value of Linhas
     */ 
    public function getLinhas()
    {
        return $this->Linhas;
    }

    /**
     * Set the value of Linhas
     *
     * @return  self
     */ 
    public function setLinhas($Linhas)
    {
        $this->Linhas = $Linhas;

        return $this;
    }

    public function getAltera(): bool 
    {
        return $this->altera;
    }

    public function setAltera(bool $altera): self 
    {
        $this->altera = $altera;
        
        return $this;
    }

    public function getExclui(): bool 
    {
        return $this->exclui;
    }

    public function setExclui(bool $exclui): self 
    {
        $this->exclui = $exclui;
        
        return $this;
    }

    public function getNomeChave(): string 
    {
        return $this->nomeChave;
    }

    public function setNomeChave(string $nomeChave): self
    {
        $this->nomeChave = $nomeChave;
        
        return $this;
    }
    
}

