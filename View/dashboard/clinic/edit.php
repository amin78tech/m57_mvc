<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-2 fw-bold border-bottom">
        Update Admin
    </div>
    <div class="mt-4">
        <form action="/admin/update" method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="<?php echo $username;?>">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="isActive" class="form-check-input" <?php echo $isActive ? 'checked' : ''; ?> id="active">
              <label class="form-check-label" for="active">Is active?</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>