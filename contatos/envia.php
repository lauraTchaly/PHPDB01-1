<?php
/** 
* Arquivo que faz a configuração inicial da página.
* Por exemplo, conecta-se ao banco de dados 
*/
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

/***********************************************
 * Seus códigos PHP desta página iniciam aqui! *
 ***********************************************/

//Processa o formulário, se ele foi enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Cria e inicializa as variáveis usadas no script
    $nome = $email = $assunto = $mensagem = $feedback = '';

    // Recebe o campo 'nome' do formulário e sanitiza
    $nome = trim(htmlspecialchars($_POST['nome']));

    // Recebe o campo 'email' dor formulário e sanitiza
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    // Recebe o campo 'assunto' do formulário e sanitiza
    $assunto = trim(htmlspecialchars($_POST['assunto']));

    // Recebe o campo 'mensagem' do formulário e sanitiza
    $mensagem = trim(htmlspecialchars($_POST['mensagem']));

    // Verifica se tem algum campo vazio
    if ($nome === '' or $email === '' or $assunto === '' or $mensagem === '') {

        $feedback = <<<HTML

<h3>Oooops!</h3>
<p>Não foi possível enviar o contato.</p>
<p>Você precisa preencher todos os campos do formulário.</p>
<p><button onclick="history.go(-1)">&larr; Voltar</button></p>

HTML;
    } else {

        /**
         * Se todos os campos estão preenchidos.
         * Salva dados no banco de dados.
         */

         // Query de escrita no banco
         $sql = <<<SQL

INSERT INTO contacts (
    name,
    email,
    subject,
    message
) VALUES (
    '{$nome}',
    '{$email}',
    '{$assunto}',
    '{$mensagem}'
);

SQL;

    // Escreve no banco de dados
    $conn->query($sql);

          /**
         * Obtém o primeiro nome do remetente.
         */

        // Gera um array com as partes do nome.
        // $parts[0] contém o primeiro nome.
        $parts = explode(' ', $nome);

       // Abradecer ao usuário
       $feedback = <<<HTML

       <h3>Olá {$parts[0]}!</h3>
    <p>Seu contato foi enviado com sucesso.</p>
    <p><em>Obrigado...</em></p>
    <p><button onclick="location.href = '/'"><i class="fa-solid fa-house-chimney"></i> Página inicial</button></p> 

HTML;


        /**
         * Envia e-mail para o administrador do site.
         * ATENÇÃO! Não funciona em redes locais. Só em provedores pagos.
         */
        // Mensagem do e-mail
        $mail_message = <<<TXT
        
        Novo contato enviado para Vitugo:

        - Remetente: {$nome}
        - E-mail: {$email}
        - Assunto: {$assunto}
        - Mensagem:
        {$mensagem}
       
       Obrigado...
       
       TXT;
        

TXT;

     // Enviando e-mail para 'admin@vitugo.com'.
        // O '@' oculta mensagens de erro. MUITO CUIDADO!!!
        @mail('admin@vitugo.com', 'Um contato foi enviado.', $mail_message);
    
    }
} else {
    /**
     * Se o formulário NÃO foi enviado
     * sai desta página e mostra o formulário para o usuário.
     */
    header('Location: index.php');
}

/************************************************
 * Seus códigos PHP desta página terminam aqui! *
 ************************************************/



/**
 * Variável que define o título desta página
 *     Referências:
 *     → https://www.w3schools.com/php/php_variables.asp
 *     → https://www.php.net/manual/pt_BR/language.variables.basics.php
 */

$title = "Faça Contato";

/*Inclui o cabeçalho da página
*Referências:
*     → https://www.w3schools.com/php/php_includes.asp
*     → https://www.php.net/manual/pt_BR/function.include.php
*/
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');
?>
<section>
   

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
        
