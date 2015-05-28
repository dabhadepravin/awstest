 <ul class="nav navbar-nav pull-right">
      <li><a href="<?php echo site_url()?>administrator/dashboard" <?php if(isset($sel_tab) && $sel_tab == "dashboard") echo 'class="selected"';?> >Dashboard</a></li>
        <li><a <?php if(isset($sel_tab) && $sel_tab == "reports") echo 'class="selected"';?> href="#">Reports</a></li>
        <li><a <?php if(isset($sel_tab) && $sel_tab == "inventory") echo 'class="selected"';?> href="#">Inventory</a></li>
        <li><a <?php if(isset($sel_tab) && $sel_tab == "settings") echo 'class="selected"';?>  href="<?php echo site_url()?>administrator/settings">Settings</a></li>

        <?php
        $uid = $this->session->userdata('advtid');
        //print_r($this->session->all_userdata());
       if(isset($uid) && !empty($uid)){ ?>
        
        <li><a href="<?php echo site_url();?>users/logout">Logout</a></li>
        <?php  } else {?>
        <li><a href="<?php echo site_url();?>users/login">Login</a></li>
        <?php } ?>
      </ul>