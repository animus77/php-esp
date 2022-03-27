<?php
include '../../vendor/autoload.php';
include '../../includes/database.php';

use App\Models\Data;

$datas = Data::all();

$total_bottle = $datas->sum('info');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>
<body>
    <main>
        <p>Pagina para ver informacion de consumo de clientes</p>
        <section>
            <form action="" method="post">
                <label for="">Ingese fecha</label>
                <input type="date">
            </form>
        </section>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Envases vacios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($datas as $data){
                        echo "<tr>";
                        echo "<td class='text-center'>$data->date</td>";
                        echo "<td class='text-center'>$data->user_id</td>";
                        echo "<td class='text-center'>$data->info</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
            <?php echo $total_bottle;?>
        </section>
    </main>
    
</body>
</html>