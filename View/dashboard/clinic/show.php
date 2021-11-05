<?php $layout = 'dashboard'; ?>

<!-- TODO5 : namayesh sections hay har clinic (harjor salah donestid. age khastid ye page jadid besazid) -->

<div class="p-5">
    <div class="fs-1 fw-bold border-bottom mb-4">
        Clinics
    </div>
    <div>
        <table class="table table-striped text-center">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>address</th>
                <th>phone</th>
                <th>active</th>
                <th>fulltime</th>
                <th>actions</th>
            </tr>
            <?php foreach($clinics as $clinic) { ?>
                <tr>
                    <td>
                        <?php echo $clinic->id; ?>
                    </td>
                    <td>
                        <?php echo $clinic->name; ?>
                    </td>
                    <td>
                        <?php echo $clinic->address; ?>
                    </td>
                    <td>
                        <?php echo $clinic->phone; ?>
                    </td>
                    <td>
                        <div class="fs-4">
                            <?php if($clinic->is_active) { ?>
                                <i class="bi bi-check-circle-fill text-success"></i>
                            <?php } else { ?>
                                <i class="bi bi-x-circle-fill text-danger"></i>
                            <?php } ?>
                        </div>
                    </td>
                    <td>
                        <div class="fs-4">
                            <?php if($clinic->is_full_time) { ?>
                                <i class="bi bi-check-circle-fill text-success"></i>
                            <?php } else { ?>
                                <i class="bi bi-x-circle-fill text-danger"></i>
                            <?php } ?>
                        </div>
                    </td>
                    <td class="fs-3">
                        <div class="d-flex justify-content-center">
                            <div class="me-3">
                                <form action="/clinic/delete" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $clinic->id; ?>">
                                    <button type="submit" class="bg-transparent border-0">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                            <div>
                                <form action="/dashboard/clinic/edit" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $clinic->id; ?>">
                                    <button type="submit" class="bg-transparent border-0">
                                        <i class="bi bi-pencil text-primary"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>