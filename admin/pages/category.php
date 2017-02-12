<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/category.model.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/nav-bar.php');

$category = new Models\CategoryModel();
$rs =  $category->getCategories();

$error_messages = [
    'categoryName' => 'Category name can not be blank',
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
        
        foreach($_POST as $postColumnNames=>$postValues) {
            if($_POST[$postColumnNames] != ""){
                $_postValues[$postColumnNames] = $_POST[$postColumnNames];
            }
        }

            $category->insertCategories($_postValues);
    }
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" id="registration" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" type="text" name="categoryName" placeholder="Enter your category name here" tabindex="1">
                                            <?php echo (isset($message['categoryName']))?$message['categoryName']:"" ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Parent</label>
                                            <select class="form-control" name="categoryId" id="categoryId" tabindex="6">
                                                <?php
                                                    while($row = $rs->fetch_assoc()) {
                                                        echo "<option value='" .$row['categoryId']. "'>" . $row['categoryName'] . "</option>";
                                                        $categoryName = $row['categoryName'];
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="btn-submit" id="registration-submit">Submit Button</button>
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
