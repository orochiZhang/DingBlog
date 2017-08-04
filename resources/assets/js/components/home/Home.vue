<template>
    <div class="col-md-8">
        <div class="panel panel-default" id="articles">
            <div class="panel-heading">最近动态</div>
            <div class="panel-body">
                <ul class="list" v-if="haveData()">
                    <li v-for="article in articles.data">
                        <a :href="'/article/'+article.id">
                            <span v-bind:class="label(article.type,0)"
                                  class="label text-white ">{{article.type}}</span>
                            {{article.title}}
                        </a>
                        <span class="hidden-xs float-right">{{article.created_at}}</span>
                    </li>
                </ul>
                <div v-else="">没有数据</div>
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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'articles',
        data(){
            return {
                articles: [] ,code: 404,
            }
        },
        mounted() {
            this.getDataList(1);
        },
        methods: {
            getDataList(n){
                document.getElementById('spinner').style.display="block";
                document.getElementById('app').style.display="none";
                axios.get('/article/all',{params: {page: n}}).then((response) =>{
                    console.log(response.data);
                    if(response.data.code==200){
                        this.code=200;
                        this.articles=response.data.articles;
                    }else{
                        this.code=response.data.code;
                        alert(response.data.message);
                    }
                    document.getElementById('spinner').style.display="none";
                    document.getElementById('app').style.display="block";
                })
            },
            haveData(){
                if(this.code==200){
                    return true;
                }else{
                    return false;
                }
            },
            label(type,ranking){
                return {
                    'label-warning': ranking > 0,
                    'label-default': type=='转载',
                    'label-success':type=='分享'||type=='教程',
                    'label-primary':type=='翻译'
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
