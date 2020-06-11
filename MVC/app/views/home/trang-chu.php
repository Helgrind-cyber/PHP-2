<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello MVC</title>
</head>

<body>
    <table>
        <thead>
            <th>ID</th>
            <th>NAME</th>
        </thead>
        <tbody>
            <?php foreach ($products as $item) : ?>
                <tr>
                    <td><?php echo $item->id ?></td>
                    <td><?php echo $item->name ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
