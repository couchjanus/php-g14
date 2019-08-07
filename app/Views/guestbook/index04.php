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
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
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
</div>
