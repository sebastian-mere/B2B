<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Replace this email with the recipient email address
    $mail_to = "Igresar mail de la empresa";

    # Sender Data
    $name = htmlspecialchars(trim($_POST["name"]));
    $apellido = htmlspecialchars(trim($_POST["apellido"]));
    $telefono = htmlspecialchars(trim($_POST["telefono"]));
    $cif = htmlspecialchars(trim($_POST["cif"]));
    $empresa = htmlspecialchars(trim($_POST["empresa"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $opcion = htmlspecialchars($_POST["opcion"]);
    $message = trim($_POST["ayuda"]);
    $subject = "Mensaje de $name $apellido desde el sitio web";

    # Check for empty fields
    if (empty($name) || empty($apellido) || empty($telefono) || empty($cif) || empty($empresa) || empty($email) || empty($opcion) || empty($message)) {
        http_response_code(400); // Bad Request
        echo "Por favor, completa el formulario y vuelve a intentarlo.";
        exit;
    }

    # Mail Content
    $content = "Nombre: $name\n";
    $content .= "Apellido: $apellido\n";
    $content .= "Teléfono: $telefono\n";
    $content .= "CIF: $cif\n";
    $content .= "Empresa: $empresa\n";
    $content .= "Email: $email\n";
    $content .= "Opción elegida: $opcion\n";
    $content .= "Mensaje:\n$message\n";

    # Email headers
    $headers = "From: $email\nReply-To: $email\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/plain; charset=utf-8";

    # Send the email using the mail() function
    if (mail($mail_to, $subject, $content, $headers)) {
        http_response_code(200); // OK
        header("Location: http://electrocasac.com.ar/index.html#success");
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
