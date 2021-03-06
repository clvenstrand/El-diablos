<?php
session_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
		include_once ('includes/head.php');
        include('includes/classes/playlist.php');
        $pList = new Playlist();
        if(isset($_GET['sortMode'])){
            $sortMode = $_GET['sortMode'];
        }else{
            $sortMode = 'artist';

        }
        if(isset($_POST['select'])){
            $_GET['plist'] = $_POST['select'];

        }
        if(isset($_GET['plist'])){
            $plistChosen = 1;
            $playlistId = $_GET['plist'];
						$pList->plistidfix($playlistId);
        }else{
            $plistChosen = 0;
        }

	?>
</head>
<body>

	<div id="container">
		<?php
        
            include_once ('includes/header.php');     
        ?>
    
        <div class="main" role="main">
        	<h2 style="text-align:center">My Playlists</h2>
            
            <div class="size">
                <form id="addlist" action="includes/userActions/createPlaylist.php" method="post">
                    <input id="addplist" type="text" name="playlistname" placeholder="Add a Playlist" class="field" style="margin-bottom:5px;" />
                </form>
            </div>

            <form id="chooseplist" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						
			<div class="size">
                <input id="lolboll" type="text" name="noobChristoffer" value="Choose a Playlist" class="field" readonly />
                <input id="chooseplist" type="hidden" name="select" value="" class="fest"/>
                <ul id="list" class="list">
                    <?php $pList->myPlaylists(); ?>
                </ul>
            </div>

            </form>

						<?php
						if (isset($playlistId)) {
							$checker = $pList->plistownercheck($playlistId, $_SESSION['userid']);
						}
						if (isset($checker)) {
							if ($checker == 1) {
						?>


            <div class="size">
                <input id="feest" type="text" name="noobChristoffer" value="Invite a Friend" class="fieldShare" readonly />
                <input id="chooseFriend" type="hidden" name="selecta" value="" class="fest"/>
                <ul id="friendList" class="listShare">
                    <?php $pList->showUsers(); ?>
                </ul>
            </div>
            
						<?php
							}
						}
						?>


            <table id="table">
				<?php
                    if($plistChosen == 1){
                        $pList->showPlaylist($playlistId, $sortMode);
                        echo '<p style="color:#0095ca; margin: 25px 0px 0px 0px;">Active Playlist: ' . $pList->activePlistName . '</p><input id="plidd" type="hidden" value="'.$pList->activePlistId.'"/> ';
                    }
                    echo '</tbody>';
                ?>
            </table>
                  
            
            
           

        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>

	</div>
	<script type="text/javascript" src="js/playlist.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
