    <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> 
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                                </span> 
                        </div>
                        <!-- /input-group -->
                </li>
                    <li class="user-pro">
                    <?php 
                    $key = $this->session->userdata('login_type') . '_id';
                    $image_path = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key). '.jpg';

                    if(!file_exists($image_path)){
                        $image_path = 'uploads/default.jpg';
                    }
                    
                    ?>
                        <a href="#" class="waves-effect"> 
                    
                        <span class="hide-menu">
                        
                    <?php 
                    $account_type   = $this->session->userdata('login_type');
                    $account_id     = $account_type.'_id';
                    $name = $this->crud_model->get_type_name_by_id($account_type, $this->session->userdata($account_id), 'name');
                    echo $name;
                    ?>
                    <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out-off"></i> Logout</a></li>
                        </ul>
                    </li>

                    <li class="<?php if($page_name == 'dashboard') echo 'active';?>"> 
                        <a href="<?php echo base_url();?>patient/dashboard" class="waves-effect">
                            <i class="ti-dashboard p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
                        </a> 
                    </li>
                            
                           <li> 
<!--                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-calendar p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('Manage Appointment');?> <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level"<?php if($page_name == 'add_appointment' || $page_name == 'antrian') echo 'active';?>>

           
                            <li class="<?php if($page_name == 'antrian') echo 'active';?>"> 
                                <a href="<?php echo base_url();?>patient/antrian">
                                    <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('Queue');?></span>
                                </a> 
                            </li>
                            <li class="<?php if($page_name == 'add_appointment') echo 'active';?>"> 
                                <a href="<?php echo base_url();?>patient/add_appointment">
                                    <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('Add Appointment');?></span>
                                </a> 
                            </li>
                            
                    </ul>
                </li>
-->                
               <li class="<?php if($page_name == 'add_appointment') echo 'active';?>"> 
                    <a href="<?php echo base_url();?>patient/add_appointment" class="waves-effect">
                        <i class="fa fa-calendar p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Add Appointment');?></span></a> 
                </li>
                <li class="<?php if($page_name == 'list_appointment') echo 'active';?>"> 
                                <a href="<?php echo base_url();?>patient/list_appointment">
                                    <i class="fa fa-angle-double-right p-r-10"></i>
                                    <span class="hide-menu"><?php echo get_phrase('List Appointment');?></span>
                                </a> 
                            </li>
                
                <li class="<?php if($page_name == 'Queue') echo 'active';?>"> 
                    <a href="<?php echo base_url();?>patient/antrian" class="waves-effect">
                        <i class="fa fa-list-ol p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Queue');?></span></a> 
                </li>
                     
                <li class="<?php if($page_name == 'change_profile') echo 'active';?>"> 
                    <a href="<?php echo base_url();?>patient/change_profile" class="waves-effect">
                        <i class="ti-user p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Update Profile');?></span></a> 
                </li>
            

                <li> 
                    <a href="<?php echo base_url();?>login/logout" class="waves-effect">
                        <i class="fa fa-sign-out p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Logout');?></span></a> 
                </li>
                    
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->