<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Vue';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    "https://cdn.jsdelivr.net/npm/vue/dist/vue.js",
    ['position'=> View::POS_HEAD ]
);

?>
<div class="site-vue">
    <div id="app">
        <h1>{{ message }}</h1>
        <hr>
        <input v-bind:placeholder="hint"> <br>
        <button @click="mostrar = !mostrar">{{ mostrar?'Ocultar':'Mostrar'}}</button>
        <span v-if="mostrar">Este texto se puede ocultar</span>
        <hr>

        <input placeholder="Musico" ref="musico" @keyup.enter="setFocus" v-model="nuevoMusico">
        <input placeholder="Discos" ref="discos" @keyup.enter="agregarMusico" v-model.number="nuevoDiscos">
        <button @click="agregarMusico">+</button>
        <br>
        <ul>
            <li v-for="musico in musicos">
                {{ musico.nombre }} - Discos: {{ musico.discos }}
                <button @click="musico.discos++">+</button>
                <button @click="musico.discos--">-</button>
                <span v-if="musico.discos === 0"> - Sin discos</span>
            </li>
        </ul>
        Total de Discos: {{ totalDiscos }}
    </div>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                hint: 'Ingrese su nombre',
                mostrar: false,
                nuevoMusico: '',
                nuevoDiscos: 0,
                musicos: [
                    {nombre: 'Sting', discos: 0},
                    {nombre: 'U2', discos: 0},
                    {nombre: 'Pink Floyd', discos: 5},
                    {nombre: 'The Beatles', discos: 8}
                ]
            }, 
            methods: {
                agregarMusico(){
                    this.musicos.push({
                            nombre: this.nuevoMusico,
                            discos: this.nuevoDiscos
                        }
                    )
                    this.nuevoMusico='';
                    this.nuevoDiscos=0;
                    this.$refs.musico.focus();
                },
                setFocus(){
                    this.$refs.discos.focus();
                    this.$refs.discos.select();
                }
            }, 
            computed: {
                totalDiscos(){
                    total = 0
                    for (musico of this.musicos){
                        total += musico.discos;
                    }
                    return total;
                }
            }
        })
    </script>
</div>
