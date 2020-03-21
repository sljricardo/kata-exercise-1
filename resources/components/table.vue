<template>
   <table class="table">
        <thead class="thead-dark">
            <tr>
            <th v-for="(name, index) in titles.split('|')" :key="index" 
                v-text="name"
                scope="col" ></th>
            </tr>
        </thead>

        <transition-group 
            enter-active-class="animated fadeIn" 
            leave-active-class="hide" 
            tag="tbody">
           <slot></slot>
        </transition-group>
    </table>
</template>

<script>
export default {

    props: ['titles'],

}
</script>