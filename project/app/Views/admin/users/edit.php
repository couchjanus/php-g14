<div class="col">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/users" class="float-right"><button
                    class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go
                    Back</button></a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">User Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>">
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">User Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>">
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">User Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="<?= $user['password']?>">
                </div>

                <div class="form-group">
                    <label class="control-label" for="role_id">User Role</label>
                    <select name="role_id" class="form-control" id="role">
                        <?php if (is_array($roles)) : ?>
                        <?php foreach ($roles as $role): ?>
                        <option value="<?php echo $role->id;?>" <?php 
              if($role->id === $user['role_id'])echo ' selected="selected"';?>>
                            <?php echo $role->name; ?>
                        </option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="status">User Status</label>
                    <input class="form-control" type="checkbox" name="status"
                        <?php if ($user['status'] == 1) echo ' checked'; ?>>
                </div>
                <hr>
                <div class="form-group">
                    <div class="mx-auto">
                        <button id="save" type="submit" class="save btn btn-primary">Update User</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

</div>