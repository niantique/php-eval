<?php 
include("data.php");
$user_choice = $_POST['choice'];
$question_number = (int) $_POST['question_number'];

/** Je crée une fonction pour récupérer la bonne réponse */

$correct_answer = $data[$question_number]['answer'];

/** Je crée une fonction pour vérifier que la réponse de l'utilisateur est correcte */

$is_correct = ($user_choice == $correct_answer);

// Redirige l'utilisateur vers question.php avec un message indiquant si la réponse est correcte ou non
header("Location: question.php?n=$question_number&result=" . ($is_correct ? 'correct' : 'incorrect') . "&correct_answer=" . urlencode($correct_answer));
exit();
?>
