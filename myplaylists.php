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

	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
        ?>
    
        <div class="main" role="main">
        	<h2 style="text-align:center">My Playlists</h2>
            
            <select>
                <option>-- Välj Spellista --</option>
                <?php
                global $diablofy;
                $pList = $diablofy->get_results( "SELECT name FROM $diablofy->platlists" );
                
                    echo "<option value='$playlistid'>$playlistname</option>";
                
                ?>
        	</select>
            
          	<table id="table">
                <thead>
                    <th><a href="?sort'Mode=song">Song</a></th>
                    <th><a href="?sortMode=artist">Artist</a></th>
                    <th><a href="?sortMode=album">Album</a></th>
                    <th><a href="?sortMode=length">Length</a></th>
                    <th><a href="?sortMode=year">Year</a></th>
                    <th>Add</th>
                </thead>
                <tbody>
                    <?php
                    $pList->showAllSongs($sortMode);
                    ?>
                </tbody>
            </table>  
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
</body>
</html>