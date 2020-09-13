<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email</title>
</head>

<body>
<?php
// Recebe os dados do formulário
$nome = $_POST["name"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("phpmailer/PHPMailerAutoload.php");
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.sapo.pt"; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = 'client_site@sapo.pt'; // Conta de email existente e ativa em seu domínio
$mail->Password = 'Site_client'; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = "client_site@sapo.pt"; // Conta de email existente e ativa em seu domínio
$mail->From = "client_site@sapo.pt"; // Sua conta de email que será remetente da mensagem
$mail->FromName = "Cliente - Site"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
// AMAURI O UNICO LUGAR QUE VOCÊ TEM QUE MUDAR É AQUI, AO INVÉS DE 120692014@eniac.edu.br VOCÊ COLOCA O EMAIL DO CARA
$mail->AddAddress('amaurimt@yahoo.com.br', 'Cliente'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Cliente - Site"; // Assunto da mensagem
$mail->Body .= "<div style='white-space:pre; color:#000;'>
Nome: ".$nome."
Email: ".$email."
Mensagem:
".
$mensagem."
</div>"; // Texto da mensagem
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if ($enviado) { ?>
<script>alert("Dados enviados com sucesso!"); location.href="index.html";</script>
<?php } else {
  //echo "Não foi possível enviar o e-mail.";
  //echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
?>
<script>alert("Erro ao enviar!\nTente novamente mais tarde"); history.go(-1);</script>
<?php } ?>
</body>
</html>