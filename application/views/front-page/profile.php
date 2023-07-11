<!-- banner -->
<section class="banner_main">
         <div class="container">
         <div class="row d_flex">
            <div class="col-md-12">
               <div class="text-bg">
                  <?php
                     if ($session!=null) { ?>
                        <h3> Welcome <?=$session["nom"]?> !</h3>
                     <?php }
                  ?>

                  <h1>Healthy Food Recipes</h1>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majorityomised words which don't look even slightly believable</p>
                  <a class="read_more" href="#">Read More</a>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- food -->
      <div class="food">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2> <strong class="yellow">Food </strong>Packages</h2>
                     <span>Discover a world of healthier options with SlimPasta, FitNoodles, and SlimEggs. Indulge guilt-free while reaching your weight loss goals!</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="food_box">
                     <i><img src="<?=base_url()?>assets/front/images/food1.png" alt="#"/></i>
                     <h4>Homemade</h4>
                     <p>Introducing "SlimPasta" – the tasty pasta that helps you lose weight! Made from a special blend of low-calorie ingredients, including natural konjac root, SlimPasta allows you to enjoy your favorite pasta dishes guilt-free. Shed those pounds without sacrificing flavor with SlimPasta!</p>
					 </div>
               </div>
               <div class="col-md-4">
                  <div class="food_box ">
                     <i><img src="<?=base_url()?>assets/front/images/food2.png" alt="#"/></i>
                     <h4>Noodles</h4>
                     <p>Introducing "FitNoodles" – guilt-free noodles for weight loss. Enjoy flavorful Asian-inspired dishes without compromising your goals. Fuel your success with FitNoodles! </p>

					 </div>
               </div>
               <div class="col-md-4">
                  <div class="food_box">
                     <i><img src="<?=base_url()?>assets/front/images/food3.png" alt="#"/></i>
                     <h4>Egg</h4>
                     <p>Introducing "SlimEggs" – the weight-wise choice for a healthier you. Packed with nutrients and protein, SlimEggs are a delicious way to support your weight loss goals. Start your day right with SlimEggs – the perfect addition to a balanced diet.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end food -->
      <!-- works -->
      <div class="works">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <span>How it works</span>
                     <h2> <strong class="yellow">3 Step For </strong>Healthy Eating</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div id="white_bg" class="works_box">
                     <h4>01</h4>
                     <p>Replace traditional high-calorie pasta with SlimPasta or high-calorie noodles with FitNoodles. These low-calorie alternatives allow you to enjoy your favorite pasta and noodle dishes without compromising your weight loss goals.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="white_bg" class="works_box ">
                     <h4>02</h4>
                     <p>Incorporate SlimEggs into your meal plans. Packed with essential nutrients and protein, SlimEggs provide a satisfying and nutritious addition to your diet. Enjoy them for breakfast or include them in your favorite recipes for added protein and flavor.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="white_bg" class="works_box">
                     <h4>03</h4>
                     <p> Embrace a balanced and mindful approach to eating. Pair our products with a well-rounded diet that includes plenty of fruits, vegetables, lean proteins, and whole grains. Regular exercise and staying hydrated are also key components of a successful weight loss journey.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end works -->
      <!-- clients -->
      <div class="clients">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="padding_lert">
                     <div class="titlepage">
                        <h2> <strong class="yellow">Clients  </strong>says</h2>
                     </div>
                     <div id="myCarousel" class="carousel slide clients_Carousel " data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                           <li data-target="#myCarousel" data-slide-to="1"></li>
                           <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <div class="container">
                                 <div class="carousel-caption ">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="imga">
                                             <figure><img src="<?=base_url()?>assets/front/images/face18.jpg" alt="#"/></figure>
                                          </div>
                                          <div class="test_box">
                                             <h4>mark du</h4>
                                             <p>I have tried numerous weight loss programs in the past, but none have been as effective and enjoyable as this one. Incorporating SlimPasta, FitNoodles, and SlimEggs into my meals has made a significant difference. I can indulge in my favorite dishes without the guilt, and the pounds have been steadily dropping. It's truly a game-changer!</p>
                                             <i><img src="<?=base_url()?>assets/front/images/toy_img.png" alt="#"/></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <div class="container">
                                 <div class="carousel-caption">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="imga">
                                             <figure><img src="<?=base_url()?>assets/front/images/face23.jpg" alt="#"/></figure>
                                          </div>
                                          <div class="test_box">
                                             <h4>Jeannine	</h4>
                                             <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                             <i><img src="<?=base_url()?>assets/front/images/toy_img.png" alt="#"/></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <div class="container">
                                 <div class="carousel-caption">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="imga">
                                             <figure><img src="<?=base_url()?>assets/front/images/client.png" alt="#"/></figure>
                                          </div>
                                          <div class="test_box">
                                             <h4>mark du</h4>
                                             <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                             <i><img src="<?=base_url()?>assets/front/images/toy_img.png" alt="#"/></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="clients_imgfood">
                     <figure><img src="<?=base_url()?>assets/front/images/food4.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>