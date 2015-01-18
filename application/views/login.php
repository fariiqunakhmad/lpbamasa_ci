<!DOCTYPE html>

<html>
 <head>
   <title>Simple Login with CodeIgniter</title>
   <?php include 'clientresource.php'; ?>
 </head>
 <body>
     
     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php
                         $aform = 'method="post" role="form"';
                        echo form_open('verify_login', $aform);
                        ?>
                        <fieldset>
                            <div class="form-group">
                                <?php
                                echo form_input('username',"","class='form-control' placeholder='Username'");
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_password('password',"","class='form-control' placeholder='Password'");
                                ?>
                            </div>
                                <?php 
                                echo form_submit("","Login", "class='btn btn-lg btn-success btn-block'");
                                ?>
                        </fieldset>
                        <?php 
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
</html>