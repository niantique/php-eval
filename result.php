<?php 
session_start();
require_once 'function.php';
require_once 'data.php';

$total = count($data);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Pingouin Quiz</title>
</head>
<body>
<img src="/assets/pinguin_gif.gif" alt="des pingouins qui dansent">
<p>C'est la fin du quiz, bravo invocateur</p>
<p>Votre score est de <?php echo answerCount(); ?> / <?php echo $total; ?></p>

<a href="/index.php" class="return">Retourner à la page d'accueil</a>

</body>
</html>