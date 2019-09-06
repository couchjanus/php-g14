<div class="col">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/products/create" class="float-right"><button class="btn btn-primary text-right"><span data-feather="plus"></span> Add New</button></a>
        </div>
        <div class="table-responsive">
            <?php if (count($products)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($products as $product):?>
                    <tr>
                      <td><?php echo $product->id;?></td>
                      <td><?php echo $product->name;?></td>
                      <td><?php echo $product->price;?></td>
                      <td>
                        <button class="btn btn-default"><span data-feather="eye"></span> View</button>
                        <button class="btn btn-primary"><span data-feather="edit"></span> Edit</button>
                        <button class="btn btn-danger"><span data-feather="delete"></span> Delete</button>
                      </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No products yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>