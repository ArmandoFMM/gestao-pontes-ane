<template>
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <chart :options="pie" ref="pie" auto-resize></chart>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col m10 offset-m1">
                <chart :options="area" auto-resize></chart>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        data: () => ({
                pie: null,
                area: {},
                estados: [],
                pontes: []
        }),
        mounted() {
            console.log('Component mounted.');

            this.getEstados().then(res => {
                this.estados = res;
                this.renderPie(res);

            });

             // this.renderArea('');

        },
        methods: {
            getEstados() {
                return axios.get('/estados?withPontes=yes',{})
                                .then(response => response.data.estados);
            },
            getPontes() {
                return axios.get('/todas-pontes',{})
                                .then(response => response.data.pontes);
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

                console.log(this.$refs.pie);


            },
            renderArea(data) {


                this.area = {
                    title: {
                        text: 'Pontes por Provincia'
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
                        data:['Bom','Grave','Critico','Rotura Iminente']
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {}
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
                            data : ['Maputo','Gaza','Inhambane','Sofala','Manica','Tete','Cabo Delgado']
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'Bom',
                            type:'line',
                            stack: 'total',
                            areaStyle: {normal: {}},
                            data:[220, 182, 191, 234, 290, 330, 310]
                        },
                        {
                            name:'Grave',
                            type:'line',
                            stack: 'total',
                            areaStyle: {normal: {}},
                            data:[150, 232, 201, 154, 190, 330, 410]
                        },
                        {
                            name:'Critico',
                            type:'line',
                            stack: 'total',
                            areaStyle: {normal: {}},
                            data:[320, 332, 301, 334, 390, 330, 320]
                        },
                        {
                            name:'Rotura Iminente',
                            type:'line',
                            stack: 'total',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'top'
                                }
                            },
                            areaStyle: {normal: {}},
                            data:[820, 932, 901, 934, 1290, 1330, 1320]
                        }
                    ]
                };

            }

        }
    }
</script>
