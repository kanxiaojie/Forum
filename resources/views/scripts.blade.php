<script>
    var getExamNavPath = location.pathname.split("/");
    var getExamNavPathName = getExamNavPath[1];
    var examNavbarDict = ['areas', 'phones', 'posts', 'upload'];

    if($.inArray(getExamNavPathName,examNavbarDict) >= 0)
    {
        $("#"+getExamNavPathName).addClass("activeNav");
        $("#"+getExamNavPathName+"Nav").addClass("activeNavA");
    }
</script>


<script>
    $(function() {
        $("#posts-table").DataTable({
            order: [[0, "desc"]]
        });
    });
</script>

<script>
    $("#width").blur(function(){
        var width = $("#width").val();
        var height = $("#height").val();
        if(width == '' || height == '')
        {
            var area = '';
        }else{
            var area = (width * height) / 1000000;
            document.getElementById("area1").value = area;
            document.getElementById("area").value = area;
        }

    });


    $("#height").blur(function(){
        var width = $("#width").val();
        var height = $("#height").val();
        if(width == '' || height == ''){
            var area = '';
        }else{
            var area = (width * height)/1000000;
            document.getElementById("area1").value = area;
            document.getElementById("area").value = area;
        }
    });

</script>

<script>
    Dropzone.options.addPhotosForm = {
        dictDefaultMessage: "click or push pictures",
        paramName: 'photo',
        maxFilesize: 300,
        acceptedFiles: '.jpg,.jpeg,.png,.bmp',
    };
</script>

<script>
    $("#province_id").change(function(){
        var province_id = $('#province_id').val();
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });
        $.ajax({
            type:'POST',
            url:'/ajax/province',
            data: {province_id: province_id},
            dataType: 'json',
            success:function(data){
                var strCity = '';
                $.each(data, function(i){
                    strCity += '<option value="';
                    strCity += data[i].id;
                    strCity += '">';
                    strCity += data[i].name;
                    strCity += '</option>';
                });
                $('#city').html('');
                $('#city').append(strCity);
            },
            error:function(xhr, type){
                alert('错误!')
            }
        });
    });
</script>

<script>
    var options1 = {
        chart: {
            renderTo:'provinceAnalyseContainer',
            type: 'column',
        },
        type:{
            text: '各省男女调研情况表'
        },
        xAxis: {},
        yAxis: {
            min:0,
            title:{
                text:'性别对比'
            },
            stackLabels:{
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'grey'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip:{
            headerFormat:'<b>{point.x}</b><br/>',
            pointFormat:'{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions:{
            column:{
                stacking:'normal',
                dataLabels:{
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style:{
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series:[{
            name:'男性比'
        },{
            name:'女性比'
        }]
    };

    function queryProvince(){
        $.ajax({
            url:'/areas/provinceData',
            type:'get',
            dataType:'json',
            success:function(response)
            {
                options1.xAxis.categories = response.provinces;
                options1.series[0].data = response.data1;
                options1.series[1].data = response.data2;

                chart = new Highcharts.Chart(options1);
            },
            error:function(xhr, type){
                alert('错误!')
            }
        });
    }

    var getNavPath = location.pathname.split("/");
    var getNavPathName = getNavPath[2];
    if (getNavPathName == 'areasNav')
    {
        queryProvince();
    }
</script>

<script>
    $("#areasAll").change(function(){
        if($(this).is(":checked")){
            $(":input.areas:checkbox:not(:checked)").prop("checked", true);
        }else{
            $(":input.areas:checkbox:checked").prop("checked", false);
        }
    });
</script>