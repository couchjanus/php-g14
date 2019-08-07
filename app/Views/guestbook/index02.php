<h1 class="text-center"><?php echo $title; ?></h1>
<div class="container">
    <div class="row">
    
        <div class="col">
            
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Leave Your Message.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
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
                    <p>1 ave Komariva</p>
                    <p>12300 Kyiv</p>
                    <p>Ukraine</p>
                    <p>Email : <?php echo $address['address']['email'];?></p>
                    <p>Tel. (+044) 1256117</p>
                </div>
            </div>
        </div>
    </div>
</div>
