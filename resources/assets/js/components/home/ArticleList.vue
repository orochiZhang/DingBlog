<template>
    <div class="col-md-8">
        <div class="panel panel-default" id="articles">
            <div class="panel-heading">{{tag.name}}</div>
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
                <div v-else="">你找到一个不存在的分类，没有数据</div>

                <page-nav :url="url"
                          :last_page="articles.last_page"
                          :current_page="articles.current_page">
                </page-nav>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'articles',
        data(){
            return {
                articles: [] , tag: [], code: 404,
            }
        },
        props: ['url','api','page'],
        mounted() {
            this.getDataList(this.page);
        },
        methods: {
            getDataList(n){
                document.getElementById('spinner').style.display="block";
                document.getElementById('app').style.display="none";
                axios.get(this.api,{params: {page: n}}).then((response) =>{
                    //console.log(response.data);
                    if(response.data.code==200){
                        this.code=200;
                        this.articles=response.data.articles;
                        if(response.data.tag!=null){
                            this.tag=response.data.tag;
                            document.title=response.data.tag.name;
                        }else{
                            this.tag.name="最新动态";
                        }

                    }else{
                        this.code=response.data.code;
                        this.tag.name="你找到一个不存在的分类";
                        console.log(this.tag.name);
                        //alert(response.data.message);
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
                    'label-success': type=='分享'||type=='教程',
                    'label-primary': type=='翻译'
                }
            },

        }
    }
</script>
