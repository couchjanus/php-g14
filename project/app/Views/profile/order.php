<div class="col-10 p-5 mx-auto">
    <div class="row">
        <div class="col-sm-10">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive"
                    src="/assets/images/user.png"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span>
                    Yesterday</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?= $user->email;?></li>

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="#">http://peculiar.my</a></div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                        class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                        class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-9 px-3 py-3">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true"><?=$subtitle?></a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Profile</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Contact</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                        aria-controls="nav-about" aria-selected="false">About</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Дата заказа</th>
                                <th>Статус</th>
                                <th>Товары в заказе</th>
                            </tr>
                        </thead>
                        <tbody class="table-items">
                            <tr>
                                <td><?php echo $order->id?></td>
                                <td><?php echo $order->order_date?></td>
                                <td><?php echo Helper::getOrderStatus($order->status);?></td>
                                <td><?php 
                                $totalValue = 0;
                                foreach ((array)$products as $product) :
                                    echo "<a href=/catalog/".$product['id'].">".$product['name']."</a></br>";
                                    echo "<span>Кол-во: </span>" . $product['amount'].'</br>';
                                    echo '<span>Цена: </span>' . substr($product['price'], 1). ' грн</br>';
                                    echo '<span>Picture: </span><img src="/' . $product['picture']. '"></br>';
                                    //подсчитываем сумму по каждому товару и пишем в массив
                                    $arr[] = substr($product['price'], 1) * $product['amount'];

                                    //считаем общую сумму всех товаров в заказе, с учетом их кол-ва
                                    $totalValue = array_sum($arr);
                                            
                                endforeach; 
                                ?>
                                </td>
                            </tr>
                                
                            <tr class="total_price">
                                <td colspan="4"><?php echo '<span>Сумма заказа: ' . $totalValue.' грн</span>';?></td>
                            </tr>
                            <?php
                                //Очищаем массив
                                $arr = array();
                            ?>
                        </tbody>
                    </table>
                    </div>

                    <div class="show-more">
                        <a href="#">Show More</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                    veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                    Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim
                    non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor
                    ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.
                    Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                    veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                    Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim
                    non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor
                    ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.
                    Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade px-3" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<!--/row-->
