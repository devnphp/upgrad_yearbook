 <header class="fixed-top bg-white p-2">
        <div class="container ">
            <div class="mein-menu">
                <h1>UpGrad</h1>
            </div>
        </div>
    </header>
<section>
        <div class="banner mt-5">
            <img src="<?php echo base_url('assets/front_end');?>/image/Congratulations-You-have-done-it-2.png" alt="" class="banner-img img-fluid">
        </div>
    </section>

    <section>
        <div class="container pt-5">
          <div class="page-info d-flex justify-content-between">
            <div>
              <h4 class="years">Years books</h4>
            </div>
            <div class="search-container d-flex search-box">
                <input type="text" placeholder="Search by batch name, year onm university " id="search" name="search" class="form-control search-input">
                <button type="submit" id="search_btn" class="search-btn"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
    
      </section>
      <div class="container pt-3 pb-5">
        <div class="row" id="book_data">

          <?php foreach($books as $book) { ?>

             <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('uploads/yearbook/'.$book['yearbook_image']);?>" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title"><a href="<?php echo base_url('yearbook/'.$book['slug']);?>"><?php echo $book['university_text'].' - '.$book['yearbook_year'];?></a></h3>
    
                <h5 class="years-details"><?php echo $book['yearbook_name'];?></h5>
    
                <h5 class="years-details"><?php echo $book['yearbook_description'];?></h5>
    
              </div>
    
            </div>
    
          </div>

        <?php } ?>
    
          <!-- <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div>
    
          <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div>
    
          <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div>
    
        </div>
    
      </div>
      <div class="container pt-3 pb-5">
        <div class="row">
    
          <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div>
    
          <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div>
    
          <div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="<?php echo base_url('assets/front_end');?>/image/9780761177319_3D.png" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">LJMU - Brach Name</h3>
    
                <h5 class="years-details">2019-2020</h5>
    
                <h5 class="years-details">Other Details</h5>
    
              </div>
    
            </div>
    
          </div> -->
    
        </div>
    
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
      
      $(document).ready(function(){ 
    $("#search_btn").click(function () {
        var search = $("#search").val();//alert(search)

         if(search == ''){
            $('html, body').animate({
                scrollTop: $('#search').offset().top-100
            }, 2000);
             $('#book_id_err').html('');
            $('#book_id_err').html('Please Select Yearbook');
             setTimeout(function() {
                $('#book_id_err').html('');
                if(path != ''){
                    window.location.href=path;
                }
            }, 3000);
            e.preventDefault();
        }
       
            $.ajax({
            url: "<?php echo base_url()?>upgrad/get_yearbooks",
            type: "POST",
            data: {search: search},
            dataType: 'html',
            success: function(data) //alert(data)
            { 
            // alert(data)
             $('#book_data').html(data);
            } ,
                              error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    }           
        });
    });

   
});

    </script>