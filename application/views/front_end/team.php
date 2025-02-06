 <header class="fixed-top bg-white p-2">
        <div class="container ">
            <div class="mein-menu">
                <h1>UpGrad</h1>
            </div>
        </div>
    </header>
<section>
    <div class="banner">
      <img src="<?php echo base_url('uploads/yearbook/'.$book['yearbook_image']);?>" alt="" class="banner-img img-fluid">
    </div>
  </section>
  <section class="space-reducer">
    <div class="ceo-section container">
      <div class="ceo">
        <div class="ceo-author-deatils">
          <h1 class="font-weight-700"><?php echo $book['ceo_name'];?></h1>
          <h3 class="font-weight-300"><?php echo $book['ceo_designation'];?></h3>
        </div>
        <div class="author-image">
          <img src="<?php echo base_url('uploads/yearbook/'.$book['ceo_image']);?>" alt="..." class="img-fluid img-thumbnail">
        </div>
      </div>
      <img src="<?php echo base_url('assets/front_end');?>/image/image-double-removebg-preview.png" class="inverted-commas-img" alt="...">
      <div class="ceo-details">
        <div class="card card-area">
          <div class="card-body-card">
            <p>
             <?php echo $book['ceo_quote'];?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="space-reducer">
    <div class="faculty-section container pt-5">

      <?php foreach($faculty as $fm) { ?>

         <div class="pt-2 d-flex justify-content-center flex-md-nowrap">
        <div class="faculty-image col-xl-3 col-md-12">
          <img src="<?php echo base_url('uploads/faculty/'. $fm['faculty_image']);?>" alt="..." class="img-fluid img-thumbnail">
        </div>
        <div class="faculty-details col-xl-9 col-md-12">
          <h2 class="ug-color font-weight-700"> <?php echo $fm['faculty_name'];?></h2>
          <h5 class="font-weight-600"> <?php echo $fm['faculty_designation'];?></h5>
          <p> <?php echo $fm['faculty_quote'];?></p>

        </div>
      </div>
    <?php } ?>

      <!-- <div class="pt-2 d-flex justify-content-center flex-md-nowrap">
        <div class="faculty-image col-xl-3 col-md-12">
          <img src="<?php echo base_url('assets/front_end');?>/image/images.jpg" alt="..." class="img-fluid img-thumbnail">
        </div>
        <div class="faculty-details col-xl-9 col-md-12">
          <h2 class="ug-color font-weight-700"> Deep Thomas</h2>
          <h5 class="font-weight-600">Chief Data and Analytics Officer at Aditya Birla Group</h5>
          <p>I believe that the world moves through collaboration and
            not through individual brilliance. so, the relationships and
            network that you build today are the ones that will be
            really helpful to you, going forward
            Why is Data the new currency? Because everything is
            becoming digital, everything is generating bytes of
            information, those bytes of information are getting
            converted into numbers, these numbers are helping us
            identify patterns, determine the logic, and use that logic
            to make smart decisions.</p>

        </div>
      </div>
      <div class="pt-2 d-flex justify-content-center flex-md-nowrap">
        <div class="faculty-image col-xl-3 col-md-12">
          <img src="<?php echo base_url('assets/front_end');?>/image/images.jpg" alt="..." class="img-fluid img-thumbnail">
        </div>
        <div class="faculty-details col-xl-9 col-md-12">
          <h2 class="ug-color font-weight-700"> Deep Thomas</h2>
          <h5 class="font-weight-600">Chief Data and Analytics Officer at Aditya Birla Group</h5>
          <p>I believe that the world moves through collaboration and
            not through individual brilliance. so, the relationships and
            network that you build today are the ones that will be
            really helpful to you, going forward
            Why is Data the new currency? Because everything is
            becoming digital, everything is generating bytes of
            information, those bytes of information are getting
            converted into numbers, these numbers are helping us
            identify patterns, determine the logic, and use that logic
            to make smart decisions.</p>

        </div>
      </div> -->
    </div>
  </section>

  <section class="space-reducer">
    <div class="container pt-5">

      <?php $a=2; foreach($students as $student) { if($a%2==0) {?>

      <div class="student-feedback right d-flex">
        <img src="<?php echo base_url('assets/front_end');?>/image/image-double-removebg-preview.png" class="inverted-commas-img-team" alt="...">
        <div class="student-details">
          <h2 class="font-weight-700">Geet Jayant Dali</h2>
          <h5 class="ug-color">Sr Product Compliance Associate - Amazon India</h5>
          <p>Program journey: I had a non tech job and I was always<br>
            interested in learning technical languages. I wanted to learn <br>
            Tableau, SQL, etc and I wanted an MBA degree as well<br>
            upGrad helped me</p>
        </div>
        <div class="student-image right-image img-pos">
          <img src="<?php echo $student['image'];?>" alt="...">
        </div>
        <div class="border-on-img img-pos">
        </div>
      </div>
    <?php } else { ?>

      <div class="student-feedback left d-flex">
        <img src="<?php echo base_url('assets/front_end');?>/image/image-double-removebg-preview.png" class="inverted-commas-img-team" alt="...">
        <div class="student-image right-image img-pos">
          <img src="<?php echo base_url('assets/front_end');?>/image/images (1).jpg" alt="...">
        </div>
        <div class="border-on-img img-pos">
        </div>
        <div class="student-details">
          <h2 class="font-weight-700">Geet Jayant Dali</h2>
          <h5 class="ug-color">Sr Product Compliance Associate - Amazon India</h5>
          <p>Program journey: I had a non tech job and I was always<br>
            interested in learning technical languages. I wanted to learn <br>
            Tableau, SQL, etc and I wanted an MBA degree as well<br>
            upGrad helped me</p>
        </div>
        
      </div>

    <?php } $a++; } ?>

    </div>
  </section>