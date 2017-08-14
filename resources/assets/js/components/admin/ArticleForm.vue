<template>
    <div class="panel-body" style="padding: 20px 40px" id="articles">
        <div class="form-group">
            <label class="control-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label class="control-label">Content</label>
            <textarea name="content" class="form-control" id="md" onKeyUp="keyup(event)"
                      style="height: 300px"></textarea>
        </div>
        <div class="form-group">
            <label class="col-md-1 control-label" style="padding-left:0px;">tag</label>

            <div class="col-md-6">
                <select name="tag_id" v-model="article.tag_id" class="form-control">
                    <option v-for="tag in tags" :value="tag.id">{{tag.name}}</option>
                </select>

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1 control-label" style="padding-left:0px;">type</label>

            <div class="col-md-6">
                <select name="type_id" v-model="article.type_id" class="form-control">
                    <option v-for="type in types" :value="type.id">{{type.name}}</option>
                </select>

            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">发表文章</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'articles',
        data(){
            return {
                article: [] , tags: [], types: [],
            }
        },
        props: ['article_url'],
        mounted() {
            this.getArticle();
            this.getTags();
            this.getTypes();
            this.article.tag_id=1;
            this.article.type_id=1;
        },
        methods: {
            getArticle() {
                if(this.article_url!=''){
                    axios.get(this.article_url).then((response) => {
                        console.log(response.data);
                        if (response.data.code == 200) {
                            this.articles = response.data.articles;
                        } else {
                            alert(response.data.message);
                        }
                    })
                }
            },
            getTags() {
                axios.get("/api/tag/all").then((response) => {
                    console.log(response.data);
                    if (response.data.code == 200) {
                        this.tags = response.data.tags;
                    } else {
                        alert(response.data.message);
                    }
                })
            },
            getTypes() {
                axios.get("/api/type/all").then((response) => {
                    console.log(response.data);
                    if (response.data.code == 200) {
                        console.log(response.data);
                        this.types = response.data.types;
                    } else {
                        alert(response.data.message);
                    }
                })
            },
        }
    }
</script>
