<script>
    $(function () {
        var change = function () {
            var catId = $('[data-grid-filter-field-column=catId] select').val();
            var $chapter = $('[data-grid-filter-field-column=chapterId]');
            var $tag = $('[data-grid-filter-field-column=tag]');
            if(!catId) {
                $chapter.hide();
                $tag.hide();
                return;
            }
            MS.api.post("{{modstart_admin_url('question/chapter/all')}}",{catId:catId},function(res){
                $chapter.data('setNodes')(MS.tree.nodes(res.data.tree));
                $chapter.show();
            });
            MS.api.post("{{modstart_admin_url('question/tag/all')}}",{catId:catId},function(res){
                $tag.data('setOptions')(res.data);
                $tag.show();
            });
        };
        $('[data-grid-filter-field-column=catId] select').on('change', change);
        change();
    });
</script>

