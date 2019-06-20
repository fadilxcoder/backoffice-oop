<?php include 'inc/header.php'; ?>
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Edit Product</div>
        <div class="card-body">
           <?php
                $product->_id = $_GET['id'];
                $result = $product->readOne();
            ?>
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input class="form-control" type="text"  name="name" placeholder="Name of the product." value="<?php echo $result[0]['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description of product" style="height:300px;" required><?php echo $result[0]['description'] ?></textarea>
                </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input class="form-control" type="text" name="price" placeholder="Price." value="<?php echo $result[0]['price'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <?php
                        $cat = $category->getList();
                        foreach($cat as $_cat):
                    ?>
                        <option value="<?php echo $_cat['id']?>" <?php echo($_cat['id'] == $result[0]['category_id']) ? 'selected' : '' ?>><?php echo $_cat['cat_name']?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Main Image ( 723px * 747px )</label>
                    <input class="form-control" type="file" name="image"><br>
                    <img src="../images/<?php echo $result[0]['main_image']?>" class="img-fluid" width="25%">
                </div>
                <button class="btn btn-primary btn-block" name="edit_product">Edit</button>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>