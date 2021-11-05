<?php $layout = 'dashboard'; ?>

<div class="p-5">
    <div class="fs-2 fw-bold border-bottom">
        Edit Clinic
    </div>
    <div class="mt-4">
        <form action="/clinic/update" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $phone;?>">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address" value="<?php echo $address;?>">
            </div>

            <div class="mb-3">
              <label for="sections" class="form-label">Select the sections</label>
              <select name="sections[]" class="form-select" id="sections" size="3" multiple aria-label="multiple select example">
                <?php foreach($sections as $section) { ?>
                  <option value="<?php echo $section->id;?>" <?php echo in_array($section->id, $selectedSections) ? 'selected' : '';?> ><?php echo $section->title; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" <?php echo $isActive ? 'checked' : ''; ?> name="isActive" class="form-check-input" id="active">
              <label class="form-check-label" for="active">Is active?</label>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" <?php echo $isFullTime ? 'checked' : ''; ?> name="isFullTime" class="form-check-input" id="isFullTime">
              <label class="form-check-label" for="isFullTime">Is full-time?</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>