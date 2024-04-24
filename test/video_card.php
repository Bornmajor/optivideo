<div class="card dashboard-video-card" video_id=<?php echo $video_id ?> >
    <img src="https://res.cloudinary.com/dx8t5kvns/image/upload/<?php echo $thumbnail_id; ?>.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text text-truncate"><?php echo $video_title; ?></p>
        <a class="btn btn-primary" href="?page=video_item&video_id=<?php echo $video_id; ?>">Expand</a>

        <div class="btn-group  dropup">
        <!-- <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
        </button> -->
        <span class="menu-dots" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>   
        </span>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="?page=dashboard">Delete</a></li>
        </ul>
        </div>

    </div>
    </div>