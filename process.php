<?php 
session_start();
include("data.php");
$user_choice = $_POST['choice'];
$question_number = (int) $_POST['question_number'];

/** Je crée une variable pour récupérer la bonne réponse */

$correct_answer = $data[$question_number]['answer'];

/** Je crée une variable pour vérifier que la réponse de l'utilisateur est correcte */

$is_correct = ($user_choice == $correct_answer);

/** Je retourne à question.php et vérifie que la réponse est correcte*/
header("Location: question.php?n=$question_number&result=" . ($is_correct ? 'correct' : 'incorrect') . "&correct_answer=" . urlencode($correct_answer));

if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($number <= $total)):
    // ...
endif;
exit();
?>
