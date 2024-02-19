<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
if (isset($respuesta)) {
    echo Html::tag('div', Html::encode($respuesta), ['class' => 'alert alert-warning']);
}
?>
<style>
    .calculator {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.input-number {
    width: calc(100% - 80px);
    display: inline-block;
    margin-right: 10px;
}

.operator-select {
    width: 60px;
    display: table-row;
    padding: 4px;
}
.radio-inline{
    padding: 5px;
}

.btn-success {
    width: 100%;
}

</style>

<div class="row">
    <div class="container calculator">
        <?php $formulario = ActiveForm::begin(); ?>

        <div class="form-group">
            <?= $formulario->field($model, 'valor_a')->textInput(['class' => 'form-control input-number', 'placeholder' => 'Número 1']) ?>
            <?= $formulario->field($model, 'valor_b')->textInput(['class' => 'form-control input-number', 'placeholder' => 'Número 2']) ?>
            <?= $formulario->field($model, 'operador')->radioList(['+' => 'suma ', '-' => 'resta', '*' => 'multiplicacion','/'=>'division'], [
                'class' => 'form-control operator-select',
                'itemOptions' => ['labelOptions' => ['class' => 'radio-inline']]
            ])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Calcular', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

