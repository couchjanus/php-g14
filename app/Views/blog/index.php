<div class="album py-5 bg-light">
    <div class="container">
        <h1><?php echo $title; ?></h1>
    
        <ul class="media-list">
            <?php foreach ($posts as $row):?>

                    <li class="media">
                        <div class="media-body">
                            <span class="text-muted pull-right">
                                <small class="text-muted"><?php echo $row["created_at"]?></small>
                            </span>
                            <strong class="text-success"><?php echo $row["title"]?></strong>
                            <p>
                            <?php echo $row["content"]?>
                            </p>
                        </div>
                    </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
