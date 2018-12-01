<?php
$id = $_GET["video"];
$data = query ("SELECT * FROM infoprogram WHERE video='$id'")[0];
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Program</h2>
</div>
<ol class="breadcrumb">
	<li><a href="indexproduksi.php">Produksi</a></li>
	<li><a href="indexproduksi.php">Program</a></li>
	<li><a href="indexproduksi.php">Info Program</a></li>
	<li class="active">Video</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4><?= $data["program"];?> Eps - <?= $data["eps"]; ?></h4></b>
                <hr>
                <div class="row clearfix">
                	<div class="body">
                		<video id="my-video" class="video-js" controls preload="auto" width="600" height="250" poster="../../images/suskatv.png" data-setup="{}">
                			<source src="../../video/<?= $data["video"]; ?>" type='video/mp4'>
                			<source src="../../video/<?= $data["video"]; ?>" type='video/webm'>
                				<p class="vjs-no-js">
                					To view this video please enable JavaScript, and consider upgrading to a web browser that
                					<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                				</p>
                			</video>
                			<hr>
                			<a href="../../video/<?= $data["video"]; ?>" class="btn btn-primary waves-effect">
                        <i class="material-icons">file_download</i> <span>  Download Video</span></a>
                	</div>
                </div>
              </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        
            <div class="body">
                
                <div class="row clearfix">
                	<div class="card">
                        <div class="header bg-teal">
                            <h2>
                                Info Program <small><?= $data["program"]; ?> </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">ondemand_video</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="dashboard-stat-list" style="margin-top: -20px; ">
                                <li>
                                    Program
                                    <span class="pull-right"><b><?= $data["program"]; ?></b></span>
                                </li>
                                <li>
                                    Episode Ke -
                                    <span class="pull-right"><b><?= $data["eps"]; ?></b></span>
                                </li>
                                <li>
                                    Tema
                                    <span class="pull-right"><b><?= $data["tema"]; ?></b></span>
                                </li>
                                <li>
                                    Editor
                                    <span class="pull-right"><b><?= $data["editor"]; ?></b></span>
                                </li>
                                <li>
                                    Kreatif
                                    <span class="pull-right"><b><?= $data["kreatif"]; ?></b></span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                	
                		
                	
                </div>
              </div>
       
    </div>
</div>