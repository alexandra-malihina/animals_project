<template>

    <div class="row justify-content-center"  >
        <div v-for="animal in animals" class="btn btn-succcess col">
            <animal-menu-item-component :data="animal"></animal-menu-item-component>
        </div>
    </div>

</template>

<script>
    import AnimalMenuItemComponent from './AnimalMenuItemComponent.vue'
    export default {
        props: ['data'],
        data () {
            return {
                animals: null
            };
        },
        mounted () {
            this.getAnimals();
        },
        methods: {
            getAnimals(){
                axios.get('/animal_kinds')
                .then(res => {
                    this.animals = res.data;
                })
            }
        },
        components: {
            AnimalMenuItemComponent
        }
    }
</script>
