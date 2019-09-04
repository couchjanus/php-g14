<div class="col">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> 
        </div>
        <div class="table-responsive">
            <?php if (count($orders)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($orders as $order):?>
                    <tr>
                        <td><?php echo $order->order_id;?></td>
                        <td><?php echo $order->name?></td>
                        <td><?php echo Helper::getOrderStatus($order->status);?></td>
                        <td>
                            <a href="/admin/orders/show/<?=$order->order_id?>"><button class="btn btn-default"><span data-feather="eye"></span> View</button></a>
                            <a href="/admin/orders/edit/<?=$order->order_id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                            <a href="/admin/orders/delete/<?=$order->order_id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No orders yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>
