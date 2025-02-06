<div class="dot-cricle">
  <img src="<?php echo base_url(); ?>assets/front_end/image/Component 6 – 2.png" alt="" class="dot-cricle-image">
</div>
<footer>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-9">
        <h3 class="head mb-3">SITEMAP</h3>
        <ul class="footer-first-col footer-col footer-sitemap">
          <li><a href="<?= base_url() ?>">
              <h3>Home</h3>
            </a></li>
          <li><a href="#">
              <h3>COVID-19</h3>
            </a></li>
          <li class="leftside"><a href="<?= base_url('swasti_response_to_covid') ?>">Swasti’s Response to COVID-19</a></li>
          <!-- <li><a href="<?= base_url('swasti_response_to_covid') ?>" class="leftside">COVID-19</a></li> -->
          <li class="leftside"><a href="<?= base_url('covidaction_collab') ?>">#COVIDActionCollab</a></li>
          <li><a href="">
              <h3>About Swasti</h3>
            </a></li>
          <li class="leftside"><a href="<?= base_url('the_swasti_story') ?>">The Swasti Story</a></li>
          <li class="leftside"><a href="<?= base_url('our_team') ?>">Our Team</a></li>
          <li class="leftside"><a href="<?= base_url('our_partners') ?>">Our Partners</a></li>
          <li class="leftside"><a href="<?= base_url('brand_hub') ?>">Brand Hub</a></li>
          <li><a href="<?= base_url('our_work') ?>">
              <h3>Our Work</h3>
            </a></li>
          <?php foreach ($workarea as $work) { ?>
            <!-- <li class="leftside"><a href="<?= base_url('Our_work?id=' . $work['blogid']) ?>"><?php echo  $work['blog_name'] ?></a></li> -->
            <li class="leftside"><a href="<?php echo base_url('our_work/'.$work['slug']); ?>"><?php echo  $work['blog_name'] ?></a></li>
          <?php } ?>
          <li><a href="#">
              <h3>Our Impact</h3>
            </a></li>
          <li><a href="<?= base_url('knowledgebase') ?>">
              <h3>Knowledgebase</h3>
            </a></li>
          <li><a href="#">
              <h3>Donate</h3>
            </a></li>
          <li><a href="<?= base_url('press') ?>">
              <h3>Press</h3>
            </a></li>
          <li><a href="<?= base_url('contact_us') ?>">
              <h3>Contact Us</h3>
            </a></li>
          <li><a href="#">
              <h3>Careers</h3>
            </a></li>
            <li><a href="<?= base_url('compliance') ?>">
              <h3>Compliance</h3>
            </a></li>
          <li><a href="<?= base_url('legal') ?>">
              <h3>Legal</h3>
            </a></li>
          <li><a href="<?= base_url('resources') ?>">
              <h3>Resources</h3>
            </a></li>
        </ul>
        </ul>
      </div>
      <div class="col-md-3">
        <h3 class="head ">CONTACT US</h3>
        <ul class="footer-four-col footer-col">
          <li>
            <a href="">No.25, Raghavendra Nilaya,
              AECS Layout, Ashwathnagar,
              Bangalore, Karnataka
              560094, India.</a>
          </li>
          <li class="footer-number"><a href="">Phone: +91-80-23419616</a></li>
          <li>
            <a href="">Email: hello@swasti.org</a>
          </li>
        </ul>
        <div class="social-icons">
          <a target="_blank" href="https://twitter.com/swastihc"><img src="<?php echo base_url(); ?>assets/front_end/image/Asset 26.png" alt="" width="45px"></a>
          <a target="_blank" href="https://www.linkedin.com/company/swasti-health-catalyst/"><img src="<?php echo base_url(); ?>assets/front_end/image/Asset 27.png" alt="" width="45px"></a>
          <a target="_blank" href="https://www.youtube.com/user/SwastiHRC"><img src="<?php echo base_url(); ?>assets/front_end/image/Asset 28.png" alt="" width="45px"></a>
          <a target="_blank" href="https://www.facebook.com/Swasti.HealthCatalyst/"><img src="<?php echo base_url(); ?>assets/front_end/image/Asset 29.png" alt="" width="45px"></a>
          <a target="_blank" href="https://www.instagram.com/swastihc/"><img src="<?php echo base_url(); ?>assets/front_end/image/Asset 30.png" alt="" width="45px"></a>
        </div>
      </div>
    </div>
    <p class="pb-5 footer-content">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
      adipisci velit. Integer lacus nibh, consequat eu sapien vitae, lobortis
      imperdiet libero. Etiam tincidunt mollis nisl in sodales. Pellentesque habitant morbi tristique senectus et
      netus et malesuada fames ac turpis egestas.</p>
  </div>
</footer>