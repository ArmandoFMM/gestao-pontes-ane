<template>
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <chart :options="pie" ref="pie" auto-resize></chart>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row" style="margin-top: 20px">
            <div class="col s12">
                <chart :options="area" auto-resize></chart>
            </div>
        </div>

        <div class="divider"></div>
        <div class="row" style="margin-top: 20px">
            <div class="col s12">
                <chart :options="bar" auto-resize></chart>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        data: () => ({
                pie: null,
                area: null,
                bar: null,
                estados: [],
                pontes: []
        }),
        mounted() {
            console.log('Component mounted.');

            this.getPontesWithEstados().then(res => {
                this.estados = res;
                this.renderPie(res);

            });

            this.getProblemas()
                    .then((res) => this.renderBar(res));

//              this.renderArea('');

        },
        methods: {
            getPontesWithEstados() {
                return axios.get('/estados?with=pontes',{})
                                .then(response => response.data.estados);
            },
            getPontes() {
                return axios.get('/todas-pontes',{})
                                .then(response => response.data.pontes);
            },
            getPontesWithProvincias() {
                return axios.get('/estados?with=provincias',{})
                        .then(response => response.data);

            },
            getProblemas() {
                return axios.get('/todos-problemas?with=inspecoes',{})
                        .then(response => response.data.problemas);

            },
            renderPie(estados) {

                this.pie = {
                        title: {
                            text: 'Pontes por Estado',
                            x: 'center'
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: "{a} <br/>{b}: {c} ({d}%)"
                        },
                        toolbox: {
                            feature: {
                                saveAsImage: {
                                    title: 'Baixar '
                                }
                            }
                        },
                        legend: {
                            orient: 'vertical',
                            x: 'left',
                            data: estados.map((el) => el.designacao_estado)
                        },
                        series: [
                            {
                                name: 'Pontes por Estado',
                                type: 'pie',
                                radius: ['50%', '80%'],
                                avoidLabelOverlap: false,
                                label: {
                                    normal: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        show: true,
                                        textStyle: {
                                            fontSize: '26',
                                            fontWeight: 'bold'
                                        }
                                    }
                                },
                                labelLine: {
                                    normal: {
                                        show: false
                                    }
                                },
                                data: estados.map((el) => {
                                    //console.log(obj);
                                    return { value: el.pontes.length, name: el.designacao_estado};
                                }),
                            }
                        ]
                };


            },
            renderBar(problemas) {

                this.bar = {
                    title: {
                        text: 'Problemas mais Frequentes'
                    },
                    tooltip: {},
                    legend: {
                        data: problemas.map((el) => el.designacao_problema)
                    },
                    xAxis: {
                        data: problemas.map((el) => el.designacao_problema),
                        axisLabel: {show: false}
                    },
                    yAxis: {
                        axisLabel: {show: false}
                    },
                    series: [{
                        name: '',
                        type: 'bar',
                        data: problemas.map((el) => el.inspecaos.length)
                    }]
                }

            },
            renderArea(estados, provincias) {


                this.area = {
                    title: {
                        text: 'Pontes por Provincias',
                        left: 'left'
                    },
                    tooltip : {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'cross',
                            label: {
                                backgroundColor: '#6a7985'
                            }
                        }
                    },
                    legend: {
                        data: estados.map((el) => el.designacao_estado)
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {
                                title: 'Baixar '
                            }
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : provincias.map((el) =>  el.nome_provincia)
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : estados.map((el) => {
                        return {
                            name: el.designacao_estado,
                            type:'line',
                            stack: 'total',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'top'
                                }
                            },
                            areaStyle: {normal: {}},
                            data: el.provincias.map((el) => el.pontes.length)
                        }
                    })
                };

            }

        }
    }
</script>
