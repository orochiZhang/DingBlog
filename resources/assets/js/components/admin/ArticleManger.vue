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
            <tr v-for="article in articles.data">
                <th><input type="checkbox"></th>
                <th scope="row">{{article.id}}</th>
                <td>{{article.title}}</td>
                <td>{{article.type}}</td>
                <td>{{article.tag}}</td>
                <td>{{article.created_at}}</td>
                <td>
                    <button class="btn btn-danger">删除</button>
                    <button class="btn btn-primary">修改</button>
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
        <!--<div v-else="">没有数据</div>-->
    </div>
</template>

<script>
    export default {
        name: 'articles',
        data(){
            return {
                articles: [] , code: 404,
            }
        },
        mounted() {
            this.getDataList(1);
        },
        methods:{
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
