<h3>All the registered users</h3>

<div style="overflow-x:auto;">
    <table class="table table-striped">

        <thead>
        <tr>
            <th>id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>login</th>
            <th>email</th>
            <th>registerDate</th>
            <th>admin</th>
            <th>delete</th>
        </tr>
        </thead>

        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['firstname']; ?>
                </td>
                <td><?php echo $user['lastname']; ?>
                </td>
                <td>
                    <?php echo $user['login']; ?>
                </td>
                <td>
                    <?php echo $user['email']; ?>
                </td>
                <td>
                    <?php echo $user['registerDate']; ?>
                </td>
                <td>
                    <a href="index.php?module=backOffice&action=listUser&idUser=<?php echo $user['id']; ?>">
                        <button id="admin" type="submit">
                            <?php if ($user['admin']) {
                                echo 'admin';
                            } else {
                                echo 'not admin';
                            }; ?>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="index.php?module=backOffice&action=listUser&idUser=<?php echo $user['id']; ?>&function=remove">
                        <button class="btn btn-danger" id="delete" type="submit">
                            <img src="/ecommerce/images/delete.png" alt="bin" width="50%">
                        </button>
                    </a>
                </td>
            </tr>
        <?php } ?>


    </table>
</div>