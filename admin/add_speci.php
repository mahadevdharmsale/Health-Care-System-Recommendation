<?php require_once("lock.php");
 ?>
<!doctype html>
<html class="no-js" lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>:: Drnearme::</title>
<link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/vendor/animsition.min.css">
<link rel="stylesheet" href="assets/js/vendor/colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css">
<link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
<link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
<link rel="stylesheet" href="assets/css/main.css">
<script>
function isCharKey(evt)
      {
	 var charCode= (evt.which) ? evt.which : event.keyCode
         if (charCode!=8 &&(charCode >122  || charCode < 97) && (charCode < 65 || charCode > 90))
		 {
            	    return false;
		  }
         return true;
      }
</script>
<script>
function isNumberKey(evt)
      {
	     var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
		 {
            return false;
		  }
         return true;
      }
</script>
<!-- validation js -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<!-- end validation js -->
<!-- contact validation -->

<script type="text/javascript">
var jq = $.noConflict();
jq(document).ready(function(){
	 jq("#rform").validate({
                rules:{
                 sp_name: "required",
				 upimg:"required"
                },
                messages: {
				  sp_name: "required",
				 upimg:"required"
                },
                	submitHandler: function(form) {
		    	alert("specialist category added Successfully");
                    	form.submit();
                }
            });
        });
   
</script> 
<style>
.error{ 
color:red;
}
</style>
</head>
<body id="oakleaf" class="main_Wrapper">
<!-- Application Content -->
<div id="wrap" class="animsition"> 
    <!--  HEADER Content -->
   <?php require_once("header.php"); ?>
    <!--  CONTENT  -->
    <section id="content">
        <div class="page page-forms-common"> 
            
            <!-- bradcome -->
            <div class="bg-light lter b-b wrapper-md mb-10">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="font-thin h3 m-0">Add Disease</h1>
                        <small class="text-muted">Welcome to DRnearME</small> </div>
                </div>
            </div>
                    <section class="boxs">
                        <div class="boxs-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Disease</strong>Category</h1>
                        </div>
                        <div class="boxs-body">
                            <form class="form-horizontal" id="rform" method="POST" action="addapp.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="input04" class="col-sm-2 control-label">Disease Category Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sp_name" name="sp_name" placeholder="Please Enter Disease Category"  value="">
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line"/>
								<div class="row fileupload-buttonbar">
								<label for="input04" class="col-sm-2 control-label">Disease Category Icon</label>
									<div class="col-lg-8"> <span class="btn btn-raised  fileinput-button">
										<input type="file" name="upimg" id= "upimg">
										</span>
										
										</div>
										<span class="fileupload-process"></span> 
								</div>
								<hr class="line-dashed full-witdh-line"/>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button type="reset" class="btn btn-raised btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-raised btn-default">Save changes</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--/ CONTENT --> 
</div>
<!--/ Application Content --> 
<!--Vendor JavaScripts  --> 
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/bootstrapscripts.bundle.js"></script>
<script src="assets/js/vendor/summernote/summernote.min.js"></script> 
<!--/ vendor javascripts --> 
<!--  Custom JavaScripts --> 
<script src="assets/js/main.js"></script> 
<!--/ custom javascripts --> 

<!--  Page Specific Scripts  --> 


<!--/ Page Specific Scripts -->
</body>
</html>
