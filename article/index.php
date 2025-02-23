<?php include('header.php'); ?>
<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
            <!-- <img src="../admin/./assets/image/" alt=""> -->
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>   
                        <div class="content-right">
                            <marquee behavior="" direction="left">
                                <div class="text-news">
                                    <?php get_title(); ?>
                                    <!-- <i class="fas fa-angle-double-right"></i>
                                    <a href=""></a> &ensp;
                                    <i class="fas fa-angle-double-right"></i>
                                    <a href="">ពិធីសម្ពោធដាក់ឱ្យប្រើប្រាស់នូវកំណាត់ផ្លូវជាតិលេខ២៦ ប្រវែងជិត ៦៤គីឡូម៉ែត្រ </a> -->
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="row">
                  
                    <?php 
                              
                    get_main_news(); 
                    ?>
                <div class="col-4 content-right">
                   
                        <?php 
                        get_sub_news();
                        ?>
                    <!-- </div>
                    <div class="col-12">
                   
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php 
                               
                getData_news("Sport"); 
            ?>
          
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SOCIAL NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                <?php 
                  getData_news("Social");
                ?>
              
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            ENTERTAINMENT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                <?php 
                  getData_news("Entertainment");
                ?> 
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>