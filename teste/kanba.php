<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="processtasks.php" method="POST">
        <input name="task_title" type="text">
        <textarea name="task_desc" id="" cols="30" rows="10"></textarea>
        <input type="date" name="task_time" id="">
        <select name="priority" id="">
            <option value="alta">Alta</option>
            <option value="media">Média</option>
            <option value="baixa">Baixa</option>
        </select>
        <select name="task_type" id="">
            <option value="story">Story</option>
            <option value="bug">Bug</option>
            <option value="task">Task</option>
            <option value="spike">Spike</option>
        </select>
        <input type="submit">
    </form>
</body>
</html>