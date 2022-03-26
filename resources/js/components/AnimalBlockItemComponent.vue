<template>
	<div :title="kind" class="card justify-content-center">
		<img :src="image" class="card-img-top m-auto" v-bind:style="{width: image_width + '%'}"/>
		<div class="card-body">
			<h5 class="card-title">{{ name }}</h5>
			<p class="card-text">Age: {{ age }} / {{ max_age }}</p>
			<p class="card-text">Size: {{ size }} / {{ max_size }}</p>
			<div class="progress">
				<div class="progress-bar" role="progressbar" v-bind:style="{width: progress + '%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ["data"],

	data() {
		this.timerId = null;
		this.image_width = 10;
		return this.data;
	},

	mounted() {
		this.timerId = setTimeout(() => {
			this.updateAnimal();
		}, 1000);
	},

	methods: {
		updateAnimal() {
			let data = {
				animal_id: this.id,
				size: this.size,
				age: this.age
			};
			axios.post('/animals/age', data)
			.then(res => {
				console.log(res);
				this.age = res.data.data.age;
				this.size = res.data.data.size;
				this.progress = res.data.data.progress;
				this.image_width = res.data.data.size_progress < 10 ? 10 : res.data.data.size_progress;

				if (this.age < this.max_age) {
					setTimeout(() => {
						this.updateAnimal();
					}, 1000)
				}
				else {
					this.name = 'ЧереПавел';
				}
			})		
		},
	},
	computed: {
		image() {
			return "./assets/images/animals/" + this.image_src;
		}
	}
};
</script>