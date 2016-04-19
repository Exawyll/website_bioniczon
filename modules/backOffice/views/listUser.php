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
                        <form method="post">
                        <input name="idUser" type="hidden" value="<?php echo $user['id']; ?>">
                        <button id="admin" type="submit" onclick="UpdateRecord(<?php echo $user['id']; ?>)">
                            <?php if($user['admin']) {
                                echo 'admin';
                            } else {
                                echo 'not admin';
                            }; ?>
                        </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>



    </table>
</div>