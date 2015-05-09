<?php
namespace Maia\Form;


class Form
{
    private $elements=array();

    public function addElement($object)
    {
        $this->elements[] = $object;
    }


    public function createField($fieldType, $nameId, $options=null, $defaultValue=null)
    {

        switch ($fieldType)
        {
            case "textarea":
                $this->elements[] = $nameId . ": <textarea name='" . $nameId . "' id='" . $nameId . "' cols=30 rows=4>$defaultValue</textarea>\n\n<br /><br />\n\n";
                break;
            case "input_text":
                $this->elements[] = $nameId . ": <input value=\"" . $defaultValue . "\" type=text name='" . $nameId . "' id='" . $nameId . "' size=20>\n\n<br /><br />\n\n";
                break;
            case "fieldset":
                $fs = new Fieldset();
                $fs->setLegend($nameId);
                $this->elements[] = $fs->getOpenedAndLegend();
                break;
            case "select":
                $str = $nameId . ": <select name='" . $nameId . "' id='" . $nameId . "'>\n";
                foreach ($options as $key => $value)
                {
                    $selected="";
                    if ($defaultValue==$key)
                    {
                        $selected="selected";
                    }
                    $str .= "    <option $selected value='" . $key . "'>" . $value . "</option>\n";
                }
                $this->elements[] = $str . "</select>\n\n";
                break;
            default:
                $this->elements[] =  "Erro obtendo elemento de nome/id " . $nameId . " do tipo " . $fieldType;
        }
    }


    public function createFieldset($legend)
    {
        $this->createField("fieldset", $legend);
    }


    public function closeFieldset()
    {
        $this->elements[] = "</fieldset>";
    }


    public function render()
    {
        $r="<form method=\"get\">";
        for ($i=0;$i<count($this->elements);$i++)
        {
            $r.= $this->elements[$i];
        }
        $r.="<br /><br /><input type=submit value=\"Enviar\">\n\n</form>\n\n<hr />\n\n";
        return $r;
    }



    public function __construct(Validator $v=null)
    {
        # aguardando o que fazer com Validator $v
    }


}