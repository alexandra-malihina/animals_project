<template>
    <div class="wrapper p-5" id="hiModal">
        <div class="card justify-content-center m-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img
                        src="/assets/images/animals/cherepavel.jpg"
                        class="card-img-top"
                        width="100px"
                    />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">ЧереПавел</h5>
                        <p class="card-text">Я раньше тоже был ЧереПашкой.</p>
                        <p class="card-text">А теперь я целый ЧЕРЕПАВЕЛ.</p>
                        <div @click="closeModal" class="btn btn-primary">Ок, ЧереПавел!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        closeModal() {
            this.show = false;
            document.getElementById("hiModal").remove();
        }
    }
};
</script>


<style  scoped>
    .wrapper {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
    }
</style>
