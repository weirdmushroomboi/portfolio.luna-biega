<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = htmlspecialchars($_POST["name"]);
  $email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $message = htmlspecialchars($_POST["message"]);

  $to      = "luna.biega974@gmail.com";
  $subject = "Nouveau message de $name depuis le portfolio";
  $body    = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    $success = true;
  } else {
    $error = true;
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact</title>
  <link rel="stylesheet" href="contact-style.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.html">Accueil</a>
      <a href="contact.php" class="active">Contact</a>
    </nav>
  </header>

  <main class="contact-container">
    <h1>Contactez-moi</h1>

    <?php if (!empty($success)): ?>
      <p class="success">Votre message a bien été envoyé. Merci !</p>
    <?php elseif (!empty($error)): ?>
      <p class="error">Une erreur est survenue. Veuillez réessayer.</p>
    <?php endif; ?>

    <form method="POST" action="contact.php">
      <input type="text" name="name" placeholder="Votre nom" required>
      <input type="email" name="email" placeholder="Votre email" required>
      <textarea name="message" placeholder="Votre message" required></textarea>
      <button type="submit">Envoyer</button>
    </form>
  </main>
</body>
</html>
