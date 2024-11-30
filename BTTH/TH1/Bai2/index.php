<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập trắc nghiệm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Bài tập trắc nghiệm</h1>
    <form action="submit.php" method="POST">
        <?php
        
        $filename = "questions.txt";
        if (!file_exists($filename))
         {
            echo "<p class='text-danger'>Tệp câu hỏi không tồn tại.</p>";
            exit;}

        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $current_question = [];
        $question_number= 0;
        foreach ($questions  as $line) {
            if (strpos ($line , "Câu") === 0) { 
                if (!empty($current_question)) {
                    $question_number++;
                    echo  "<div class='card mb-4'>";
                    echo "<div class='card-header'> <strong>{$current_question[0]}</strong></div>";
                    echo "<div class='card-body'>";
                    for ($i = 1; $i <= 4; $i++) {

                    $answer = substr($current_question[$i], 0, 1); 
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answer}' id='question{$question_number}{$answer}'>";
                        echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$current_question[$i]}</label>";
                        echo "</div>";
                    }
                    echo "</div></div>";
                }
                $current_question = [];
            }
            $current_question[] = $line; 
        }
        if (!empty($current_question)) {
            $question_number++;
            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
            echo "<div class='card-body'>";

            for ($i = 1; $i <= 4; $i++) {
                $answer = substr($current_question[$i], 0, 1); 
                echo "<div class='form-check'>";


                echo "<input class='form-check-input' type='radio' name='question{$question_number
                }' value='{$answer}' id='question{$question_number}{$answer}'>";
                echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$current_question[$i]}</label>";
                echo "</div>";
            }
            echo "</div></div>";
        }
        ?>

        <button type="submit" class="btn btn-primary mt-3">Nộp bài</button>
    </form>


    
</div>
</body>
</html>
