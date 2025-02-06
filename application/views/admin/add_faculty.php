<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>

<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
 

<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Faculty</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Faculty</h4>
							
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>faculty/add_faculty_data" method="post" enctype="multipart/form-data"> 
								<div class="form-group"> 
									<label for="exampleInputEmail1">Select Yearbook</label> 
									<select class="form-control" id="" name="book_id"required="" >
									<!-- <option value="">Select Yearbook</option>  -->
										<?php foreach($books as $book) { ?>
                                         <option value="<?php echo $book['id'];?>"><?php echo $book['yearbook_name'];?></option>
                                         <?php } ?>
									</select>
									
								</div> 
							

								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Name</label> 
									<input type="text" class="form-control" id="" name="faculty_name[]" placeholder="Faculty Name" required="" > 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Designation</label> 
									<input type="text" class="form-control" id="" name="faculty_designation[]" placeholder="Faculty Designation" required="" > 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Quote</label> 
									<textarea class="form-control" id="" name="faculty_quote[]" placeholder="Faculty Quote" required="" > </textarea>									
								</div>
								 <div class="form-group col-12">
									<label>Faculty Image</label>
									<input type="file" name="facultyimg[]" id="facultyimg" required>
								</div>

								<!--  <div class="form-group">
                                       
                                        <button type="button" name="add" id="add" class="btn btn-primary rounded-pill">Add more Faculty</button>
                                    </div>
                                    <div class="from-group" id="dynamic_field"></div> -->
                                   



					<button type="submit" class="btn btn-default" id="submit" value="submit">Submit</button> 	
							</form> 
							
						</div>
					</div>

				</div>
			</div>
		</div>

		

<script>
$(document).ready(function() {
	$('#submi').on('click', function() {alert('hi')
		var p_cate 		= $('#main').val();
		var cateimg 	= $('#cateimg').val();
		var catename 	= $('#catename').val();
		var stock 		= $('#stock').val();
		var des 	= $('#des').val();
		if(p_cate!="" && cateimg!="" && catename!="" && stock!="" && des!="")
		{
			$("#submit").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("Product/ajaxiteninsert");?>",
				type: "POST",
				data: {
						type: 1,
						p_cate: p_cate,
						product_name: catename,
						des: des,
						stockstatus: stock,
						cateimg:cateimg
					 },
				cache: false,
				success: function(dataResult)
				{
				
				 window.location.href = "<?php echo site_url();?>product/view_product?sucess=Product Successfully Uploaded";	
				 	
				 			
				}
					
			});
		}
		else{
			alert('Please fill all the field !');
			/*if(p_cate=='NULL'|| p_cate=="")
			{
				$("#errmsg").show();
				var errName = document.getElementByID("errmsg");
				errName.innerHTML += "Category Name required";
				errName.innerHTML += ".red {color:red;}";
				document.getElementByID("name").val = errName;					
								
			}*/
		}
	});
});
</script>

</script>
		
		 	<script type="text/javascript">
	  
     $(document).ready(function() {
    var i =1;
    $("#add").click(function(){ 
       i++;
      $('#dynamic_field').append('<div class="row" id="row'+i+'"> <div class="form-group"><label for="exampleInputEmail1">Faculty Name '+i+'</label><input type="text" class="form-control" name="faculty_name[]" placeholder="Faculty Name" required=""></div><div class="form-group"><label for="exampleInputEmail1">Faculty Designation</label><input type="text" class="form-control" name="faculty_designation[]" placeholder="Faculty Designation" required="" ></div><div class="form-group"><label for="exampleInputEmail1">Faculty Quote</label><input type="text" class="form-control" name="faculty_quote[]" placeholder="Faculty Quote" required=""></div><div class="form-group"><label>Faculty Image</label><input type="file" class="form-control" name="facultyimg[]" required ></div><div class="form-group"><label></label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove Faculty</button></div></div>');  
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
      i--;
    });

    
});
	      
   </script>