<?php
include "config.php";
session_start();
$html.="<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='left'><a href='index2.php' class='back link' data-force='true'> <i class='icon icon-home-white'></i></a></div>
    <div class='center sliding'>Request</div>
    <div class='right'>
      <a href='#' data-panel='right' class='item-link item-content open-panel'> <i class='icon icon-bars color-white'></i></a>
    </div>
  </div>
</div>
<div class='pages'>
  <!-- Page, data-page contains page name-->
  <div data-page='blog' class='page no-toolbar'>
    <!-- Scrollable page content-->

    <div class='page-content'>
    <div class='content-block-title'><a href='newmessage.php'>New</a></div>
		<div id='blog-page'>";
		 $login=mysql_query("SELECT p.*,l.fullname FROM sky_messageadmin p
		 	left outer join sky_loginmanager l on l.loginid = p.useradd

                                         WHERE p.locationid='".$_SESSION['locationid']."' order by messagedate DESC");

while($r=mysql_fetch_array($login))

{
			$html.="<div class='card post-card'>
			  <div class='card-header'>
				<div class='post-avatar'><img src='images/photos/avatar.jpg' width='34' height='34'></div>
				<div class='post-name'>".$r['fullname']."</div>
				<div class='post-date'>".$r['messagedate']."</div>
			  </div>
			  <div class='card-content'>
				<div class='card-content-inner'>
				  <h4 class='title-post'><a href='single.php'>".$r['title']."</a></h4>
				  <img src='images/pesan/".$r['messagepic']."' width='100%' class='img'>
				  <p>".$r['message']."</p>
				  <p class='color-gray infos'>Likes: 0  -  Comments: 0</p>
				</div> 
			  </div>
			  <div class='card-footer no-border'>
				<a href='like.php' class='link'>Like</a>
				<a href='comment.php' class='link'>Comment</a>
				<a href='share.php' class='link'>Share</a>
			  </div>
			</div>";
}
			
			
		$html.="</div>
		<div class='content-block'>
			<a href='#' class='button button-fill color-blue' id='loadmore'>Load more</a>
		</div>
	  
    </div>
  </div>
</div>";

echo $html;
?>