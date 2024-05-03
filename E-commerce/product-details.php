
<?php require "header.php"; 
$em=$_REQUEST['pr_id'];
     $q="SELECT * FROM `product_detail` WHERE `pr_id`='$em'";

     $res=mysqli_query($con,$q);

while ($f=mysqli_fetch_array($res)) 
	# code...
{
?>



            
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                 <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="admin/php/Images/products/<?php echo $f[6]; ?>" alt="full-image">
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                               
                            </div>
                        </div>
                        
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40" >
                            <div class="ht__product__dtl">
                                <h2><?php echo $f[4]; ?></h2>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="pro__prize">
                                    
                                     <li><?php echo $f[5]; ?></li>
                                </ul>
                                <p class="pro__info"><?php echo $f[5]; ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
                                   
                                    
                                    
                                     <div class="cr__btn">
                                    <a blank_ href="https://wa.me/917016031546?text='<?php echo $f[4]; ?> <?php echo $f[5]; ?>'">Buy On Whatsapp</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $f[7]; ?></p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
<?php
}
?>
        
<?php require "footer.php"; ?>