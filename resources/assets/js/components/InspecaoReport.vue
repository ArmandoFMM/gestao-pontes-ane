<template>
    <div class="container">
        <h4 class="center">Relatório de inspecção</h4>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12">
                <chart :options="bar" auto-resize></chart>
                <div class="row">
                    <span v-if="inspecao.user" class="badge blue white-text left">Por: {{inspecao.user.name}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <h4 v-if="ponte" class="center">Evolução da Ponte {{ponte.nome_ponte}}</h4>
            <div class="col s12">
                <chart :options="line" auto-resize></chart>
            </div>
            <div class="row">
                <h5 class="center">Legenda</h5>
                <div class="col s6 m3">
                    <div class="row">
                        <span class="badge left">9 - Muito Bom</span>
                    </div>
                    <div class="row">
                        <span class="badge left">8 - Bom</span>
                    </div>

                    <div class="row">
                        <span class="badge left">7 - Satisfatório</span>
                    </div>
                </div>

                <div class="col s6 m3">
                    <div class="row">
                        <span class="badge left">6 - Suficiente</span>
                    </div>
                    <div class="row">
                        <span class="badge left">5 - Insuficiente</span>
                    </div>
                    <div class="row">
                        <span class="badge left">4 - Grave</span>
                    </div>
                </div>

                <div class="col s6 m3">
                    <div class="row">
                        <span class="badge left">3 - Critico</span>
                    </div>
                    <div class="row">
                        <span class="badge left">2 - Rotura Iminente</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
        <h4 class="center">Inspecções Anteriores</h4>
        <div class="row">
            <div class="col s12" v-for="(b, index) in barPrevious">
                <chart :options="b" auto-resize></chart>
                <span v-if="inspecoesAnteriores[index].user" class="badge blue white-text left">Por: {{inspecoesAnteriores[index].user.name}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data: () => ({
            bar: null,
            barPrevious: [],
            line: null,
            estados: [],
            ponte: null,
            inspecao: [],
            inspecoesAnteriores: []

        }),
        mounted() {
            console.log('Component mounted.');

            this.getInspecao(this.id)
                    .then((res) => {
                        this.ponte = res.ponte;
                        this.inspecao = res.inspecao;
                        this.inspecoesAnteriores = res.anteriores;

                        this.renderBar(this.inspecao);
                        this.renderLine(this.ponte);
                        this.renderLinePrevious(res.anteriores);

                    });

        },
        methods: {
            getInspecao(id) {
                return axios.get('/inspecao/'+id,{})
                        .then(response => response.data);

            },
            renderLine(ponte) {
                this.line = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['Evolução da Ponte']
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {
                                title: 'Baixar '
                            }
                        }
                    },
                    xAxis: {
                        type: 'category',
                        boundaryGap: false,
                        data: ponte.estados.map((el) => new Date(el.pivot.data).toLocaleDateString())
                    },
                    yAxis: {
                        type: 'value',
                        max: 9
                    },
                    series: [
                        {
                            name:'Evolução da Ponte',
                            type:'line',
                            data: ponte.estados.map((el) => {return {value: el.id }; })
                        }
                    ]
                };
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


            },
            renderLinePrevious(inspecoesAnteriores) {
                this.barPrevious = [];
                inspecoesAnteriores.forEach((el) => {

                    let bar = {
                        title: {
                            text: 'Inspecçao '+el.data,
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
                            data: el.problemas.map((e) => e.designacao_problema),
                        },
                        series: [{
                            name: 'Nivel Deterioracao',
                            type: 'bar',
                            data: el.problemas.map((e) => e.pivot.nivel_deterioracao)
                        },
                            {
                                name: 'Dimensao',
                                type: 'bar',
                                data: el.problemas.map((e) => e.pivot.dimensao)

                            }]
                    };

                    this.barPrevious.push(bar);
                })
            }
        }
    }
</script>
