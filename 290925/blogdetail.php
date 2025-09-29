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
                        <h3 class="breadcrumb_title">Blog Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Single Post -->
    <section class="blog_post_container bgc-f7 pb30">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">Blog Details</h2>
                    </div>
                </div>
            </div>
            <div class="row">

        <?php
        $imageid = $_GET['bid'];
        $getblog = $mysqli->query("select * from taymac_blog b JOIN taymac_image_blog i
                                      ON b.imageid = i.imageid where b.imageid = '$imageid'");
        $resblog = $getblog->fetch_assoc(); ?>
                <div class="col-lg-8">
                    <div class="main_blog_post_content">
                        <div class="mbp_thumb_post">
                            <div class="blog_sp_tag"><a href="#"><?php echo $resblog['category'] ?></a></div>
                            <h3 class="blog_sp_title"><?php echo $resblog['title'] ?></h3>
                            <ul class="blog_sp_post_meta">
                                <li class="list-inline-item"><a href="#"><?php echo $resblog['user'] ?></a></li>
                                <li class="list-inline-item"><span class="flaticon-calendar"></span></li>
                                <li class="list-inline-item"><a href="#"><?php echo date('F j, Y',strtotime($resblog['dateuploaded'])) ?></a></li>
                                <li class="list-inline-item"><span class="flaticon-chat"></span></li>
                                <li class="list-inline-item"><a href="#">15</a></li>
                            </ul>
                            <div class="thumb">
                                <img class="img-fluid" src="admin/<?php echo $resblog['image_location'] ?>" alt="Img">
                            </div>
                            <div class="details">

                                <?php echo $resblog['blog_text'] ?>

                            </div>
                            <ul class="blog_post_share">
                                <li><p>Share</p></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="mbp_pagination_tab">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <div class="pag_prev">
                                        <?php $getprevious = $mysqli->query("select * from taymac_blog where imageid = '$imageid' and status = '1'");
                                        $resprevious = $getprevious->fetch_assoc();
                                        $getid = $resprevious['id'];
                                        $previousid = $getid - 1;
                                        $nextid = $getid + 1;

                                        $getprevblog = $mysqli->query("select * from taymac_blog where id = '$previousid' and status = '1'");
                                        $resprevblog = $getprevblog->fetch_assoc();
                                        $getprevid = $resprevblog['imageid'];
                                        $linkgetprevid = "?bid=$getprevid";
                                        if ($getprevid == "") {
                                            $linkgetprevid = '#.';
                                        }

                                        $getnextblog = $mysqli->query("select * from taymac_blog where id = '$nextid' and status = '1'");
                                        $resnextblog = $getnextblog->fetch_assoc();
                                        $getnextid = $resnextblog['imageid'];
                                        $linkgetnextid = "?bid=$getnextid";
                                        if ($getnextid == "") {
                                            $linkgetnextid = "#.";
                                        }

                                        ?>

                                        <a href="<?php echo $linkgetprevid ?>"><span class="flaticon-back"></span></a>
                                        <div class="detls"><h5>Previous Post</h5>
                                            <p> <?php echo $resprevblog['title'] ?></p></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="pag_next text-right">
                                        <a href="<?php echo $linkgetnextid ?>"><span class="flaticon-next"></span></a>
                                        <div class="detls"><h5>Next Post</h5>
                                            <p> <?php echo $resnextblog['title'] ?></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bsp_reveiw_wrt" id="writeareview">
                            <h4>Write a Review</h4>
                            <ul class="review_star">
                                <li class="list-inline-item">
									<span class="sspd_review" id="ratingdiv">
										<ul>
                                            <li class="list-inline-item"><a href="#." id="1star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item"><a href="#." id="2star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#." id="3star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#." id="4star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#." id="5star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>
									</span>
                                </li>
                                <li class="list-inline-item pr15"><p>Your Rating & Review</p></li>
                            </ul>
                            <form class="comments_form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="reviewname"
                                           aria-describedby="textHelp" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="reviewtitle"
                                           aria-describedby="textHelp" placeholder="Review Title">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="reviewtext" rows="6"
                                              placeholder="Your Review"></textarea>
                                </div>
                                <button type="button" class="btn btn-thm" id="savereview">Submit Review</button>
                            </form>
                        </div>

                        <div class="product_single_content mb30">
                            <div class="mbp_pagination_comments">
                                <div class="total_review">
                                    <h4>
                                        <?php
                                        $getnum = $mysqli->query("select * from taymac_blog_review where blogid = '$imageid'");
                                        echo $countreviews = mysqli_num_rows($getnum);
                                        if ($countreviews == '1') {
                                            echo " Review";
                                        }
                                        else {
                                            echo " Reviews";
                                        }
                                        ?>
                                    </h4>

                                    <?php
                                    $getavg = $mysqli->query("select AVG(ratenum) AS averaterate from taymac_blog_rating where postid = '$imageid'");
                                    $resavg = $getavg->fetch_assoc();
                                    $averagerate =  number_format($resavg['averaterate'],1);
                                    $round = round($averagerate);

                                    if ($round == '1') {?>
                                        <ul class="mb0 pl10">
                                            <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="2star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="3star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>
                                    <?php }
                                    else if ($round == '2') {
                                        ?>

                                        <ul class="mb0 pl10">
                                            <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="3star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>

                                    <?php }
                                    else if ($round == '3') {
                                        ?>
                                        <ul class="mb0 pl10">
                                            <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="4star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>
                                    <?php }
                                    else if ($round == '4') {
                                        ?>

                                        <ul class="mb0 pl10">
                                            <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="4star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="5star" style="color:#e1e1e1 !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>

                                    <?php }
                                    else if ($round == '50') {
                                        ?>

                                        <ul class="mb0 pl10">
                                            <li class="list-inline-item"><a href="#" id="1star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="2star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="3star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="4star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" id="5star" style="color:#bcc52a !important;">
                                                    <i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>

                                    <?php } ?>


                                    <a class="tr_outoff pl10" href="#">(
                                        <?php
                                        echo $averagerate;
                                        ?>
                                        out of 5 )</a>

                                    <a class="write_review float-right fn-xsd" href="#writeareview">Write a Review</a>
                                </div>


                                <?php
                                $getreviews = $mysqli->query("select * from taymac_blog_review where blogid = '$imageid'");
                                while ($resreviews = $getreviews->fetch_assoc()){ ?>
                                    <div class="mbp_first media">
                                        <div class="media-body">
                                            <h4 class="sub_title mt-0"><?php echo $resreviews['reviewname'] ?>
                                                <span class="sspd_review">
												<!--<ul class="mb0 pl15">
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"></li>
                                                </ul>-->
											</span>
                                            </h4>
                                            <a class="sspd_postdate fz14" href="#">
                                                <?php echo date('F j, Y',strtotime($resblog['dateuploaded'])) ?>
                                            </a>
                                            <p class="fz14 mt10">
                                                <?php echo $resreviews['reviewtext'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="custom_hr"></div>
                                <?php } ?>



                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="sidebar_search_widget">
                        <div class="blog_search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here"
                                       aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                        <span class="flaticon-magnifying-glass"></span></button>
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

                    <div class="row">
                        <div class="col-lg-12 mb20 mt20">
                            <h4>Related Posts</h4>
                        </div>

                        <?php
                        $getblog = $mysqli->query("select * from taymac_blog b JOIN taymac_image_blog i
                                                    ON b.imageid = i.imageid where b.imageid != '$imageid' and b.status = '1'
                                                    ORDER BY b.id DESC LIMIT 2");
                        while ($resblog = $getblog->fetch_assoc()){ ?>
                            <div class="col-lg-12">
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


                </div>
            </div>
        </div>
    </section>


<?php include "includes/footer.php"; ?>



<script>

    $("#1star").click(function () {
        var onestar = 'One Star';
        var blogid = '<?php echo $imageid; ?>';
        alert(onestar);
        $.ajax({
            type: "POST",
            url: "blograting.php",
            data: {
                star: onestar,
                blogid:blogid
            },
            success: function (text) {
                $('#ratingdiv').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $("#2star").click(function () {
        var twostars = 'Two Stars';
        var blogid = '<?php echo $imageid; ?>';
        //alert(onestar);
        $.ajax({
            type: "POST",
            url: "blograting.php",
            data: {
                star: twostars,
                blogid:blogid
            },
            success: function (text) {
                $('#ratingdiv').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });

    $("#3star").click(function () {
        var threestars = 'Three Stars';
        var blogid = '<?php echo $imageid; ?>';
        //alert(onestar);
        $.ajax({
            type: "POST",
            url: "blograting.php",
            data: {
                star: threestars,
                blogid:blogid
            },
            success: function (text) {
                $('#ratingdiv').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });

    $("#4star").click(function () {
        var fourstars = 'Four Stars';
        var blogid = '<?php echo $imageid; ?>';
        //alert(onestar);
        $.ajax({
            type: "POST",
            url: "blograting.php",
            data: {
                star: fourstars,
                blogid:blogid
            },
            success: function (text) {
                $('#ratingdiv').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });

    $("#5star").click(function () {
        var fivestars = 'Five Stars';
        var blogid = '<?php echo $imageid; ?>';
        //alert(onestar);
        $.ajax({
            type: "POST",
            url: "blograting.php",
            data: {
                star: fivestars,
                blogid:blogid
            },
            success: function (text) {
                $('#ratingdiv').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $("#savereview").click(function () {
        var reviewname = $("#reviewname").val();
        var reviewtitle = $("#reviewtitle").val();
        var reviewtext = $("#reviewtext").val();
        var blogid = '<?php echo $imageid; ?>';

        var error = '';
        if (reviewname == "") {
            error += 'Please enter name\n';
            $("#reviewname").focus();
        }
        if (reviewtitle == "") {
            error += 'Please enter title\n';
            $("#reviewtitle").focus();
        }
        if (reviewtext == "") {
            error += 'Please enter review\n';
            $("#reviewtext").focus();
        }

        if (error == "") {
            $.ajax({
                type: "POST",
                url: "savereview.php",
                data: {
                    reviewname: reviewname,
                    reviewtitle: reviewtitle,
                    reviewtext: reviewtext,
                    blogid:blogid
                },
                success: function (text) {
                    alert('Review Saved');
                    location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
            });
        }
        else {
            $.notify(error, {position: "top center"});
        }
        return false;
    });

</script>
