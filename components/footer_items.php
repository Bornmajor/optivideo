<div class="footer">
    
<?php
if(isset($_SESSION['usr_id'])){
?>
<div class="sitemap">
<a href="?page=dashboard">Dashboard</a>
<a href="?page=users_videos&user=<?php echo $_SESSION['usr_id'] ?>">My clips</a>
</div>
<?php
}
?>


<div class="sitemap">
<a href="?page=login">Login</a>
<a href="?page=registration">Registration</a>
<a href="?page=support">Support</a>
</div>

<div class="sitemap">
<a href="?page=docs">Docs</a>
<a href="?page=demo">Demo</a>
<a href="?page=demo">Players</a>
</div>  

<div class="sitemap">
<a href="mailto:osbornmaja@gmail.com">osbornmaja@gmail.com</a>
<a href="tel:0726710303">+254 726 710 303</a>

</div>  

</div>


<div class="copyrights">
© 2024 | All rights reserved
</div>