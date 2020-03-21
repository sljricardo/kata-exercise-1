<template>
   <table class="table">
        <thead class="thead-dark">
            <tr>
            <th v-for="(name, index) in title" :key="index" 
                v-text="name"
                scope="col" ></th>
            </tr>
        </thead>

        <transition-group 
            enter-active-class="animated fadeIn" 
            leave-active-class="animated hide" 
            tag="tbody">
           <slot></slot>
        </transition-group>
    </table>
</template>

<script>
export default {

    props: ['titles'],

    data() {
        return {
            title: []
        }
    },

    created() {
        this.title = this.titles.split('|');
    }

}
</script>