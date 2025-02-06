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
					<h2 class="title1">Year Book</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Year Book</h4>
							
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>yearbook/edit_yearbook_data" method="post" enctype="multipart/form-data"> 
								<div class="form-group"> 
									<label for="exampleInputEmail1">Yearbook Name</label> 
									<input type="text" class="form-control" id="" name="book_name" placeholder="Name" required="" value="<?php echo $book['yearbook_name']?>" > 
									<input type="hidden" name="editid" value="<?php echo $editid ;?>">
								</div> 
								 <div class="form-group col-12">
									<label>University logo</label>
									<input type="file" name="uni_logo" id="uni_logo">
									<input type="hidden" name="old_uni_logo" value="<?php echo $book['university_logo'] ;?>">
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">University Text</label> 
									<input type="text" class="form-control" id="" name="uni_text" placeholder="Enter Text" required="" value="<?php echo $book['university_text']?>"> 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">CEO/Director Name</label> 
									<input type="text" class="form-control" id="" name="ceo_name" placeholder="Enter Name" required="" value="<?php echo $book['ceo_name']?>"> 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">CEO Designation</label> 
									<input type="text" class="form-control" id="" name="ceo_designation" placeholder="Enter Designation" required="" value="<?php echo $book['ceo_designation']?>"> 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">CEO Quote</label> 
									<textarea class="form-control" id="" name="ceo_quote" placeholder="Enter Quote" required="" > <?php echo $book['ceo_quote']?>	</textarea>								
								</div>
								 <div class="form-group col-12">
									<label>CEO Image</label>
									<input type="file" name="ceoimg" id="ceoimg">
									<input type="hidden" name="old_ceoimg" value="<?php echo $book['ceo_image'] ;?>">
								</div>

								<?php foreach($faculty as $fty) { ?>

								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Name</label> 
									<input type="text" class="form-control" id="" name="faculty_name[]" placeholder="Faculty Name" required="" value="<?php echo $fty['faculty_name']?>">
									<input type="hidden" class="form-control" id="" name="faculty_id[]"value="<?php echo $fty['id']?>">  									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Designation</label> 
									<input type="text" class="form-control" id="" name="faculty_designation[]" placeholder="Faculty Designation" required="" value="<?php echo $fty['faculty_designation']?>"> 									
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Faculty Quote</label> 
									<textarea class="form-control" id="" name="faculty_quote[]" placeholder="Faculty Quote" required="" ><?php echo $fty['faculty_quote']?> </textarea>									
								</div>
								 <div class="form-group col-12">
									<label>Faculty Image</label>
									<input type="file" name="facultyimg[]" id="facultyimg" value="<?php echo $fty['faculty_image']?>">
									<input type="hidden" name="old_facultyimg[]" value="<?php echo $fty['faculty_image']?>">
									
								</div>
							<?php } ?>

								 <div class="form-group">
                                       
                                        <button type="button" name="add" id="add" class="btn btn-primary rounded-pill">Add more Faculty</button>
                                    </div>
                                    <div class="from-group" id="dynamic_field"></div>
                                   



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