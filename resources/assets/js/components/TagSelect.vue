<template>
    <div style="width: 25%">
        <select class="form-control" v-if="haveData()" @change="go()" v-model="selected">
            <option v-for="tag in tags" :value="tag.id">
                {{tag.name}}
            </option>
        </select>
        <div v-else="">获取tags数据失败，请刷新</div>
    </div>
</template>

<script>
    export default {
        name: 'tags',
        data(){
            return {
                tags: [] ,code: 404, selected: 0,
            }
        },
        props: ['tag_id'],
        mounted() {
            this.getDataList();
        },
        methods: {
            getDataList(){
                this.selected=this.tag_id;
                axios.get("/api/tag/all").then((response) =>{
                    //console.log(response.data);
                    if(response.data.code==200){
                        this.code=200;
                        this.tags=response.data.tags;
                        console.log(this.tags);
                        this.tags.unshift({id:0,name:"全部文章"});
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
            go(){

                let id=this.selected;
                let url='';
                if(id==0){
                    url="/admin/article/";
                }else{
                    url="/admin/article/tag/"+id;
                }

                window.location.href=url;
            },
        }
    }
</script>
