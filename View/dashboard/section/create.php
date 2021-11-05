<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-2 fw-bold border-bottom">
        Create Section
    </div>
    <div class="mt-4">
        <form action="/section/store" method="POST">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" name="isActive" class="form-check-input" id="active">
              <label class="form-check-label" for="active">Is active?</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>