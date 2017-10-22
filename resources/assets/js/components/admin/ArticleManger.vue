<template>
    <div id="articles">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>id</th>
                <th>title</th>
                <th>type</th>
                <th>tag</th>
                <th>created_at</th>
                <th>option</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(article,index) in articles.data">
                <th><input type="checkbox"></th>
                <th scope="row">{{article.id}}</th>
                <td><a :href="'/article/show/'+article.id">{{article.title}}</a></td>
                <td>{{article.type}}</td>
                <td>{{article.tag}}</td>
                <td>{{article.created_at}}</td>
                <td>
                    <button class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#delete"
                            @click="setDeleteId(article.id,index,article.title)">
                        删除
                    </button>
                    <a :href="'/admin/article/update/'+article.id">
                        <button class="btn btn-primary">修改</button>
                    </a>
                </td>
            </tr>

            </tbody>
        </table>


        <page-nav :url="url"
                  :last_page="articles.last_page"
                  :current_page="articles.current_page">

        </page-nav>

        <modal id="modal-demo-1" ref="modal1" v-model="openDelete" title="Modal 1" >
            <span slot="title"> 警告</span>
            <p>是否删除{{delete_id}}.{{delete_title}}?</p>
            <div slot="footer">
                <button type="button" class="btn btn-default" @click="openDelete=false">Cancel</button>
                <button type="button" class="btn btn-danger"  @click="destroy()">Confirm</button>
            </div>
        </modal>

        <!--<div v-else="">没有数据</div>-->
    </div>
</template>

<script>
    import { Alert } from 'uiv';
    export default {
        name: 'articles',
        data(){
            return {
                articles: [] , code: 404, openDelete: false,
                delete_id:0 ,delete_title: '',delete_index: -1,
            }
        },
        props: ['api_token','api','url','page'],
        mounted() {
            this.getDataList(this.page);
        },
        methods:{
            setDeleteId(id,index,title){
                this.delete_id=id;
                this.delete_index=index;
                this.delete_title=title;
                this.openDelete=true;
            },
            destroy(){
                let token='Bearer '+this.api_token;
//                console.log(this.api_token);
//                console.log(token);
                axios.delete("/admin/article/destroy/"+this.delete_id,{headers: {'Authorization': token}})
                    .then((response) =>{
                    console.log(response.data);
                    if(response.data.code==200){
                        this.articles.data.splice(this.delete_index,1);
                        this.openDelete=false;
                    }else{
                        alert(response.data.message);
                    }
                })
            },
            getDataList(n){
                axios.get(this.api,{params: {page: n}}).then((response) =>{
                    //console.log(response.data);
                    if(response.data.code==200){
                        this.code=200;
                        this.articles=response.data.articles;
                    }else{
                        this.code=response.data.code;
                        alert(response.data.message);
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
        },

    }
</script>
