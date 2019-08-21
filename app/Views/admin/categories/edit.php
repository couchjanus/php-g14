<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/categories" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="categoryHelp" value="<?=$category['name'];?>" required>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <select name="status" class="form-control">
                      <option value="1" <?php if($category['status'] == 1) echo 'selected'?>>Отображать</option>
                      <option value="0" <?php if($category['status'] == 0) echo 'selected'?>>Скрывать</option>
                    </select>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Update</button>
                </div>
            </form>
        </div>
    </div>
        
</div>
