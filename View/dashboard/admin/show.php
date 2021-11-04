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
                    <td class="fs-3 d-flex">
                        <div class="me-3">
                            <form action="/admin/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $admin->id; ?>">
                                <button type="submit" class="bg-transparent border-0">
                                    <i class="bi bi-trash text-danger"></i>
                                </button>
                            </form>
                        </div>
                        <div>
                            <form action="/dashboard/admin/edit" method="GET">
                                <input type="hidden" name="id" value="<?php echo $admin->id; ?>">
                                <button type="submit" class="bg-transparent border-0">
                                    <i class="bi bi-pencil text-primary"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>