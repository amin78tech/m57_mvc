<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-2 fw-bold border-bottom">
        Create Clinic
    </div>
    <div class="mt-4">
        <form action="/clinic/store" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="isActive" class="form-check-input" id="active">
              <label class="form-check-label" for="active">Is active?</label>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="isFullTime" class="form-check-input" id="isFullTime">
              <label class="form-check-label" for="isFullTime">Is full-time?</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>