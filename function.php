<?php

/** je créée une fonction qui permet de calculer le nombre de point */

function answerCount(): int {
    if (!isset($_SESSION['results'])) {
        return 0;
    }
    $score = 0;

    foreach ($_SESSION['results'] as $result) {
        if ($result == "correct") {
            $score + 1;
        }
    }

return $score;
}