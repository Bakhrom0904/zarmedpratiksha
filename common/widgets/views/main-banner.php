<?php

use lajax\translatemanager\helpers\Language as Lx;
use yii\helpers\Url;

?>
<section class="banner-main pb-0">
    <div class="banner-content">
        <div class="slider banner-slider">
            <?php foreach ($items as $item) { ?>
                <div class="h2-slider-list text-center" style="min-height: 800px">
                    <div class="main-slide-image" style="background-image: url(<?= $item->img ?>);"></div>
                    <div class="container d-flex flex-column justify-content-between">
                        <div class="slide-contain">
                            <h1 class="cl-white mt-2 wow fadeInDown"style="text-transform:uppercase"><?= $item->title ?></h1>
                            <h2 class="cl-white mt-2 wow fadeInDown"><?= $item->description ?></h2>
                            <?php
                            if($item->id==1){
                            ?>
                            <div class="slide-btn mt-4">
                                <a href="<?=Url::to(['checkup'])?>" class="btn bg-white text-blue"><?= Lx::t('frontend', 'Learn more') ?></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="overlay-banner">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>