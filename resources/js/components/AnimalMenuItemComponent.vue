<template>
    <div  v-on:click="addAnimal" :title=kind>
        <img :src=image class="menu_icon">
        <div >
            {{ name }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data () {
            this.data['isActive'] = true;
            return this.data
        },
        methods: {
            addAnimal(event){
                if (! this.isActive)
                {
                    return false;
                }
                this.isActive = false;
                event.target.classList.add('disabled');
                this.$parent.$parent.$refs.animal_blocks.addAnimal(this.id);
            }
        },
        computed: {
            image() {
                return './assets/images/animals/' + this.image_src;
            }
        }
    }
</script>
<style scoped>
    .menu_icon {
        width:50px;
        height:50px;
    }
    .disabled {
        opacity:0.5;
        color: red;
    }
</style>
