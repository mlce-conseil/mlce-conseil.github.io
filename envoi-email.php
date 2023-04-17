<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $prenom = $_POST["fname"];
    $nom = $_POST["lname"];
    $email = $_POST["email"];
    $tel = $_POST["phone"];
    $sujet = $_POST["subject"];

    // Valider les champs
    if (empty($prenom) || empty($email) || empty($sujet)) {
        echo "Tous les champs obligatoires n'ont pas été renseignés.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail n'est pas valide.";
        exit;
    }

    // Envoyer l'e-mail
    $to = "mlce.conseil@gmail.com";
    $subject = "Nouveau message de $prenom $nom : $sujet";
    $body = "Nom : $prenom $nom\n\nAdresse e-mail : $email\n\nTéléphone : $tel\n\nSujet : $sujet";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a bien été envoyé.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }

} else {
    echo "Une erreur est survenue. Veuillez réessayer plus tard.";
}

?>
