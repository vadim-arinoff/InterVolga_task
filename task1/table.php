<?php
$data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
        ];

    $scores = [];

    foreach ($data as $value) {
        if(
            !is_array($value) ||
            count($value) !=3 ||
            !is_string($value[0]) ||
            !is_string($value[1]) ||
            !is_numeric($value[2])
        ) {
            error_log("Invalid data: " . print_r($value, true));
            continue;
        }
        $key = "{$value[0]}_{$value[1]}";
        $scores [$key]['student'] = $value[0];
        $scores [$key]['subject'] = $value[1];
        $scores [$key]['total'] = ($scores [$key]['total'] ?? 0)+ $value[2];
    }

    $student = array_column ($scores, 'student');
    $subject = array_column ($scores, 'subject');
    $totalScores = array_column ($scores, 'total');

    array_multisort($student, SORT_ASC, $subject, SORT_ASC, $totalScores, SORT_DESC);