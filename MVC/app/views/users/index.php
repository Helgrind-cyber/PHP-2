<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <div class="breacumb">
        <nav>
            <ul>
                <li><a href="<?=BASE_URL?>">Home</a></li>
                <li><a href="<?=BASE_URL . 'chi-tiet-san-pham'?>">Product</a></li>
            </ul>
        </nav>
    </div>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th><a href="">Them</a></th>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->id?></td>
                    <td><?php echo $user->name?></td>
                    <td><?php echo $user->email?></td>
                    <td><?php echo $user->phone?></td>
                    <td>
                        <a href="">Sua</a>
                        <a href="">Xoa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
