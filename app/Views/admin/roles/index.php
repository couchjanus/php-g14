<div class="col">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/roles/create" class="float-right"><button class="btn btn-primary text-right"><span data-feather="plus"></span> Add New</button></a>
        </div>
        <div class="table-responsive">
            <?php if (count($roles)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($roles as $role):?>
                    <tr>
                      <td><?php echo $role->id;?></td>
                      <td><?php echo $role->name;?></td>
                      <td>
                        <a href="/admin/roles/show/<?=$role->id?>"><button class="btn btn-default"><span data-feather="eye"></span> View</button></a>
                        <a href="/admin/roles/edit/<?=$role->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                        <a href="/admin/roles/delete/<?=$role->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                      </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No roles yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>
