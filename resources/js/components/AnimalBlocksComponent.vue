<template>

    <div class="row justify-content-center"  >
        <div v-for="animal in animal_blocks" class="col col-3 justify-content-center">
            <animal-block-item-component :data="animal"></animal-block-item-component>
        </div>
    </div>

</template>

<script>
    import AnimalBlockItemComponent from './AnimalBlockItemComponent.vue'
    export default {
        props: ['data'],
        data () {
            return {
                animal_blocks: []
            };
        },
        mounted () {
        },
        methods: {
            addAnimal(animal_id){
                axios.post('/animals', {animal_id: animal_id})
                .then(res => {
                    this.animal_blocks.push(res.data.data);
                })
            }
        },
        components: {
            AnimalBlockItemComponent
        }
    }
</script>
