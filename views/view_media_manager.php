<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Media Manager</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>public/bootstrap/css/bootstrap.min.css" /><!--bootstrap c s s-->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>public/fontawesome/css/fontawesome-all.min.css" /> <!--Font awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>public/css/dropzone.css" /><!--drop zone c s s -->
    <script type="text/javascript" src="<?php echo SITE_URL;?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL;?>public/js/jquery-3.51.0.form.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL;?>public/js/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL;?>public/js/clipboard.min.js"></script>
</head>
<body>
        <div class="col-md-12"> 
            <div class="row">
                <div class="col title"><h1 class="heading"><i class="far fa-images"></i> Media Manager</h1></div>             <!-- Title-->
            </div>   <!--End row -->     
            <div class="row">   
                <div class="card">
                  <!-- images upload form -->
                  <div class="container">
                  <h1 id="upload-images" align="center">Upload Images</h1>
                    <form action="<?php echo SITE_URL ?>/manager/upload" class="dropzone needsclick dz-clickable" id="uploadForm" enctype="multipart/form-data">
                          <div class="dz-message needsclick" >
                              Drop files here or click to upload.<br>
                              Supported formats(jpg, jpeg, png)<br>
                              Max. Size 5MB     
                          </div>
                    </form>
                    <div class=" col-md-12 listing">
                              <?php error_reporting(0);
                              $images = glob("public/uploads/*.*");
                              for ($i=0; $i<count($images); $i++)
                              {
                              $numI = $images[$i];
                              echo '<div class="col-md-2"><img src="'.$numI.'" class="img img-fluid img-item"/>';
                              ?>
                                <button class="btn btn-link" data-clipboard-text="<?php echo SITE_URL.$numI;?>">
                                    <i class="far fa-copy fa-2x" title="Copy URL to clipboard"></i><h5><strong> URL</strong></h5>
                                </button>
<!--                                <button class="btn btn-link" title="Delete Image" data-id="<?//php echo SITE_URL.$numI;?>">
                                    <i class="fas fa-trash-alt fa-2x" ></i>
                                </button>-->
                    </div>    
                            <?php }?>
                                <!-- count of images -->
                                <div align="right"> 
                                	<?php
                                		$directory = "public/uploads/";
										$filecount = 0;
										$files = glob($directory . "*");
										if ($files){
										 $filecount = count($files);
										}
										echo "Images Count : ". $filecount ;
                                ?></div>

                  </div>
                </div> <!--End card-->
            </div>    <!--End row -->  
        </div>  <!--End col-m d -->        
</body>
</html>
<script>
//Disabling autoDiscover
Dropzone.autoDiscover = false;
new ClipboardJS('.btn');
$(function() {
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
		url: "<?php echo SITE_URL ?>/manager/upload",
		paramName: "file",
		maxFilesize: 5,
                maxFiles:10,
		addRemoveLinks:true,
                acceptedFiles: "image/jpeg, image/jpg, image/png"
        });    
});

</script>
<script>
$(document).ready(function(){
$("button").click(function(){
        $("#data-id").remove();
    });
});
</script>
<script>
$(document).ready(function(){
    $('#uploadForm').ajaxForm({
        target:'#imagesPreview',
        beforeSubmit:function(){
            $('#uploadStatus').html('<img src="uploading.gif"/>');
        },
        success:function(){
            $('#images').val('');
            $('#uploadStatus').html('');
        },
        error:function(){
            $('#uploadStatus').html('Images upload failed, please try again.');
        }
    });
});
</script>
<style>
/* CSS Reset */
* {
	margin: 0;
	padding: 0;
}
/* Tell the browser to render HTML 5 elements as block */
html, body {
	height: 100%;
	width:100%;
}
div:after, div:before {
	content: "";
	clear: both;
	display: block;
	overflow: hidden;
}

header, footer, section, aside, nav, article {
	display: block;
}
body {
	background: #fff;
	background-size: 100%;
	direction:ltr;
}
.alert {
    clear: both;
}
@font-face {
    font-family: Calibri;
    src: url(fonts/Calibri.ttf);
}
@font-face {
    font-family: san-reg;
    src: url(fonts/SourceSansPro-Regular.ttf);
}
@font-face {
    font-family: mon-bol;
    src: url(fonts/Montserrat-Bold.otf);
}
/*Media Manager Title CSS START*/
.heading{                          
    /*margin-top: 0px !important;*/
    /*margin-bottom: 5px !important;*/
    align-self:  center;
    margin-left: 20px !important;
    color : white; 
}
.title{                       
    background-color: #0095D9; 
    height:max-content; 
    margin-top: 0px !important; 
    margin-bottom: 5px !important;
    font-family: verdana;
}

/*Media Manager Title CSS END*/
/*Image Card CSS Start*/
.card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2);
    transition: 0.5s;
    padding-top: 25px;
    margin-top: 20px;
    margin-left: 25px;
    margin-right: 20px;
/*    height: 500px;*/
    width: -webkit-fill-available;
    padding-left: 25px;
    padding-right: 25px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}
.listing{
        padding-top: 25px;
        padding-bottom: 10px;
}
.img{
    padding-right: 5px !important;
    padding-top: 20px;
    padding-bottom: 5px;
}
.img-item
{
    max-width:100%;
}
button.btn {
    display: flex !important;
}
.url{
    padding-left: 2px;
    font-family: verdana;
    color:#0095D9;
}
.h5,h5 {
    padding-left: 3px !important;
}
/*Image card CSS END*/
/*Drop Zone CSS*/
.dropzone {
    border: 2px dashed #0095D9 !important;
    border-radius: 5px;
    background: white;
    margin-top: 25px;
}
.dropzone:hover {
    background-color: #E8E9EC;
}
</style>
