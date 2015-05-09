<?php
namespace Maia\Form;


class Fieldset
{
    private $legend="";


    function setLegend($legend)
    {
        $this->legend = $legend;
    }


    function render($html)
    {
        return "<fieldset><br />$html<br /></fieldset>\n";
    }

    function close()
    {
        return "<br /></fieldset>";
    }


    function getOpenedAndLegend()
    {
        return "<fieldset><br /><legend>" . $this->legend . "</legend><br />";
    }

}