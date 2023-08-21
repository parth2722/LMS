<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>



<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .header {
    overflow: hidden;
    background-color: #f1f1f1;
    padding-top: 1%;
  }

  .header a {

    color: black;

    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    border-radius: 4px;
  }

  .header a.logo {
    font-size: 25px;
    font-weight: bold;
  }

  .header a:hover {
    background-color: #ddd;
    color: black;
  }

  .header a.active {
    background-color: dodgerblue;
    color: white;
  }

  .header-right {
    float: right;
  }
</style>
</head>

<body>

  <div class="header">

    <a href="/about">
      <img src="images/lms1.png" width="110" height="50"></a>
    <div class="header-right">
      <ul class="">
        <a class="" href="/">Home <span class="sr-only"></span></a>
        <a class="" href="<?= Url::to(['/course']) ?>">Course</a>
        <?php if (Yii::$app->user->isGuest) { ?>
          <a class="" href="<?= Url::to(['/login']) ?>">Login</a>
          <a class="" href="<?= Url::to(['/signup']) ?>">Signup</a>
        <?php } else {
          echo '<li class="user_logout">' .
            Html::beginForm(['/site/logout']);



          echo  Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout text-decoration-none']
          );
          echo Html::endForm() . '</li>';
        } ?>

      </ul>

    </div>
  </div>



</body>

</html>