<template>
    <nav aria-label="Page navigation">
        <ul class="pagination" v-if="last_page!==undefined">
            <li v-if="notFirst()">
                <a :href="url+(current_page-1)" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="n in last_page"
                v-bind:class="isCurrentPage(n)">
                <a :href="url+n">{{n}}</a>
            </li>

            <li v-if="notLast()">
                <a :href="url+(current_page+1)" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        data(){
            return {
                next_page: 0,per_page: 0,
            }
        },
        props: ['last_page','url','current_page'],
        methods:{
            notFirst(){
                return this.current_page == 1 ? false : true;
            },
            notLast(){
                return this.current_page == this.last_page ? false :true;
            },
            isCurrentPage(n) {
                return {
                    'active none-pointer': n == this.current_page,
                    '': n != this.current_page,
                }
            },
        },

    }
</script>