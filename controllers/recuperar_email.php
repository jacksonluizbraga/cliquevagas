<?php
require("../model/persistency/db.php");
// Recebe um e-mail
if (isset($_POST['email']) && $_POST['email'] != "" ) {
    $email = pg_escape_string($_POST['email']);
    // Faz uma pesquisa no banco para encontrar o e-mail
    $sql = "SELECT * FROM empresa WHERE email = '$email'";
    $resultado = banco($sql);
    // Se não existir
    if (pg_num_rows($resultado) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        //alert('E-mail não encontrado. Por favor tente novamente.');
        header('Location: ../erro_email_nao_encontrado.html');
    } else {
        // Se existir
        //   cria uma hash md5 com o e-mail e data/hora do momento
        $chave = md5($_POST['email'] . date("Y/m/d"));

        //   cria um email e envia para o e-mail com uma url + hash
        require_once("../phpmailer/class.phpmailer.php");

        // Envia um e-mail para cada e-mail do resultado
        $mail = new PHPMailer();
        $mail->IsSMTP();		        // Ativar SMTP
        $mail->SMTPDebug = 1;		    // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;		    // Autenticação ativada
        $mail->SMTPSecure = 'ssl';	    // SSL REQUERIDO pelo GMail
        $mail->Host = 'smtp.gmail.com';	// SMTP utilizado
        $mail->Port = 465;  		    // A porta 465 deverá estar aberta em seu servidor
        $mail->Username = getenv("EMAIL");
        $mail->Password = getenv("PASSWORD_EMAIL");
        $mail->SetFrom(getenv("EMAIL"), "Clique Vagas Caruaru");
        $mail->Subject = "Recuperação de senha";
        $mail->IsHtml(true);
        //   exibe mensagem dizendo para verificar o email atrás de um link
        $body  = "<html><body>";
        $body .= "<p><h3>Email de recuperação de senha </p></h3>";
        $body .= "<p>Acesse o link abaixo para alterar sua senha.</p>";
        $body .= "<p><a href= 'http://$_SERVER[HTTP_HOST]" . "?chave=" . $chave . "'></a></p>";
        $body .= "</body></html>";

//      header('Location: ../email_enviado.html');
    } 
}
?>