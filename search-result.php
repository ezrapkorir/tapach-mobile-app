<?php require_once('header1.php'); ?>

<?php
if (!isset($_REQUEST['search_text']) || $_REQUEST['search_text'] == '') {
    header('location: index.php');
    exit;
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $banner_search; ?>);">
    <div class="overlay"></div>
    <div class="inner">
        <h1>
            Search By: 
            <?php 
                $search_text = strip_tags($_REQUEST['search_text']); 
                echo $search_text; 
            ?>            
        </h1>
    </div>
</div>
<a href=""><button class="">Back</button></a>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product product-cat">
                    <div class="row">
                        <?php
                            $search_text = '%' . $search_text . '%';

                            /* Pagination Code Starts */
                            $adjacents = 5;
                            $statement = $pdo->prepare("SELECT * FROM tbl_services WHERE servicename LIKE ? OR description LIKE ?");
                            $statement->execute(array($search_text, $search_text));
                            $total_pages = $statement->rowCount();

                            $targetpage = BASE_URL . 'search-result.php?search_text=' . urlencode($_REQUEST['search_text']);
                            $limit = 12;
                            $page = @$_GET['page'];
                            $start = $page ? ($page - 1) * $limit : 0;

                            $statement = $pdo->prepare("SELECT * FROM tbl_services WHERE servicename LIKE ? OR description LIKE ? LIMIT $start, $limit");
                            $statement->execute(array($search_text, $search_text));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                            if ($page == 0) $page = 1;
                            $prev = $page - 1;
                            $next = $page + 1;
                            $lastpage = ceil($total_pages / $limit);
                            $lpm1 = $lastpage - 1;
                            $pagination = "";

                            if ($lastpage > 1) {   
                                $pagination .= "<div class=\"pagination\">";
                                if ($page > 1) 
                                    $pagination .= "<a href=\"$targetpage&page=$prev\">&#171; previous</a>";
                                else
                                    $pagination .= "<span class=\"disabled\">&#171; previous</span>";

                                if ($lastpage < 7 + ($adjacents * 2)) {
                                    for ($counter = 1; $counter <= $lastpage; $counter++) {
                                        if ($counter == $page)
                                            $pagination .= "<span class=\"current\">$counter</span>";
                                        else
                                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                                    }
                                } elseif ($lastpage > 5 + ($adjacents * 2)) {
                                    if ($page < 1 + ($adjacents * 2)) {
                                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                                            if ($counter == $page)
                                                $pagination .= "<span class=\"current\">$counter</span>";
                                            else
                                                $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                                        }
                                        $pagination .= "...";
                                        $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                                        $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";       
                                    } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                                        $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                                        $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                                        $pagination .= "...";
                                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                                            if ($counter == $page)
                                                $pagination .= "<span class=\"current\">$counter</span>";
                                            else
                                                $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                                        }
                                        $pagination .= "...";
                                        $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                                        $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";       
                                    } else {
                                        $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                                        $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                                        $pagination .= "...";
                                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                                            if ($counter == $page)
                                                $pagination .= "<span class=\"current\">$counter</span>";
                                            else
                                                $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                                        }
                                    }
                                }
                                if ($page < $counter - 1) 
                                    $pagination .= "<a href=\"$targetpage&page=$next\">next &#187;</a>";
                                else
                                    $pagination .= "<span class=\"disabled\">next &#187;</span>";
                                $pagination .= "</div>\n";       
                            }
                            /* Pagination Code Ends */

                            if (!$total_pages) {
                                echo '<span style="color:red;font-size:18px;">No result found</span>';
                            } else {
                                foreach ($result as $row) {
                                    ?>
                                    <div class="col-md-3 item item-search-result">
                                        <div class="inner">
                                            <div class="text">
                                                <h3><a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['servicename']; ?></a></h3>
                                                <h4>
                                                    <?php echo $row['description']; ?> 
                                                </h4>
                                                <p><a href="product.php?id=<?php echo $row['p_id']; ?>">Book Now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="clear"></div>
                                <div class="pagination">
                                <?php 
                                    echo $pagination; 
                                ?>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
