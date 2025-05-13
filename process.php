<?php 
include("data.php");
$user_choice = $_POST['choice'];
$question_number = (int) $_POST['question_number'];

/** Je crée une fonction pour récupérer la bonne réponse */

$correct_answer = $data[$question_number]['answer'];

/** Je crée une fonction pour vérifier que la réponse de l'utilisateur est correcte */

$is_correct = ($user_choice == $correct_answer);

if ($is_correct) {
    echo "<p>Bonne réponse !</p>";
} else {
    echo "<p>Mauvaise réponse !</p>";
    echo "<p>Le bonne réponse était" . ($correct_answer) . "</p>";
}
