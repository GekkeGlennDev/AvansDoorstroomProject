<template>
    <dashboard-layout title="Product toevoegen">
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="title" class="form-label">Titel</label>
                <input type="text" id="title" v-model="form.title" class="form-input">
                <input-error :message="errors.title" />
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Beschrijving</label>
                <textarea id="description" cols="30" rows="5" v-model="form.description" class="form-input"/>
                <input-error :message="errors.description" />
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Prijs</label>
                <input type="number" id="price" v-model="form.price" class="form-input">
                <input-error :message="errors.price" />
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Voorraad</label>
                <input type="number" id="stock" v-model="form.stock" class="form-input">
                <input-error :message="errors.stock" />
            </div>
            <div class="form-group">
                <label for="categories" class="form-label">Categorieën</label>
                <select v-model="form.categories" id="categories" class="form-input" multiple>
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
                <input-error :message="errors.categories" />
            </div>
            <div class="form-group">
                <label for="image_path" class="form-label">Foto</label>
                <input type="file" id="image_path" class="form-input" @input="addImage">
                <input-error :message="errors.image" />
            </div>
            <div class="form-group">
                <input type="submit" value="Toevoegen" class="form-submit-button">
            </div>
        </form>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "../../../Layouts/DashboardLayout";
import InputError from "../../../Jetstream/InputError";

export default {
    name: "Create",
    props: {
        categories: Array,
        errors: Object
    },
    components: {InputError, DashboardLayout},
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                description: null,
                price: 0,
                stock: 0,
                categories: [],
                image: null,
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('dashboard.product.store'));
        },
        addImage(event) {
            this.form.image = event.target.files[0];
        }
    }
}
</script>
