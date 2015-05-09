<?php
namespace Maia\Form;


class TextArea implements FormElementInterface
{
    # name e id do objeto serão iguais
    #  não vou utilizar demais atributos, como rows, cols, OnClick, OnKeyPress etc
    private $name_id;
    private $type;

    public function __construct($name_id)
    {
        $this->name_id = $name_id;
        $this->type="textarea";
    }

    public function getType()
    {
        return $this->type;
    }

    public function getNameId()
    {
        return $this->name_id;
    }

    // Esse tipo de parâmetro e o if abaixo não é boa prática. Porém, conforme especificado:
    // "este deve receber parâmetros para a criação do campo"
    // Não entendi quais parâmetros...
    public function createField($name_id=null)
    {
        if ($name_id != null)
        {
            $this->name_id = $name_id;
        }
        echo $this->name_id . ": <textarea type=text name='" . $this->name_id . "' id='" . $this->name_id . "'  cols=30 rows=4></textarea>\n\n<br /><br />\n\n";
    }


}
