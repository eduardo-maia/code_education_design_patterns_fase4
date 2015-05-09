<?php
/*
$form = new Form();
$form->addElement(new Input());
$form->render();

Com apenas estas três linhas deve ser criado um formulário com um input.
 */

namespace Maia\Form;

interface FormElementInterface
{
    public function getType();
    public function getNameId();
    public function createField();
}