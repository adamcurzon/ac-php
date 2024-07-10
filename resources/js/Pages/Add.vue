<script setup>
import { usePage, Link, router, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const manufactures = computed(() => page.props.manufactures)
const models = computed(() => page.props.models)

const form = useForm({
    name: null,
    year: null,
    car_manufacture_id: null,
    car_model_id: null,
})

function submit() {
    form.post('/data/car');
    form.reset();
    form.clearErrors();
}
</script>


<template>
    <div class="container dashboard">
        <div class="row header">
            <h2>Add Car</h2>
            <Link class="button" href="/"><font-awesome-icon :icon="['fas', 'chevron-left']" />Car Dashboard</Link>
        </div>
        <div class="success-message" v-if="form.wasSuccessful">
            Car successfully added
        </div>
        <div class="row">
            <form @submit.prevent="submit">
                <div>
                    <label for="name">Car name:</label>
                    <input id="name" v-model="form.name" />
                    <div class="error" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div>
                    <label for="year">Year:</label>
                    <input id="year" v-model="form.year" />
                    <div class="error" v-if="form.errors.year">{{ form.errors.year }}</div>
                </div>
                <div>
                    <label for="car_manufacture_id">Car Manufacture:</label>
                    <select v-model="form.car_manufacture_id">
                        <option selected disabled value=null>Select Car Manufacture</option>
                        <option v-for="manufacture in manufactures" :key="manufacture.id" :value="manufacture.id">
                            {{ manufacture.name }}
                        </option>
                    </select>
                    <div class="error" v-if="form.errors.car_manufacture_id">{{ form.errors.car_manufacture_id }}</div>
                </div>
                <div>
                    <label for="car_model_id">Car Model:</label>
                    <select v-model="form.car_model_id">
                        <option selected disabled value=null>Select Car Model</option>
                        <option v-for="model in models" :key="model.id" :value="model.id">
                            {{ model.name }}
                        </option>
                    </select>
                    <div class="error" v-if="form.errors.car_model_id">{{ form.errors.car_model_id }}</div>
                </div>
                <button @disabled="form.processing" type="submit">Add</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {

}
</script>