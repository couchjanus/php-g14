<div class="col">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/users/create" class="float-right"><button class="btn btn-primary text-right"><span data-feather="plus"></span> Add New</button></a>
        </div>
        <div class="table-responsive">
            <?php if (count($users)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($users as $user):?>
                    <tr>
                      <td><?php echo $user->id;?></td>
                      <td><?php echo $user->name;?></td>
                      <td>
                        <a href="/admin/users/show/<?=$user->id?>"><button class="btn btn-default"><span data-feather="eye"></span> View</button></a>
                        <a href="/admin/users/edit/<?=$user->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                        <a href="/admin/users/delete/<?=$user->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                      </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No users yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>
