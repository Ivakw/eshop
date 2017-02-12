<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/user.model.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/nav-bar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

$user = new Models\UserModel();

$error_messages = [
    'userName' => 'User name can not be blank',
    'email' => 'Email can not be blank',
    'firstName' => 'First name can not be blank',
    'lastName' => 'Last name can not be blank',
    'password' => 'Password can not be blank'
];

if(isset($_POST['btn-submit'])){
    $message = [];
    foreach($error_messages as $error_key=>$error_value) {
        
        if(isset($_POST[$error_key]) && $_POST[$error_key] == '') {
            $message[$error_key] = $error_messages[$error_key];
        }
    }
    
    if(empty($message)) {
        $_postValues = [];

        foreach($_POST as $postColumnNames=>$postValues){
            if($_POST[$postColumnNames] != "") {
                $_postValues[$postColumnNames] = $_POST[$postColumnNames];
            }
        } 
        $createUsers = $user->createUser($_postValues);
//        if($createUsers > 0){
//            echo "User added sucessfully";
//        }
//        else {
//            echo "User didn't created..";
//        }
    }
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" id="registration" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" type="text" name="userName" placeholder="Enter your user name here" tabindex="1">
                                            <?php echo (isset($message['userName']))?$message['userName']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter your e-mail here" tabindex="2">
                                            <?php echo (isset($message['email']))?$message['email']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input class="form-control" type="text" name="firstName" placeholder="Enter your first name here" tabindex="3">
                                            <?php echo (isset($message['firstName']))?$message['firstName']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input class="form-control" type="text" name="lastName" placeholder="Enter your last name here" tabindex="4">
                                            <?php echo (isset($message['lastName']))?$message['lastName']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" type="password" tabindex="5">
                                            <?php echo (isset($message['password']))?$message['password']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" selected="selected" name="role" tabindex="6">
                                                <option value="user">user</option>
                                                <option value="customer">customer</option>
                                                <option value="admin">admin</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="btn-submit" id="registration-submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                             </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
