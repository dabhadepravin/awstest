 <ul class="nav navbar-nav pull-right">
      <li><a href="<?php echo site_url()?>" class="selected">Dashboard</a></li>
        <li><a href="#">Campaigns</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Support</a></li>

        <?php
        $uid = $this->session->userdata('advtid');
        //print_r($this->session->all_userdata());
       if(isset($uid) && !empty($uid)){ ?>
        
        <li><a href="<?php echo site_url();?>users/logout">Logout</a></li>
        <?php  } else {?>
        <li><a href="<?php echo site_url();?>users/login">Login</a></li>
        <?php } ?>
      </ul>