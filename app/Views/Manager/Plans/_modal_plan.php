<!-- Modal -->
<div class="modal fade" id="modalPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Plans.title_new'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php echo form_open(route_to('plans.create'), ['id' => 'plans-form'], ['id' => '']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="mb-3">
            <label for="name" class="form-label"><?php echo lang('Plans.label_name'); ?></label>
            <input type="text" class="form-control" id="name" name="name">
            <span class="text-danger error-text name"></span>
          </div>
          <div class="mb-3">
            <label for="recorrence" class="form-label"><?php echo lang('Plans.label_recorrence'); ?></label>
            <!-- Será preenchido pelo javascript -->
            <span id="boxRecorrences"></span>
            <span class="text-danger error-text recorrence"></span>
          </div>
          <div class="mb-3">
            <label for="value" class="form-label"><?php echo lang('Plans.label_value'); ?></label>
            <input type="text" class="money form-control" id="value" name="value">
            <span class="text-danger error-text value"></span>
          </div>
          <div class="mb-3">
            <label for="adverts" class="form-label"><?php echo lang('Plans.label_adverts'); ?></label>
            <input type="text" class="form-control" id="adverts" name="adverts">
            <small><?php echo lang('Plans.text_info_adverts'); ?></small>
            <span class="text-danger error-text adverts"></span>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label"><?php echo lang('Plans.label_description'); ?></label>
            <textarea class="form-control" name="description" rows="3"  placeholder="<?php echo lang('Plans.label_description'); ?>"></textarea>
            <span class="text-danger error-text description"></span>
          </div>
        </div>
        <div class="form-check form-switch">
          <?php echo form_hidden('is_highlighted',0);?>
          <input type="checkbox" name="is_highlighted" class="form-check-input" id="is_highlighted">
          <label for="description" class="form-check-label"><?php echo lang('Plans.label_is_highlighted'); ?></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><?php echo lang('App.btn_cancel'); ?></button>
        <button type="submit" class="btn btn-primary btn-sm"><?php echo lang('App.btn_save'); ?></button>
      </div>
      <?php form_close(); ?>
    </div>
  </div>
</div>