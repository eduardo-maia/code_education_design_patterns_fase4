<?php
/**
 * Created by PhpStorm.
 * User: maia
 * Date: 5/9/2015
 * Time: 8:27 AM
 */

namespace Maia\Form;


class Produto {
    private $nome,$valor,$descricao,$categoria;

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        if (strlen($descricao)>200)
        {
            throw new \Exception ("strlen da descricao deve ser no maximo 200");
            return;
        }

        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        if (! is_numeric($valor) )
        {
            throw new \Exception("Erro: valor deve ser numerico.");
            return;
        }
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $nomes = $this->nomesValidos();
        $achei=false;
        for ($i=0; $i<count($nomes); $i++)
        {
            if ($nomes[$i] == $nome)
            {
                $achei=true;
                break;
            }
        }

        if (!$achei)
        {
            throw new \Exception("Erro: nome invalido, esperados os seguintes valores: " . join(", ",$this->nomesValidos()));
            return;
        }

        $this->nome = $nome;
    }


    private function nomesValidos()
    {
        return array("Manager", "Registry", "Design Patterns", "behat", "PHP Unit");
    }


    public function getAllCategorias()
    {
        $db = new \SQLite3('code.education.db');
        $r = array();

        $results = $db->query("select id, nome from categoria");
        while ($row = $results->fetchArray())
        {
            $r[ $row['id'] ] = $row["nome"];
        }

        return $r;
    }


}