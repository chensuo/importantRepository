/**
 * Created by Administrator on 2018/1/2.
 */
$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var arrRegion = [];
    var arrCount = [];
    var arrDataNew = [];


    $.ajax({
        type:'get',
        url:'http://101.200.58.3/htmlprojectwebapi/Statistic/GetSingerCountWithRegion?accountId='+currentUserData.Id,
        success:function(result){
            if(result.Code == 100){
                //console.log(result.Data);
                var list = result.Data;
                for (var i = 0;i < list.length ; i++){
                    if(list[i].Count == 0){
                        continue;
                    }
                    var regionName = list[i].RegionName;
                    arrRegion.push(regionName);
                    var  countNew = list[i].Count;
                    arrCount.push(countNew);
                    var dataNew = {value:list[i].Count, name:list[i].RegionName};
                    arrDataNew.push(dataNew);
                }

            }
        },
        dataType:'json'
    }).then(function(){

        /*
         *    加载饼图
         * */
        var firstChart = echarts.init(document.querySelector('.firstChart'));
        var firOption = {
            title : {
                text: '各类歌手数量占比',
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
                    name: '歌手数量占比',
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
        var secChart = echarts.init(document.querySelector('.secChart'));

        var secOption = {
            margin:'0px',
            title : {
                text: '各类歌手数量',
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
                    name : '歌手数量'
                }
            ],
            series : [
                {
                    name:'歌手数量',
                    type:'bar',
                    barWidth: '60%',
                    data:arrCount,

                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        secChart.setOption(secOption);

    });

});
