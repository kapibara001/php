<?php // upload php
echo <<<END
    <html>
    <head>
    <title>
        PHP-форма для загрузки файлов на сервер
    </title>
    </head>
    <body>
        <form method='post' action='upload.php' enctype='multipart/form-data'> 
            Выберите файл:
            <input type='file' name='filename' size ='10'>
            <input type='submit' value='Загрузить'>
        </form>
    END;
/*
    if($_FILES) {
        $name = $_FILES["filename"]["name"]; // Присвоение значение имени файла Сюда (_FILES) помещаются все загружаемые на сервер файлы
        move_uploaded_file($_FILES["filename"]["tmp_name"], $name); // Загрузка из тега с именем 'filename' в перменую $name. Теперь там и имя, и сам файл
        echo "Загружено  изображение '$name' <br><img src='$name'>"; 
    } else {
        echo "Изображение не загружено";
    }
*/

    if ($_FILES) {
        $name = $_FILES["filename"]["name"];
        $tp = "";
        switch ($_FILES["filename"]["type"]) {
            case "image/jpeg": $tp = "jpg"; break;
            case "image/gif": $tp = "gif"; break;
            case "image/png": $tp = "png"; break;
            case "image/tiff": $tp = "tif"; break;
            default: $tp = " "; break;
        } 

        if ($tp && $tp != " ") {
            $n = "image.$tp";
            $size = round($_FILES["filename"]["size"]/1024, 2);
            move_uploaded_file($_FILES["filename"]["tmp_name"], $n); // _FILES[][] Автоматически удалится после перемещения файла в постоянное место хранения
            echo "Загружено изображение $name. Тип: $tp. Размер: $size Мбайт<br>" . "<img src='$n'>";
        }
        else if ($tp) {
            echo "Неприемлимый файл(тип файла). ";
        }
    } else {
        echo "Загрузки не произошло.";
    }
    echo "</body></html>";


?>