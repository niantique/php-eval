<?php include "data.php"; ?>
<?php session_start(); ?>
<?php

/** J'ai créé une variable qui permet de récupérer le numéro de la question */

$number = isset($_GET['n']) ? (int) $_GET['n'] : 1;

/** J'ai créé une variable qui permet d'obtenir le nombre total de questions */

$total = count($data);

/** J'ai créé une variable qui récupère la question */

$question = isset($data[$number]) ? $data[$number]['question'] : 'pas de question correspondante au numéro';

/** J'ai créé une variable qui permet d'obtenir les réponses possibles */

$answer = isset($data[$number]) ? $data[$number]['choice'] : [];

/** J'ai crée une variable qui permet de récupérer la bonne réponse */
$correct_answer = isset($data[$number]) ? $data[$number]['answer'] : '';

$result = isset($_GET['result']) ? $_GET['result'] : null;

$answer_given = isset($_GET['correct_answer']) ? $_GET['correct_answer'] : null;

/** j'obtiens le tableau des résultats */
if (!isset($_SESSION['results'])) {
    $_SESSION['results'] = [];
}

/** je stocke le résultat */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['choice'])) {
    $user_answer = $_POST['choice'];
    $correct = ($user_answer === $correct_answer) ? 'correct' : 'incorrect';
    $_SESSION['results'][$number] = $correct;

    header("Location: question.php?n=$number&result=$correct&correct_answer=" . urlencode($correct_answer));

    exit;
}
require __DIR__ . "/function.php";

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



    <form method="post" action="question.php?n=<?php echo $number; ?>">
        <input type="hidden" name="question_number" value="<?php echo $number; ?>">
        <?php foreach ($answer as $index => $choice) : ?>
            <div>
                <label>
                    <input type="radio" name="choice" value="<?php echo $choice; ?>" required>
                    <?php echo htmlspecialchars($choice); ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit">Valider la réponse</button>
    </form>

    <?php if ($result == 'correct') : ?>
        <p>Bien joué !</p>
    <?php elseif ($result == 'incorrect') : ?>
        <p>T'es nul !</p>
        <p>La bonne réponse était: <?php echo ($answer_given); ?></p>
    <?php endif; ?>


    <?php if ($result !== null) : ?>
        <?php if ($number < $total) : ?>
            <p><a href="question.php?n=<?php echo $number + 1; ?>">Question suivante</a></p>
        <?php else : ?>
            <p><a href="result.php">Voir ton super score</a></p>
        <?php endif; ?>
    <?php endif; ?>


</body>

</html>