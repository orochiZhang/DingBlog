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
                <td>{{article.title}}</td>
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
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li v-bind:class="isFirst()">
                    <a href="#" @click="perPage()" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li v-for="n in articles.last_page"
                    v-bind:class="isCurrentPage(n)">
                    <a href="#" @click="getDataList(n)">{{n}}</a>
                </li>

                <li v-bind:class="isLast()">
                    <a href="#" @click="nextPage()" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">警告</h4>
                    </div>
                    <div class="modal-body">
                        是否删除{{delete_id}}.{{delete_title}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="destroy()">Confirm</button>

                    </div>
                </div>
            </div>
        </div>
        <!--<div v-else="">没有数据</div>-->
    </div>
</template>

<script>
    export default {
        name: 'articles',
        data(){
            return {
                articles: [] , code: 404, delete_id:0 ,delete_title: '',delete_index: -1,
            }
        },
        props: ['api_token'],
        mounted() {
            this.getDataList(1);
        },
        methods:{
            setDeleteId(id,index,title){
                this.delete_id=id;
                this.delete_index=index;
                this.delete_title=title;
            },
            destroy(){
                let token='Bearer '+this.api_token;
                console.log(this.api_token);
                console.log(token);

                axios.delete("/api/article/destroy/"+this.delete_id,{headers: {'Authorization': token}})
                    .then((response) =>{
                    console.log(response.data);
                    if(response.data.code==200){
                        this.articles.data.splice(this.delete_index,1);
                    }else{
                        alert(response.data.message);
                    }
                })
            },
            getDataList(n){
                axios.get("/api/article/all",{params: {page: n}}).then((response) =>{
                    console.log(response.data);
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
            nextPage(){
                if (this.articles.current_page != this.articles.last_page) {
                    this.getDataList(this.articles.current_page + 1);
                }
            },
            perPage(){
                if (this.articles.current_page != 1) {
                    this.getDataList(this.articles.current_page - 1);
                }
            },
            isCurrentPage(n) {
                return {
                    'active none-pointer': n == this.articles.current_page,
                    '': n != this.articles.current_page,
                }
            },
            isFirst(n){
                return {
                    disabled: this.articles.current_page == 1,
                    '': this.articles.current_page != 1,
                }
            },
            isLast(n){
                return {
                    disabled: this.articles.current_page == this.articles.last_page,
                    '': this.articles.current_page != this.articles.last_page,
                }
            }

        }
    }
</script>
