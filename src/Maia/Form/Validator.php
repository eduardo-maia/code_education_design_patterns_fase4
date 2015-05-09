<?php

namespace Maia\Form;


class Validator {

    public function __construct(Request $r = null)
    {

    }

    public function validateAll($nome,$valor,$descricao,$categoria)
    {
        $p = new \Maia\Form\Produto();
        $erros="";

        try
        {
            $p->setNome($nome);
        }
        catch(\Exception $e)
        {
            $erros.="<li>" . $e->getMessage();
        }

        try
        {
            $p->setValor($valor);
        }
        catch(\Exception $e)
        {
            $erros.="<li>" . $e->getMessage();
        }

        try
        {
            $p->setDescricao($descricao);
        }
        catch(\Exception $e)
        {
            $erros.="<li>" . $e->getMessage();
        }

        if ($erros)
        {
            return $erros;
        }
        else
        {
            return "OK";
        }
    }



}