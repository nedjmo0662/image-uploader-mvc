
<?php require_once "header.php" ?>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?= ASSETS?>catalog/img/hero.jpg">
        <form class="d-flex tm-search-form" method="get">
            <input name="find" class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="<?php echo $data['curr']?>" size="1" class="tm-input-paging tm-text-primary"> of <?=$data['page_total']?>
                </form>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">

            <?php
                if(is_array($data['images']) && count($data['images']) > 0){
                    foreach($data['images'] as $image){ 
                        
                        $this->view("catalog/single_image",$image);
                    }
                }
             ?>
            
        
        </div> <!-- row -->
        <div class="row tm-mb-90">      
           <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="<?=($data['curr'] <= 1)? 1:$data['curr']-1?>" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
                <div class="tm-paging d-flex">
                    <?php $i = 0;
                    
                    $curr = $data['curr'] % 4;
                    ?>
                    <a href="<?=($curr % 4 == 1)? $data['curr']:$data['page'][$i]?>" class="tm-paging-link <?php echo ($curr % 4 == 1) ?'active':""; ?>"><?=($curr % 4 == 1)?$data['curr']:$data['page'][$i++]?></a>
                    <a href="<?=($curr % 4 == 2)?$data['curr']:$data['page'][$i]?>" class="tm-paging-link <?php echo ($curr % 4 == 2) ?'active':""; ?> "><?=($curr % 4 == 2)?$data['curr']:$data['page'][$i++]?></a>
                    <a href="<?=($curr % 4 == 3)?$data['curr']:$data['page'][$i]?>" class="tm-paging-link <?php echo ($curr % 4 == 3) ?'active':""; ?>"><?=($curr % 4== 3)?$data['curr']:$data['page'][$i++]?></a>
                    <a href="<?=($curr % 4 == 0)?$data['curr']:$data['page'][$i]?>" class="tm-paging-link <?php echo ($curr % 4 == 0) ?'active':""; ?>"><?=($curr % 4 == 0)?$data['curr']:$data['page'][$i]?></a>

                </div>
                <a href="<?=$data['curr']+1?>" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>     
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <?php require_once "footer.php"?> 



