<div class="col">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/categories/create" class="float-right"><button class="btn btn-primary text-right"><span data-feather="plus"></span> Add New</button></a>
        </div>
        <div class="table-responsive">
            <?php if (count($categories)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($categories as $category):?>
                    <tr>
                      <td><?php echo $category->id;?></td>
                      <td><?php echo $category->name;?></td>
                      <td>
                        <a href="/admin/categories/show/<?=$category->id?>"><button class="btn btn-default"><span data-feather="eye"></span> View</button></a>
                        <a href="/admin/categories/edit/<?=$category->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                        <a href="/admin/categories/delete/<?=$category->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                      </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No ctategories yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>