<template>
    <div>
    
        <ul class="collection">
            <li v-for="ponte in pontes" v-bind:key="ponte.id" v-bind:id="'item-'+ponte.id" class="collection-item avatar">
                <div>
                    <img v-bind:src="'http://res.cloudinary.com/armandofm/image/upload/pontes-img/'+ponte.id" alt="" class="circle">
                    <span class="title">{{ponte.nome_ponte}}</span>
                    <p>{{ponte.ano_construcao}}<br>
                    </p>
                    <a class="secondary-content waves-effect waves-light btn" v-on:click="changeVisibility(ponte.id)"><i class="material-icons right">check_circle</i>validar</a>
                </div>

            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        
        props: ['pontesListInit'],
        data: () => ({
                pontes: [],
                url: '',
        }),
        mounted() {
            this.pontes = JSON.parse(this.pontesListInit.slice());
            console.clear();
            console.log(this.pontes);
        },
        methods: {
            changeVisibility(id){

                this.postData(id).then( response => {
                    if(response.status){
                        $("#item-"+id).delay(100).fadeOut();
                        Materialize.toast(response.msg, 2000);

                        this.getHiddenPontes()
                                .then( pontes => this.pontes = pontes)
                        
                    }
                });

            },
            postData(id){
                return axios.post('/validar-ponte',{
                    id: id
                    }).then(response => response.data);
            },
            getHiddenPontes(){
                return axios.get('/hidden-pontes',{})
                            .then(response => response.data.pontes);
            }
        }
    }
</script>
