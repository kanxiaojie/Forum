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