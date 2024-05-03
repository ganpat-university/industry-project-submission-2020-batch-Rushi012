<?php require 'header.php'?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="<?php echo SITE_URL . "index.php";?>">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                   <a class="breadcrumb-item" href="<?php echo SITE_URL . "women.php";?>">Women</a>
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                    <select class="ht__select">
                                        <option>Show by</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                <div class="ht__pro__qun">
                                    <span>Showing 1-12 of 800 products</span>
                                </div>
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <div id="anni">
                            <!-- Start Product View -->

                            <div class="row">
                            
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                                        $q2="SELECT * FROM `product_detail` WHERE cat_id='1'";
                                        $res2=mysqli_query($con,$q2);
                                        while ($b=mysqli_fetch_array($res2))
                                        {


                                        ?>
                                        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1000">
                                          
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.php?pr_id=<?php echo $b[0]; ?>">
                                                    
                                                        <img src="admin/php/Images/products/<?php echo $b[6]; ?>" alt="product images">
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
                                                    <h4><a href="product-details.php?pr_id=<?php echo $b[0]; ?>"><?php echo $b[4]; ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        
                                                <li><?php echo '&#8377;.'.$b[5]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                         <?php 
                }
                ?>
                                        <!-- End Single Product -->
                                      
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="htc__pagenation">
                                   <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                                    
                                   <li class="active"><a href="#">1</a></li>
                                   
                                     
                                   <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <!-- End Pagenation -->
 </section>
 <?php require "footer.php"?>   