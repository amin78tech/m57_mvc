<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-1 fw-bold border-bottom mb-4">
        Sections
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>active</th>
                <th>action</th>
            </tr>
            <?php foreach($sections as $section) { ?>
                <tr>
                    <td>
                        <?php echo $section->id; ?>
                    </td>
                    <td>
                        <?php echo $section->title; ?>
                    </td>
                    <td>
                        <div class="fs-4">
                            <?php if($section->is_active) { ?>
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