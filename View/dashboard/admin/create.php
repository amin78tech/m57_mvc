<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-2 fw-bold border-bottom">
        Create Admin
    </div>
    <div class="mt-4">
        <form action="/admin/store" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone number</label>
              <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="profile" class="form-label">Select a profile photo (optianal)</label>
              <input type="file" name="profile" id="profile" class="form-control">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="isActive" class="form-check-input" id="active">
              <label class="form-check-label" for="active">Is active?</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>