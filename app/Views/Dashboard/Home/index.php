<?= $this->extend('Dashboard/Layout/main') ?>

<?= $this->section('title') ?>

<?php echo $title ?? ''; ?>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>

<!-- Style da view -->

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <?php echo $this->include('Dashboard/Layout/_sidebar');?>

                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Recently Favorited -->
                    <div class="widget dashboard-container my-adslist">
                        <h3 class="widget-header"><?php echo lang('Ads.title_index');?></h3>


                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Scripts da view -->
<script>
    //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
</script>

<?= $this->endSection() ?>



