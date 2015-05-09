<html>
<body>

<?php
error_reporting(E_ALL);


# -----------------------------
# AUTOLOAD
# -----------------------------
define('CLASS_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR);
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(function($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = CLASS_DIR . $path . '.php';
    if (is_file($file)) {
        require_once($file);
    } else {
        throw new \ErrorException("Could not load class {$className}. File not found: {$file}");
        die();
    }
});


// "Você deverá ser capaz de popular esse formulário com dados vindo de um array, no momento da exibição do formulário."
// Ok, vou usar o array $_POST
$nome=filter_input(INPUT_GET, "Nome");
$valor=filter_input(INPUT_GET, "Valor");
$descricao=filter_input(INPUT_GET, "Descricao");
$categoria=filter_input(INPUT_GET, "Categoria");

# Validação de dados
if ( !empty($_GET) )
{
    $v = new \Maia\Form\Validator();
    echo $v->validateAll($nome,$valor,$descricao,$categoria) . "<br /><br />";
}

# Impressão do formulário
$f = new Maia\Form\Form();
$p=  new \Maia\Form\Produto();
$f->createField( "input_text", "Nome" , null, $nome );
$f->createField("input_text", "Valor" , null, $valor );
$f->createField("input_text", "Descricao", null, $descricao ) ;
$f->createField( "select", "Categoria", $p->getAllCategorias() , $categoria );
echo $f->render();

?>


<!--
O exercício pede para que você crie o fieldset (será uma classe) e que seja possível inserir campos de formulário dentro do fieldset. Ex:

$form = new Form();
$inputNome = $form->createField('input', array('name'=>'nome'));
$fieldsetDadosPessoais = $form->createField('fielset', array('legend'=>'Dados Pessoais'));
$fieldsetDadosPessoais->addField($inputNome);
$form->addField($fieldsetDadosPessoais);
$form->render();
-->

</body>
</html>
