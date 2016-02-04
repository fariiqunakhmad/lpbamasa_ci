
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
<!--                        <i><img alt="Brand" src="<?php echo base_url(); ?>assets/images/logo.jpg" height="15" width="15"></i>-->
                        <?php echo $username.' sebagai '.$useras['name']; ?> 
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php 
                        if(isset($authority)) {
                            if(count($authority)>1){
                                foreach($authority as $key => $value) {
                                    if($value != $useras['name']){
                        ?>
                        <li><a href="<?php echo base_url(); ?>authentication/change_user_as/<?php echo $key; ?>"><i class="fa fa-exchange fa-fw"></i> <?php echo $value; ?></a></li>
                        <?php 
                                    }
                                }
                                echo '<li class="divider"></li>';    
                            }
                        }
                        if($useras['id']!=4){
                        ?>
                        <li>
                            <a href="<?php echo base_url(); ?>pegawai/profile"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>authentication/logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
