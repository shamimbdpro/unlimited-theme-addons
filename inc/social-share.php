<?php 

function cpthelper_social_share() {?>

	<div class="social-share">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i>Facebook</a></li>
            <li class="list-inline-item"><a href="https://twitter.com/home?status=<?php the_permalink() ?>"><i class="fa fa-twitter"></i>Twitter</a></li>
            <li class="list-inline-item"><a href="https://plus.google.com/share?url=<?php the_permalink() ?>"><i class="fa fa-google-plus"></i>Google</a></li>
            <li class="list-inline-item"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
        </ul>
    </div>
    
	<?php
}