<template>
    <div class="panel panel-default" id="tags">
        <div class="panel-heading">所有分类</div>
        <div class="panel-body">

            <ul class="tag-list" v-if="haveData()">
                <li v-for="tag in tags">
                    <a :href="'/article/tag/'+tag.id">{{tag.name}}</a>
                    <span class="label label-theme">{{tag.count}}</span>
                </li>
            </ul>

            <div v-else="">获取tags数据失败，请刷新</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'tags',
        data(){
            return {
                tags: [] ,code: 404,
            }
        },
        mounted() {
            this.getDataList();
        },
        methods: {
            getDataList(){
                axios.get("/api/tag/all").then((response) =>{
                    //console.log(response.data);
                    if(response.data.code==200){
                        this.code=200;
                        this.tags=response.data.tags;
                    }else{
                        this.code=404;
                    }
                })
            },
            haveData(){
                if(this.code==200){
                    return true;
                }else{
                    return false;
                }
            },
        }
    }
</script>
