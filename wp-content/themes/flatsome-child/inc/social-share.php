<?php
function hrm_social_share( $postid ) {
$share_class = 'hrm-social-share';
?>
<div class="<?php echo $share_class ?>">
	<span class="share-text"><?php _e( 'Chia sẻ ngay với bạn bè!' , 'hrm' );?></span>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1042251142499005";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="button-social-share fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	<div class="button-social-share fb-send" data-href="<?php the_permalink(); ?>"></div>
	<div class="button-social-share tweet"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
	<script src="https://apis.google.com/js/platform.js" async defer>
	  {lang: 'vi'}
	</script>
	<div class="button-social-share google-pl"><div class="g-plusone" data-annotation="none"></div></div>
</div>
<?php
 }
?>
