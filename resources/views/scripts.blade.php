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