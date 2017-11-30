<template>
    <div class="container">
        <div class="divider"></div>
        <div class="row">
            <div class="col s12">
                <chart :options="bar" auto-resize></chart>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data: () => ({
            bar: null,
            estados: [],
            ponte: null,
            inspecao: []
        }),
        mounted() {
            console.log('Component mounted.');

            this.getInspecao(this.id)
                    .then((res) => {
                        this.ponte = res.ponte;
                        this.inspecao = res.inspecao;

                        this.renderBar(this.inspecao);

                    });

        },
        methods: {
            getInspecao(id) {
                return axios.get('/inspecao/'+id,{})
                        .then(response => response.data);

            },
            renderBar(inspecao) {

                this.bar = {
                    title: {
                        text: 'Inspecçao '+inspecao.data,
                        subtext: 'Problemas detectados'
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['Nivel Deterioracao', 'Dimensao']
                    },
                    xAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value}'
                        }
                    },
                    yAxis: {
                        type: 'category',
                        inverse: true,
                        data: inspecao.problemas.map((el) => el.designacao_problema),
                    },
                    series: [{
                                name: 'Nivel Deterioracao',
                                type: 'bar',
                                data: inspecao.problemas.map((el) => el.pivot.nivel_deterioracao)
                            },
                            {
                                name: 'Dimensao',
                                type: 'bar',
                                data: inspecao.problemas.map((el) => el.pivot.dimensao)

                            }]
                };


            }
        }
    }
</script>
