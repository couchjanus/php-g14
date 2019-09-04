<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/orders" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                <label for="name" class="control-label">Имя клиента</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user->first_name.' '.$user->last_name;?>">
                </div>

                <div class="form-group">
                  <label for="status" class="control-label">Статус заказа</label>
                  <select name="status" class="form-control">
                    <?php foreach ([1,2,3,4] as $s): ?>
                      <option value="<?php echo $s;?>" <?php 
                        if($s === $order->status) echo ' selected="selected"';?>>
                          <?php echo Helper::getOrderStatus($s); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Update</button>
                </div>
            </form>
        </div>
    </div>
        
</div>
