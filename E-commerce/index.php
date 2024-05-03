 
<?php require "header.php"; ?>

<?php 
$q1="SELECT * FROM `slider` ";
$res1=mysqli_query($con,$q1);
?>
<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <?php
        while ($a=mysqli_fetch_array($res1))
{
?>        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2><?php echo $a[2]; ?></h2>
                                <h1><?php echo $a[1]; ?></h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="admin/php/Images/Slider/<?php echo $a[3]; ?>" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
}
?>
</div>
</div>


        <!-- End Single Slide -->
        
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
              <div class="product__list clearfix mt--30">
                    <!-- Start Single Category -->
                            <?php
                            $q2="SELECT * FROM `product_detail` WHERE main_id='1'";
                            $res2=mysqli_query($con,$q2);
                            while ($b=mysqli_fetch_array($res2))
                            {
                            ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12" data-aos="fade-up" data-aos-duration="1000">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product-details1.php?pr_id=<?php echo $b[0]; ?>">
                                    <img src="admin/php/Images/new_arrival/<?php echo $b[6]; ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                    <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>

                                    <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="product-details1.php?pr_id=<?php echo $b[0]; ?>"><?php echo $b[4]; ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li><?php echo '&#8377;.'.$b[5]; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
                ?>
                    <!-- End Single Category -->
                    <!-- Start Single Category -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->

<!-- Start Prize Good Area -->
<section class="htc__good__sale bg__cat--3">
    <div class="container">
        <center> <h1> | Popular this week |</h1></center>
        <br>
        <div class="row">
            <?php
            $q3="SELECT * FROM `banner` limit 2";
            $res3=mysqli_query($con,$q3);
            while ($c=mysqli_fetch_array($res3))
            {
             ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="flip-left" data-aos-duration="1000"><a href="#" > <img src="admin/php/Images/banner/<?php echo $c[1]; ?>"></a></div>
             <?php 
                }
                ?>
        </div>
        <div class="row ogs-mt-15">   
           <?php
            $q3="SELECT * FROM `banner` limit 2  OFFSET 2";
            $res3=mysqli_query($con,$q3);
            while ($c=mysqli_fetch_array($res3))
            {
             ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="flip-left" data-aos-duration="1000"><a href="#" > <img src="admin/php/Images/banner/<?php echo $c[1]; ?>"></a></div>
             <?php 
                }
                ?>

        </div>
    </div>
</section>
<!-- End Prize Good Area -->

<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <?php
                $q4="SELECT * FROM `product_detail` WHERE main_id='2'";
                 $res4=mysqli_query($con,$q4);
                 while ($d=mysqli_fetch_array($res4))
                 {
                 ?>
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details1.php?pr_id=<?php echo $d[0]; ?>">
                                <img src="admin/php/Images/new_arrival/<?php echo $d[6 ]; ?>"alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details1.php?pr_id=<?php echo $d[0]; ?>"><?php echo $d[4]; ?></a></h4>
                            <ul class="fr__pro__prize">
                                
                                <li><?php echo '&#8377;.'.$d[5]; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                </div>
        </div>
    </div>
</section>
<!-- End Product Area -->


<!-- Start Top Rated Area -->
<section class="top__rated__area bg__cat--3 pt--100 pb--110" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Top Rated</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row mt--20">
            <!-- Start Single Product -->
            <?php
                $q5="SELECT * FROM `product_detail` WHERE main_id='3'";
                 $res5=mysqli_query($con,$q5);
                 while ($e=mysqli_fetch_array($res5))
                 {
                 ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="flip-down" data-aos-duration="1000">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="product-details1.php?pr_id=<?php echo $e[0]; ?>">
                            <img src="admin/php/Images/new_arrival/<?php echo $e[6]; ?>"alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="product-details1.php?pr_id=<?php echo $e[0]; ?>"><?php echo $e[4]; ?></a></h2>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="top__pro__prize">
                            
                            <li><?php echo '&#8377;.'.$e[5]; ?></li>
                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>
                                <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>
                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <?php
            }
            ?>
            <!-- End Single Product -->
            <!-- End Single Product -->
        </div>
    </div>
</section>
<!-- End Top Rated Area -->



<?php require "footer.php"; ?>