<?php

namespace app\controllers;

use app\models\InicioForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\Controller;

class InicioController extends Controller
{
    
    public function actionIndex()
    {
         $model = new InicioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $operador=$model->operacion;

            if($operador=="-"){
            return $this->actionResta($model);
                
            }else if($operador=="+"){
                
                return $this->actionSuma($model);
            }else if($operador=="*"){
                return $this->actionMultiplicacion($model);

            }else if($operador=="/"){
                if($model->valor_b!=0){
                    
                    return $this->actionDivision($model);
                }else{
                    $respuesta = ("No se puede dividir entre cero");
                }
            }
            return $this->render('index', ['model' => $model, 'respuesta' => $respuesta]);
        }

        return $this->render('index', ['model' => $model]);
        
    }

    public function actionResta($model)
    {
        
       $resultado = $model->valor_a-$model->valor_b ;
        $respuesta = ("El resultado de la resta es: " . $resultado);

        return $this->render('index', [ 'model'=>$model,'respuesta' => $respuesta]);
    }


    public function actionDivision($model){
        $resultado = $model->valor_a / $model->valor_b;
        $respuesta = ("El resultado de la division es: " . $resultado);
        return $this->render('index', [ 'model'=>$model,'respuesta' => $respuesta]);
    }

    public function actionMultiplicacion($model){
        $resultado = $model->valor_a * $model->valor_b;
        $respuesta = ("El resultado de la multiplicacion es: " . $resultado);
        return $this->render('index', [ 'model'=>$model,'respuesta' => $respuesta]);
    }

    public function actionSuma($model)
    {
        $resultado = $model->valor_a + $model->valor_b;
        $respuesta = ("El resultado de la suma es: " . $resultado);
        return $this->render('index', [ 'model'=>$model,'respuesta' => $respuesta]);
    }

    
}