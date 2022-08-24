<!-- Modal -->
<div class="modal fade" id="modalPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo lang('Plans.title_new'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php echo form_open(route_to('categories.create'),['id'=>'categories-form'],['id'=>'']);?>
      <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label"><?php echo lang('Plans.label_name'); ?></label>
            <input type="text" class="form-control" id="name" name="name">
            <span class="text-danger error-text name"></span>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label"><?php echo lang('Plans.label_parent_name'); ?></label>
            <!-- Será preenchido pelo javascript -->
            <span id="boxParents"></span>
            <span class="text-danger error-text parent_id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><?php echo lang('App.btn_cancel'); ?></button>
        <button type="submit" class="btn btn-primary btn-sm"><?php echo lang('App.btn_save'); ?></button>
      </div>
      <?php form_close();?>
    </div>
  </div>
</div>