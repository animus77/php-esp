
<?php
require '../../vendor/autoload.php';
require '../../includes/database.php';

use App\Models\User;
use App\Models\Data;

$users = User::all();
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $date = $_POST['date'];
    $user_id = intval($_POST['user_id']);
    $esp_id = intval($_POST['esp_id']);
    $info = intval($_POST['info']);

    if (empty($date)) {
        $errors[] = 'Fecha no puede estar vacio';
    }

    if ($user_id == 0 ) {
        $errors[] = 'user_id debe ser un numero';
    }

    if ($esp_id == 0 ) {
        $errors[] = 'esp_id debe ser un numero';
    }

    if ($info == 0 ) {
        $errors[] = 'info debe ser un numero';
    }

    if(empty($errors)){
        $save = Data::create([
            'date' => $_POST['date'],
            'user_id' => $_POST['user_id'],
            'esp_id' => $_POST['esp_id'],
            'info' => $_POST['info'],
        ]);
    
        if($save){
            echo "guardado";
        }
    }

}

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
        <?php
            foreach($errors as $error){
                echo "<ol>";
                echo "<li class='text-sm'>$error</li>";
                echo "</ol>";
            }
        ?>
        <p class="text-center">Pagina crear datos</p>
        
        <section class="w-80" class="p-4 bg-red-200">
            <form action="" method="post">
                <div class="flex m-2 p-2 bg-blue-200">
                    <label for="">Fecha</label>
                    <input type="date" name="date">
                </div>
                <div class="flex m-2 p-2 bg-blue-200">
                    <label for="">Cliente</label>
                    <input list="users" min="1" name="user_id">
                </div>
                <div class="flex m-2 p-2 bg-red-200">
                    <label for="">ESP id</label>
                    <input type="number" name="esp_id">
    
                </div>
                <div class="flex m-2 p-2 bg-red-200">
                    <label for="">Datos</label>
                    <input type="number" name="info">
                </div>
                <input type="submit" value="Guardar">
            </form>
        
        </section>
        
        <datalist id="users">
            <?php 
            foreach($users as $user){
                echo "<option value='$user->id'>$user->ref</option>";
            }
            ?>
        </datalist>

    </main>
    
</body>
</html>
