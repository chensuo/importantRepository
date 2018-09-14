/**
 * Created by Administrator on 2018/1/2.
 */
$(function(e){
    var arrRegion = [];
    var arrCount = [];
    var arrDataNew = [];

    var arrRegionSec = [];
    var arrCountSec = [];
    var arrDataNewSec = [];

    /*获取数据*/
    /*新闻模块 各模块总点击量*/
    $.ajax({
        type:'get',
        url:'ajax/newsCharts.php',
        success:function(result){
            if(result.code == 100){
                var list = result.data;
                for (var i = 0;i < list.length ; i++){
                    console.log(list[i][0].count);
                    /*删除0数据模块*/
                    if(list[i][0].count == 0 || list[i][0].count == null){
                        continue;
                    }
                    var regionName = list[i][0].SectionName;
                    arrRegion.push(regionName);
                    var  countNew = list[i][0].count;
                    arrCount.push(countNew);
                    var dataNew = {value:list[i][0].count, name:list[i][0].SectionName};
                    arrDataNew.push(dataNew);
                }

            }
        },
        dataType:'json'
    }).then(function(){

        /*
         *    加载饼图
         * */
        var firstChart = echarts.init(document.getElementById('firstChart'));
        var firOption = {
            title : {
                text: '各新闻模块总点击量占比',
                subtext: '饼图',
                x:'center',
                textStyle:{
                    color:'#666'
                }
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: arrRegion
            },
            series : [
                {
                    name: '该模块总点击量占比',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:arrDataNew,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        firstChart.setOption(firOption);

        /*
         *    加载柱状图
         * */
        var secChart = echarts.init(document.getElementById('secChart'));

        var secOption = {
            margin:'0px',
            title : {
                text: '各新闻模块总点击量',
                subtext: '柱状图',
                x:'center',
                textStyle:{
                    color:'#666'
                }
            },
            legend:{
                padding:0
            },
            color: ['#3398DB'],
            tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
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
                    data :arrRegion,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '模块总点击量'
                }
            ],
            series : [
                {
                    name:'该模块总点击量',
                    type:'bar',
                    barWidth: '60%',
                    data:arrCount,

                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        secChart.setOption(secOption);

    });


     /*获取数据*/
    /*帖子模块 各模块总点击量*/
    $.ajax({
        type:'get',
        url:'ajax/notesCharts.php',
        success:function(result){
            if(result.code == 100){
                var list = result.data;
                for (var i = 0;i < list.length ; i++){
                    /*删除0数据模块*/
                    if(list[i][0].count == 0 || list[i][0].count == null){
                        continue;
                    }
                    var regionNameSec = list[i][0].SectionName;
                    arrRegionSec.push(regionNameSec);
                    var  countNewSec = list[i][0].count;
                    arrCountSec.push(countNewSec);
                    var dataNewSec = {value:list[i][0].count, name:list[i][0].SectionName};
                    arrDataNewSec.push(dataNewSec);
                }


            }
        },
        dataType:'json'
    }).then(function(){

        /*
         *    加载饼图
         * */
        var thiChart = echarts.init(document.getElementById('thiChart'));
        var thiOption = {
            title : {
                text: '各帖子模块发帖数量占比',
                subtext: '饼图',
                x:'center',
                textStyle:{
                    color:'#666'
                }
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: arrRegionSec
            },
            series : [
                {
                    name: '该模块发帖数占比',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:arrDataNewSec,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        thiChart.setOption(thiOption);

        /*
         *    加载柱状图
         * */
        var fouChart = echarts.init(document.getElementById('fouChart'));

        var fouOption = {
            margin:'0px',
            title : {
                text: '各帖子模块发帖总量',
                subtext: '柱状图',
                x:'center',
                textStyle:{
                    color:'#666'
                }
            },
            legend:{
                padding:0
            },
            color: ['#3398DB'],
            tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
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
                    data :arrRegionSec,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '模块发帖总量'
                }
            ],
            series : [
                {
                    name:'该模块发帖总量',
                    type:'bar',
                    barWidth: '60%',
                    data:arrCountSec,

                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        fouChart.setOption(fouOption);

    });


});
