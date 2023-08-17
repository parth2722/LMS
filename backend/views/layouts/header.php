<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<header>
    <br>
    <br>
    <br>
    <nav id="w0" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <?php
            NavBar::begin([
                // 'brandLabel' => Yii::$app->name,
                // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Course', 'url' => ['/course/index']],
                ['label' => 'Module', 'url' => ['/module/index']],
                ['label' => 'Class', 'url' => ['/classs/index']],
                ['label' => 'User', 'url' => ['/super/user']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
                'items' => $menuItems,
            ]);
            if (Yii::$app->user->isGuest) {
                echo Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex']]);
            } else {


                echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout text-decoration-none']
                    )
                    . Html::endForm();
            }
            NavBar::end();
            ?>

            </form>
        </div>
        </div>
    </nav>
</header>