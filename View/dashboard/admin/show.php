<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-1 fw-bold border-bottom mb-4">
        Admins
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>action</th>
            </tr>
            <?php foreach($admins as $admin) { ?>
                <tr>
                    <td>
                        <?php echo $admin->id; ?>
                    </td>
                    <td>
                        <?php echo $admin->username; ?>
                    </td>
                    <td>
                        <?php echo $admin->email; ?>
                    </td>
                    <td>
                        <i class="bi bi-trash text-danger"></i>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>