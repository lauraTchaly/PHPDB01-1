<?php
/** 
* Arquivo que faz a configuração inicial da página.
* Por exemplo, conecta-se ao banco de dados 
*/
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

/**
 * Variável que define o título desta página
 *     Referências:
 *     → https://www.w3schools.com/php/php_variables.asp
 *     → https://www.php.net/manual/pt_BR/language.variables.basics.php
 */

$title = "Quem tem fome tem pressa...";

/*Inclui o cabeçalho da página
*Referências:
*     → https://www.w3schools.com/php/php_includes.asp
*     → https://www.php.net/manual/pt_BR/function.include.php
*/
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');
?>
<section>
    <h2>Título da Página</h2>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum asperiores, unde assumenda quam
         dignissimos repudiandae placeat vel suscipit dolorum quod odio provident quidem odit ab. 
         Eius odit totam explicabo corrupti!
    </p>
    <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint praesentium asperiores delectus. 
         Reprehenderit tempore quasi esse labore facere accusamus nemo praesentium unde est. 
         Voluptatem quia incidunt rerum aut doloribus doloremque.
 </p>
</section>
<aside>
     <h3>Lateral</h3>
    <p>
     Lorem ipsum dolor sit amet consectetur adipisicing elit. 
     Perferendis ducimus fugiat sunt velit!
     </p>
</aside>
<?php
//Inclui o footer da página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
?>
        
