<?php include 'inc/header.php'; ?>
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card mb-3">
        <?php 
            if(isset($_GET['category']) && $_GET['category'] != ''):
                $category->_id = $_GET['category'];
                $categoryObj = $category->getOneCategory();
            endif;
        ?>
        <div class="card-header"><i class="fa fa-table"></i> Products <?php echo(isset($categoryObj)) ? '- '.$categoryObj [0]['cat_name'] : '' ?></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php   
                            if(isset($categoryObj)):
                                $product->_category_id = $_GET['category'];
                                $result = $product->readByCategory();
                            else:
                                $result = $product->read();
                            endif;
                            if(!empty($result)){
                                foreach($result as $_result){
                       ?>
                        <tr <?php echo( isset($_GET['iid']) && $_GET['iid'] == $_result['id']) ? 'style="background: #f0ffe5;"' : '' ?>>
                            <td width="25%"><?php echo $_result['name']; ?></td>
                            <td width="50%"><?php echo $_result['description']; ?></td>
                            <td width="10%"><?php echo $_result['price']; ?></td>
                            <td width="5%"><img src="../images/<?php echo $_result['main_image']; ?>" class="img-fluid rounded-circle"></td>
                            <td width="5%"><a href="edit-product.php?id=<?php echo $_result['id']; ?>">EDIT</a></td>
                            <td width="5%" align="center"><a onclick="return confirm('Are you sure you want to delete?')" href="products.php?ref=products&del=1&id=<?php echo $_result['id'];?>"><span style="color:red">&#x2717;</span></a></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>