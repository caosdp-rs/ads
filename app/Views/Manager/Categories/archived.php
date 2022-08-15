<?= $this->extend('Manager/Layout/main') ?>
<?= $this->section('title') ?>
<?php echo $title ?? ''; ?>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- Style da view -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Conteúdos da view -->
<div class="container-fluid">

    <div class="row pt-2">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5><?php echo $title ?? ''; ?></h5>
                </div>
                <div class="card-body">
                    <a class="btn btn-primary btn-sm mt-2 mb-4" href="<?php echo route_to('categories'); ?>"><?php echo lang('App.btn_back'); ?></a>
                    <table class="table table-borderless table-striped" id="dataTable">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col"><?php echo lang('Categories.label_name'); ?></th>
                                <th scope="col"><?php echo lang('Categories.label_slug'); ?></th>
                                <th scope="col"><?php echo lang('App.btn_actions'); ?></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button>



<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<!-- Scripts da view -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php echo $this->include('Manager/Categories/Scripts/_datatable_all_archived'); ?>
<?php echo $this->include('Manager/Categories/Scripts/_recover_category'); ?>
<?php echo $this->include('Manager/Categories/Scripts/_delete_category'); ?>


<script>
    function refreshCSRFToken(token) {
        $('[name="<?php echo csrf_token() ?>"]').val(token);
        $('meta[name="<?php echo csrf_token() ?>"]').attr('content', token);
    }
</script>
<?= $this->endSection() ?>