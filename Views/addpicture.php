<div class="col-sm-6">
    	<form method="post" action="Controllers/piccontrol.php">
    		<div class="form-group">
    				<input type="text" name="txtRefAd" value="<?php echo $refAd?>" hidden="hidden"/>
    				<input type="text" name="txtTitle" value="<?php echo $result->getPackage();?>" hidden="hidden"/>
            		<label class="col-sm-4 control-label">Insert Picture</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="file" name="imgAd"/><br/>
            		</div>
            		<?php 
            		  require_once 'Models/Package.cls.php';
            		  $pak = new Package();
            		  $pak->setTitle($result->getPackage());
            		  $result = $pak->getAPackageByTitle($myCon);
            		  echo "<h3>You can upload maximum " . $result->getNbPicture() . " Pictures</h3>";
            		?>
            </div>
            <div class="form-group">    		
            		<div class="col-sm-12">
            			<input class="btn btn-success btn-block" name="btnSubmit" type="submit" value="Insert Picture"/>
            		</div>
            </div>
    	</form>		
	</div>