 <ul class="nav navbar-nav pull-right">
      <li><a href="<?php echo site_url()?>" class="selected">Home</a></li>
        <li><a href="#">Rules</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>

        <?php
        $uid = $this->session->userdata('advtid');
        //print_r($this->session->all_userdata());
       if(isset($uid) && !empty($uid)){ ?>
        
        <li><a href="<?php echo site_url();?>users/logout">Logout</a></li>
        <?php  } else {?>
        <li><a href="<?php echo site_url();?>users/login">Login</a></li>
        <?php } ?>
      </ul>