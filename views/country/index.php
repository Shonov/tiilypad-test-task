<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/country.js', [
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
$this->registerCssFile('@web/css/country.css');
?>

<div class="main">
  <div class="main__container">
    <label for="country">Страны</label>
    <select name="country" class="picker-countries form-control">
      <option disabled selected hidden>Выберите страну</option>
        <?php foreach ($countries as $country) { ?>
          <option value="<?= $country->id ?>"><?= $country->title ?></option>
        <?php } ?>
    </select>
  </div>

  <div class="main__container cities">
    <h5 class="cities__title"></h5>
    <ul class="cities__content"></ul>
  </div>
</div>
