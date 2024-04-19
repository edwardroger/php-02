<?php
    // $boolean = true;
    // if ($boolean) {
    //     echo '<h1>True</h1>';
    // }

    // for ($i=0; $i < 45; $i++) { 
    //     # code...
    // }

    // switch ($variable) {
    //     case 'value':
    //         # code...
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }

    // while ($a <= 10) {
    //     # code...
    // }

    // do {
    //     # code...
    // } while ($a <= 10);

    // Bài tập:
    // 1. in ra màn hình các số chẵn < 20
    // 2. in ra tổng các số lẻ < 10

    echo '<h1> Bài tập 1 </h1>';
    for ($i=0; $i < 20; $i++) { 
        if ($i % 2 == 0) {
            echo $i . '; ';
        }
    }

    echo '<h1> Bài tập 2 </h1>';
    $sum = 0;
    for ($i=0; $i < 10; $i++) { 
        if ($i % 2 != 0) {
            $sum += $i;
        }
    }
    echo 'Tổng là: ' . $sum;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tổng các số lẻ là <?php echo $sum  ?></h1>
    <script>
    
    </script>
</body>
</html>