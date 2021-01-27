/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

document.addEventListener('DOMContentLoaded', () => {
    
    var target = document.getElementById('giornoSelezionato');
    target.addEventListener("change",tellMeHours);
});

    function tellMeHours(){
                            
        const picker = document.getElementById('giornoSelezionato');
        picker.addEventListener('input', function(e){
        var day = new Date(this.value).getUTCDay();
        if([2].includes(day)){
          e.preventDefault();
             this.value = '';
            alert(`Martedí siamo chiusi, seleziona un'altro giorno`);
         }
        });
    
        var giorno =  document.getElementById("giornoSelezionato").value;
        
        console.log('qui giorno' , giorno);
        const birthday = new Date(giorno);
        day1 = birthday.getDay();
        // Sunday - Saturday : 0 - 6
        
        console.log(day1);
        // expected output: 2
        select(day1);
    }
    
    
    
    function select(){
        var target = document.getElementById("target")
        target.innerHTML= '';
        if (day1 == 1||day1 == 2||day1 == 3||day1 == 4||day1 == 5){
            
            for (let i = 0; i < 3; i++) { 
                var target = document.getElementById("target")
                var option = document.createElement("option");
                option.text =  19+i;
                option.value = 19+i;
                target.add(option);
               
                
            }
            
        }
        else{
            for (let i = 0; i < 2; i++) { 
                
                var target = document.getElementById("target")
                var option = document.createElement("option");
                option.text = 12+i;
                option.value = 12+i;
                
                target.add(option);
                
            }
            
            var target = document.getElementById("target")
            var option = document.createElement("option");
            option.text = 19;
            option.value = 19;
            target.add(option);
            
            var target = document.getElementById("target")
            var option = document.createElement("option");
            option.text = 20;
            option.value = 20;
            target.add(option);
            
            var target = document.getElementById("target")
            var option = document.createElement("option");
            option.text = 21;
            option.value = 21;
            target.add(option);
            
        }
    }
           



       
