<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
        <!-- User Widget -->
        <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
                <img src="<?php echo site_url('web/'); ?>images/user/user-thumb.jpg" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center">Samanta Doe</h5>
            <p>Joined February 06, 2017</p>
            <a href="user-profile.html" class="btn btn-main-sm">Edit Profile</a>
        </div>
        <!-- Dashboard Links -->
        <div class="widget user-dashboard-menu">
            <ul>
                <li class="<?php echo url_is("{$locale}/dashboard") ? 'active' : '';?>">
                    <a href="<?php echo route_to('dashboard');?>"><i class="fa fa-home"></i> 
                    <?php echo lang('App.sidebar.dashboard.dashboard'); ?></a>
                </li>
                <li class="<?php echo url_is("{$locale}/dashboard/adverts/my") ? 'active' : '';?>">
                    <a href="<?php echo route_to('my.adverts');?>"><i class="fa fa-user"></i> 
                    <?php echo lang('App.sidebar.dashboard.my_adverts'); ?></a>
                </li>
                <li><a href=""><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a></li>
                <li><a href=""><i class="fa fa-file-archive-o"></i>Archived Ads <span>12</span></a></li>
                <li><a href=""><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a></li>
                <?php echo form_open('logout');?>
                
                <button type="submit" class="btn btn-default bg-white p-0 py-2 pl-2 text-dark"><i class="fa fa-cog"></i><?php echo lang('App.btn_logout');?></button>
                
                <?php echo form_close();?>

                <li><a href=""><i class="fa fa-power-off"></i>Delete Account</a></li>
            </ul>
        </div>
    </div>
</div>