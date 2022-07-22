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
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            ajax: '<?php echo route_to('categories.get.all'); ?>',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'slug'
                },
                {
                    data: 'action'
                },
            ],
        });
    });
</script>


<!-- Scripts da view -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.js"></script>
<?= $this->endSection() ?>