<?php include 'inc/header.php'; ?>
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Category</div>
        <div class="card-body">
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input class="form-control" type="text"  name="cat_name" placeholder="Category name goes here." value="" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Order rank</label>
                    <input class="form-control" type="text"  name="ordering" placeholder="Ordering value." value="" required>
                </div>
                <button class="btn btn-primary btn-block" name="add_category">Add</button>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ref No#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php   
                            $result = $category->getList();
                            if(!empty($result)){
                                foreach($result as $_result){
                       ?>
                        <tr <?php echo( isset($_GET['cid']) && $_GET['cid'] == $_result['id']) ? 'style="background: #f0ffe5;"' : '' ?>>
                            <td width="10%" align="center"><?php echo $_result['ordering']; ?></td>
                            <td width="70%"><?php echo $_result['cat_name']; ?></td>
                            <td width="15%" align="center"><a onclick="return confirm('Are you sure you want to delete?')" href="category.php?ref=category&del=1&id=<?php echo $_result['id'];?>"><span style="color:red">&#x2717;</span></a></td>
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