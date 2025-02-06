
 <header class="header">
    <div class="container">
      <div class="d-flex justify-content-between">
        <div class="logo">
        <a href="<?= base_url() ?>">
          <img src="<?php echo base_url();?>assets/front_end/images/logo.png" />
</a>
        </div>
        <div id="ham-menu" class="ham-menu">
          <img src="<?php echo base_url();?>assets/front_end/icons/hamburger.png" />
        </div>
      </div>
    </div>
    <section id="menu" class="menu">
      <div class="container mt-5">
        <div class="logo pb-2">
        <a href="<?= base_url() ?>">
          <img class="menu-logo" src="<?php echo base_url();?>assets/front_end/images/logo-white.png" class="mt-3" />
</a>
          <img id="menu-close" class="menu-close" src="<?php echo base_url();?>assets/front_end/images/menu-close.png" alt="">
        </div>
        <div class="row mt-3">
          <div class="col-lg-4" style="width: 100%;">
            <ul>
              <li><a href="<?= base_url() ?>">
                  <h3>Home</h3>
                </a></li>
              <li><a href="#">
                  <h3>COVID-19</h3>
                </a></li>
              <li><a href="<?= base_url('swasti_response_to_covid') ?>" class="leftside">Swasti’s Response to COVID-19</a></li>
              <!-- <li><a href="<?= base_url('swasti_response_to_covid') ?>" class="leftside">COVID-19</a></li> -->
              <li><a href="<?= base_url('covidaction_collab') ?>" class="leftside">#COVIDActionCollab</a></li>
              <li><a>
                  <h3>About Swasti</h3>
                </a></li>
              <li><a href="<?= base_url('the_swasti_story') ?>" class="leftside">The Swasti Story</a></li>
              <li><a href="<?= base_url('our_team') ?>" class="leftside">Our Team</a></li>
              <li><a href="<?= base_url('our_partners') ?>" class="leftside">Our Partners</a></li>
              <li><a href="<?= base_url('brand_hub') ?>" class="leftside">Brand Hub</a></li>
            </ul>
          </div>
          <div class="col-lg-4">
            <ul>
              <li><a href="<?= base_url('our_work') ?>">
                  <h3>Our Work</h3>
                </a></li>
                <?php foreach($workarea as $work)
                {?>
               <!-- <li><a href="<?= base_url('Our_work?id='.$work['blogid']) ?>"><?php echo  $work['blog_name']?></a></li> -->
               <li><a href="<?php echo base_url('our_work/'.$work['slug']); ?>"><?php echo  $work['blog_name']?></a></li>
              <?php } ?>
              <!-- <li><a href="">Water, Sanitation and Hygiene (WaSH)</a></li>
              <li><a href="">Sexual Reproductive Health and Rights (SRHR)</a></li>
              <li><a href="">Gender and Equity</a></li>
              <li><a href="">Community Systems Strengthening</a></li>
              <li><a href="">Health Systems Strengthening</a></li>
              <li><a href="">Workforce Wellbeing</a></li>
              <li><a href="">Social Protection</a></li>
              <li><a href="">One Health</a></li>
              <li><a href="">Global Health Security & Pandemic Response</a></li>
              <li><a href="">WellTech</a></li> -->
            </ul>
          </div>
          <div class="col-lg-4">
            <ul>
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
            <div class="social-icons">
              <a target="_blank"href="https://twitter.com/swastihc"><img src="<?php echo base_url();?>assets/front_end/image/Asset 21.png" alt="" width="45px"></a>
              <a target="_blank"href="https://www.linkedin.com/company/swasti-health-catalyst/"><img src="<?php echo base_url();?>assets/front_end/image/Asset 22.png" alt="" width="45px"></a>
              <a target="_blank"href="https://www.youtube.com/user/SwastiHRC"><img src="<?php echo base_url();?>assets/front_end/image/Asset 23.png" alt="" width="45px"></a>
              <a target="_blank"href="https://www.facebook.com/Swasti.HealthCatalyst/"><img src="<?php echo base_url();?>assets/front_end/image/Asset 24.png" alt="" width="45px"></a>
              <a target="_blank"href="https://www.instagram.com/swastihc/"> <img src="<?php echo base_url();?>assets/front_end/image/Asset 25.png" alt="" width="45px"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="container" id="navbar">


      </div>
    </section>
  </header>