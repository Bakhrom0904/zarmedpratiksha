<?php

/** @var yii\web\View $this */

use common\widgets\Banner;
use common\widgets\Consult;
use common\widgets\Emergency;
use lajax\translatemanager\helpers\Language as Lx;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Lx::t('frontend', "ZARMED PRATIKSHA") . " | " . Yii::t('frontend', 'Our Doctors');
?>
<?= Banner::widget(['title' => $this->title]) ?>
<div class="container">
    <section class="team">
        <div class="container">
            <?php Pjax::begin();
            $deps = [];
            foreach ($departments as $department) {
                if (count($department->doctors) > 0) {
                    $deps[] = $department;
                }
            }
            ?>
            <div class="list-unstyled row mb-4">
                <div class="col-sm-6 col-lg-3">
                    <h5><?= Html::a(Lx::t('frontend', 'All'), Url::to(['']), ['pjax-data' => true, 'class' => 'd-block']) ?></h5>
                    <?php foreach ($deps

                    as $index => $department) {
                    if (($index + 1) % ceil(count($deps) / 4) == 0) { ?>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <?php } ?>
                    <h5><?= Html::a($department->name, Url::to(['', 'department_id' => $department->id]), ['pjax-data' => true, 'class' => 'd-block']) ?></h5>
                    <?php } ?>
                </div>
            </div>
            <div class="sc-title-two text-center">
                <h4 class="cl-green text-uppercase"><?= Lx::t('frontend', 'Meet Our Team') ?></h4>
                <h2><?= Lx::t('frontend', 'OUR TEAM OF CERTIFIED AND EXPERIENCED DOCTORS') ?></h2>
            </div>
            <div class="row">
                <?php foreach ($doctors as $doctor) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-wrap position-relative text-center mb-3 d-flex flex-column justify-content-between h-100">
                            <div class="team-img position-relative rounded-2 overflow-hidden doctor-card"
                                 style="flex: 3">
                                <img src="<?= $doctor->img ?>"
                                     alt="<?= $doctor->Lastname() . ' ' . $doctor->Firstname() . ' ' . $doctor->Middlename() ?>"/>
                            </div>
                            <div class="team-name py-3 d-flex flex-column justify-content-between" style="flex: 1">
                                <h4 class="text-capitalize"
                                    style="flex: 1"><?= Html::a($doctor->fullname, Url::to(['doctor-profile', 'id' => $doctor->id])) ?></h4>
                                    <?php if($doctor->id==2 && Yii::$app->language=='ru')
                                    {?>
                                        <p class="cl-green" style="flex: 1">Главный врач</p>
                                    <?php
                                    }
                                    elseif($doctor->id==2 && Yii::$app->language=='uz')
                                    {?>
                                        <p class="cl-green" style="flex: 1">Bosh shifokor</p>
                                   <?php
                                   }
                                   elseif($doctor->id==2 && Yii::$app->language=='en')
                                    {?>
                                        <p class="cl-green" style="flex: 1">Chief Medical Officer</p>
                                   <?php
                                   }
                                    else
                                    {?>
                                        <p class="cl-green" style="flex: 1"><?= $doctor->department->name ?></p>
                                   <?php
                                   }?>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php Pjax::end() ?>
        </div>
    </section>
</div>

<?= Emergency::widget(['social' => $this->params['social']]) ?>
<?= Consult::widget(['social' => $this->params['social']]) ?>
