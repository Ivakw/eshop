<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/user.model.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/nav-bar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

$user = new Models\UserModel();

$error_messages = [
    'sku' => 'SKU can not be blank',
    'productName' => 'Product Name can not be blank',
    'price' => 'Price can not be blank',
    'stock' => 'Stock can not be blank',
    'reorderLevel' => 'Re-order Level can not be blank'
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
                                            <label>SKU</label>
                                            <input class="form-control" type="text" name="sku" placeholder="Enter your sku here" tabindex="1">
                                            <?php echo (isset($message['sku']))?$message['sku']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" type="text" name="productName" placeholder="Enter your product name here" tabindex="2">
                                            <?php echo (isset($message['productName']))?$message['productName']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" type="text" name="price" placeholder="Enter your price here" tabindex="3">
                                            <?php echo (isset($message['price']))?$message['price']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input class="form-control" type="text" name="stock" placeholder="Enter your stock here" tabindex="4">
                                            <?php echo (isset($message['stock']))?$message['stock']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Re-order Level</label>
                                            <input class="form-control" type="text" name="reorderLevel" placeholder="Enter your re-order level" tabindex="5">
                                            <?php echo (isset($message['reorderLevel']))?$message['reorderLevel']:"" ?>
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
