<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-1 fw-bold border-bottom mb-4">
        Admins
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th></th>
                <th>username</th>
                <th>email</th>
                <th>active</th>
                <th>action</th>
            </tr>
            <?php foreach($admins as $admin) { ?>
                <tr>
                    <td>
                        <?php echo $admin->id; ?>
                    </td>
                    <td>
                        <img src="<?php echo !is_null($admin->profile_path) ? App\Core\File::pathToUrl($admin->profile_path) : 'https://retailx.com/wp-content/uploads/2019/12/iStock-476085198-300x300.jpg'; ?>" alt="" width="30" height="30">
                    </td>
                    <td>
                        <?php echo $admin->username; ?>
                    </td>
                    <td>
                        <?php echo $admin->email; ?>
                    </td>
                    <td>
                        <div class="fs-4">
                            <?php if($admin->is_active) { ?>
                                <i class="bi bi-check-circle-fill text-success"></i>
                            <?php } else { ?>
                                <i class="bi bi-x-circle-fill text-danger"></i>
                            <?php } ?>
                        </div>
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