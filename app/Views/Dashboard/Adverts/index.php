<?= $this->extend('Dashboard/Layout/main') ?>

<?= $this->section('title') ?>

<?php echo lang('Adverts.title_index'); ?>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.css" />

<!-- Style da view -->
<style>
    #dataTable_filter .form-control {
        height: 30px !important;
    }

    @media (min-width:1200px) {
        .modal-xl {
            max-width: 1140px
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <?php echo $this->include('Dashboard/Layout/_sidebar'); ?>

            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                    <h3 class="widget-header"><?php echo lang('Adverts.title_index'); ?></h3>

                    <div class="row">


                        <div class="col-md-12">
                            <button type="button" id="createAdvertBtn" class="btn btn-main-sm add-button float-right mb-4"> + <?php echo lang('App.btn_new'); ?></button>
                        </div>
                        <div class="col-md-12">



                            <table class="table table-borderless table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo lang('Adverts.label_image'); ?></th>
                                        <th scope="col" class="none"><?php echo lang('Adverts.label_code'); ?></th>
                                        <th scope="col" class="all"><?php echo lang('Adverts.label_title'); ?></th>
                                        <th scope="col" class="none text-center"><?php echo lang('Adverts.label_category'); ?></th>
                                        <th scope="col"><?php echo lang('Adverts.label_status'); ?></th>
                                        <th scope="col" class="none"><?php echo lang('Adverts.label_address'); ?></th>
                                        <th scope="col" class="all text-center"><?php echo lang('App.btn_actions'); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>



            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>

<?php echo $this->include('Dashboard/Adverts/_modal_advert'); ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Scripts da view -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/rg-1.2.0/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('manager_assets/mask/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('manager_assets/mask/app.js'); ?>"></script>

<?php echo $this->include('Dashboard/Adverts/Scripts/_datatable_all'); ?>
<?php echo $this->include('Dashboard/Adverts/Scripts/_show_modal_to_create'); ?>
<script>
    //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
    function refreshCSRFToken(token) {
        $('[name="<?php echo csrf_token() ?>"]').val(token);
        $('meta[name="<?php echo csrf_token() ?>"]').attr('content', token);
    }
</script>


<?= $this->endSection() ?>