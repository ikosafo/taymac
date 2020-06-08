<?php include "includes/header.php"; ?>

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb" style="height: 10% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                        <h3 class="breadcrumb_title">Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Blog Post Content -->
    <section class="blog_post_container bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <?php
                        $getblog = $mysqli->query("select * from taymac_blog b JOIN taymac_image_blog i ON b.imageid = i.imageid where b.status = '1'");
                        while ($resblog = $getblog->fetch_assoc()){ ?>
                            <div class="col-lg-6">
                                <div class="for_blog feat_property">
                                    <div class="thumb">
                                        <img class="img-whp"
                                             src="admin/<?php echo $resblog['image_location'] ?>" width="300" height="250"
                                             alt="Img">
                                        <div class="blog_tag">
                                            <?php echo $resblog['category'] ?>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="tc_content">
                                            <h4> <?php echo $resblog['title'] ?></h4>
                                            <ul class="bpg_meta">
                                                <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <?php echo date('F j, Y',strtotime($resblog['dateuploaded'])) ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <p>
                                                <?php
                                                $content = $resblog['blog_text'];
                                                preg_match('/^([^.!?]*[\.!?]+){0,2}/', strip_tags($content), $abstract);
                                                echo $abstract[0];

                                                ?>
                                            </p>
                                        </div>
                                        <div class="fp_footer">
                                            <ul class="fp_meta float-left mb0">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <?php echo $resblog['user'] ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <a class="fp_pdate float-right text-thm" href="blogdetail?bid=<?php echo $resblog['imageid']; ?>">
                                                Read More <span class="flaticon-next"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php } ?>

                    </div>
                   <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="mbp_pagination mt20">
                                <ul class="page_navigation">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">29</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_search_widget">
                        <div class="blog_search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms_condition_widget">
                        <h4 class="title">Categories</h4>
                        <div class="widget_list">
                            <ul class="list_details">

                                <?php
                                $getcategories = $mysqli->query("select DISTINCT(category) from taymac_blog where status = '1'");
                                while ($rescategories = $getcategories->fetch_assoc()) { ?>
                                    <li>
                                        <a href="#"><i class="fa fa-caret-right mr10"></i>
                                            <?php echo $rescategories['category'] ?>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                    <div class="blog_tag_widget">
                        <h4 class="title">Tags</h4>
                        <ul class="tag_list">

                            <?php
                            $getcategories = $mysqli->query("select DISTINCT(category) from taymac_blog  where status = '1'");
                            while ($rescategories = $getcategories->fetch_assoc()) { ?>
                                <li class="list-inline-item"><a href="#"><?php echo $rescategories['category'] ?></a></li>
                            <?php } ?>


                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </section>


<?php include "includes/footer.php"; ?>