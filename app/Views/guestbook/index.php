<h1 class="text-center"><?php echo $title; ?></h1>
<div class="container">
    <div class="row">
    
        <div class="col">
            
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Leave Your Message.
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <?php foreach ($address as $addr):?>
                        <p><?php echo $addr['street'];?></p>
                        <p><?php echo $addr['city'];?></p>
                        <p><?php echo $addr['country'];?></p>
                        <p>Email : <?php echo $addr['email'];?></p>
                        <p>Tel.: <?php echo $addr['phone'];?></p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card comment-wrapper">
            <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Comments
            </div>
            <div class="card-body">
            
            <?php if (count($comments)>0):
                printf("<h3>В Guest Book находится %d Comments</h3>", count($comments));?>
                <ul class="media-list">
                  <?php foreach ($comments as $row):?>

                    <li class="media">
                        <a href="#" class="pull-left">
                            <img src="/assets/images/user.png" alt="" class="img-circle">
                        </a>
                        <div class="media-body">
                            <span class="text-muted pull-right">
                                <small class="text-muted"><?php echo $row["created_at"]?></small>
                            </span>
                            <strong class="text-success"><?php echo $row["username"]?></strong>
                            <p>
                            <?php echo $row["message"]?>
                            </p>
                        </div>
                    </li>
                  <?php endforeach;?>
                </ul>
            <?php else: echo "<h2>No comments yet.... </h2>";
            endif;?>
            </div>
        </div>
    </div>    
</div>
