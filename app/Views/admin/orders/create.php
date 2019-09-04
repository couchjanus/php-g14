<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/users"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" role="form" method="POST">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">User Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email">User Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="User Email">
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">User Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="User password">
      </div>

      <div class="form-group">
        <label class="control-label" for="role">User Role</label>
        <select name="role" class="form-control" id="role">
          <?php if (is_array($roles)) : ?>
            <?php foreach ($roles as $role): ?>
              <option value="<?php echo $role->id; ?>">
                <?php echo $role->name; ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <hr>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button id="save" type="submit" class="save btn btn-primary">Add User</button>
        </div>
      </div>
    </div>
  </form>
</div>