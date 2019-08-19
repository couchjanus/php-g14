<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/products" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name" class="control-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Product Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
                </div>
                <div class="form-group">
                    <label for="category" class="control-label">Product Category</label>
                    <select class="form-control" id="category" name="category_id">
                            <?php if (is_array($categories)) : ?>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>">
                                <?php echo $category->name; ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand" class="control-label">Product Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Product brand">
                </div>

                <div class="form-group">
                    <label class="control-label" for="description">Product Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Product Description">
                </div>


                <div class="form-group">
                    <label for="is_new" class="control-label">Is New</label>
                    <select name="is_new" class="form-control">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" selected>Отображается</option>
                        <option value="0">Скрыт</option>
                    </select>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Save</button>
                </div>
            </form>
        </div>
    </div>
        
</div>

