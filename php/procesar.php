<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Reemplace este correo electrónico con la dirección de correo electrónico del destinatario
    $mail_to = "ejemplo@ejemplo.com";

    # Datos del remitente
    $name = htmlspecialchars(trim($_POST["name"]));
    $apellido = htmlspecialchars(trim($_POST["apellido"]));
    $telefono = htmlspecialchars(trim($_POST["telefono"]));
    $cif = htmlspecialchars(trim($_POST["cif"]));
    $empresa = htmlspecialchars(trim($_POST["empresa"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $opcion = htmlspecialchars($_POST["opcion"]);
    $message = trim($_POST["ayuda"]);
    $subject = "Mensaje de $name $apellido desde el sitio web";

    # Comprobar campos vacíos
    if (empty($name) || empty($apellido) || empty($telefono) || empty($cif) || empty($empresa) || empty($email) || empty($opcion) || empty($message)) {
        http_response_code(400); // Bad Request
        echo "Por favor, completa el formulario y vuelve a intentarlo.";
        exit;
    }

    # Contenido del correo
    $content = "Nombre: $name\n";
    $content .= "Apellido: $apellido\n";
    $content .= "Teléfono: $telefono\n";
    $content .= "CIF: $cif\n";
    $content .= "Empresa: $empresa\n";
    $content .= "Email: $email\n";
    $content .= "Opción elegida: $opcion\n";
    $content .= "Mensaje:\n$message\n";

    # Encabezados de correo electrónico
    $headers = "From: $email\nReply-To: $email\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/plain; charset=utf-8";

    # Envía el correo electrónico usando la función mail()
    if (mail($mail_to, $subject, $content, $headers)) {
        http_response_code(200); // OK
        header("Location: #success");
        /*echo "¡Gracias! Su mensaje ha sido enviado.";*/
    } else {
        http_response_code(500); // Internal Server Error
        echo "¡Oops! Algo salió mal, no pudimos enviar su mensaje.";
    }
} else {
    http_response_code(403); // Forbidden
    echo "Hubo un problema con su envío, por favor, inténtelo de nuevo.";
}
?>
