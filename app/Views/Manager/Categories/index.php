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
                    <table class="table table-borderless table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Ações</th>
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

<!-- Modal -->
<div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<!-- Scripts da view -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.js"></script>

<?php echo $this->include('Manager/Categories/Scripts/_datatable_all');?>
<?php echo $this->include('Manager/Categories/Scripts/_get_category_info');?>

<?= $this->endSection() ?>