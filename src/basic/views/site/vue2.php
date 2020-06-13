<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Vue2';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    "https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
    ['position'=> View::POS_HEAD ]
);

?>

<div class="site-vue2">
    <div id="app" class='container mt-3'>

    <p :class="[tipotexto, 'bg-danger']" >
        Este es el texto del primer parrafo
    </p>

    <p class='' :class="{'bg-info': !es_info, 'text-primary': es_info}" >
        Este es el texto del segundo parrafo
    </p>

    <button class='btn btn-primary' @click="es_info = !es_info">Change</button>

    </div>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                tipotexto: 'text-info',
                es_info: true,
            }, 
            methods: {
            }, 
            computed: {

            }
        })
    </script>
</div>
