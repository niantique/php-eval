<?php include "data.php"; ?>
<?php session_start(); ?>
<?php

/** J'ai créé une fonction qui permet de récupérer le numéro de la question */

$number = isset($_GET['n']) ? (int) $_GET['n'] : 1;

/** J'ai créé une fonction qui permet d'obtenir le nombre total de questions */

$total = count($data);

/** J'ai créé une fonction qui récupère la question */

$question = isset($data[$number]) ? $data[$number]['question'] : 'pas de question correspondante au numéro';

/** J'ai créé une fonction qui permet d'obtenir les réponses possibles */

$answer = isset($data[$number]) ? $data[$number]['choice'] : [];

/** J'ai crée une fonction qui permet de récupérer la bonne réponse */
$correct_answer = isset($data[$number]) ? $data[$number]['answer'] : '';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Pingouin Quiz</title>
</head>
<body>

<h2>Question <?php echo $number; ?> sur <?php echo $total; ?></h2>

<p><?php echo $question; ?></p>

<form method="post" action="process.php">
            <?php foreach ($answer as $index => $choice) : ?>
                <div>
                    <label>
                        <input type="radio" name="choice" value="<?php echo $choice; ?>" required>
                        <?php echo htmlspecialchars($choice); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        <button type="submit">Valider</button>
</form>

<?php if ($number < $total) : ?>
    <p><a href="question.php?n=<?php echo $number + 1; ?>">Question suivante</a></p>
<?php else : ?>
    <p><a href="index.php">Retourner à la page d'accueil</a></p>
<?php endif; ?>

</body>
</html>