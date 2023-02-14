<!-- Modal -->
<div class="modal fade" id="modalAdvert" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo lang('Adverts.title_new')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open(route_to('adverts.create'),['id'=>'adverts-form'],['id'=>''])?>
      <div class="modal-body">
        <div class="form-row">
            <div class="mb-3 form-group col-md-12">
                <label for="title" class="form-label"><?php echo lang('Adverts.label_title');?></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="<?php echo lang('Adverts.label_title');?>">
                <span class="text-danger error-text title"></span>
            </div>
            <div class="mb-3 form-group col-md-3">
                <label for="situation" class="form-label"><?php echo lang('Adverts.label_situation');?></label>
                <div id="boxSituation"></div>
                <span class="text-danger error-text situation"></span>
            </div>
            <div class="mb-3 form-group col-md-6">
                <label for="category_id" class="form-label"><?php echo lang('Adverts.label_category');?></label>
                <div id="boxCategories"></div>
                <span class="text-danger error-text category"></span>
            </div>
            <div class="mb-3 form-group col-md-3">
                <label for="price" class="form-label"><?php echo lang('Adverts.label_price');?></label>
                <input type="text" class="money form-control" id="price" name="price" placeholder="<?php echo lang('Adverts.label_price');?>">
                <span class="text-danger error-text price"></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>