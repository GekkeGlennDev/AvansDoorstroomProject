<template>
    <layout>
        <div class="bg-white">
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Producten</h2>

                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div v-for="product in products" class="group relative">
                        <div
                            class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <!--                            <img :src="product.images[0]" :alt="product.imageAlt"-->
                            <!--                                 class="w-full h-full object-center object-cover lg:w-full lg:h-full"/>-->
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <inertia-link :href="route('shop.product.show', {product: product})">
                                        <span aria-hidden="true" class="absolute inset-0"/>
                                        {{ product.title }}
                                    </inertia-link>
                                </h3>
                                <!--                                <p class="mt-1 text-sm text-gray-500">{{ //product?.categories[0] }}</p>-->
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ currency.format(product.price / 100) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <shopping-cart-dialog/>
    </layout>
</template>

<script>
import ShoppingCartDialog from "../Components/ShoppingCartDialog";
import Layout from "../Layouts/Layout";
export default {
    name: "ffkes",
    components: {Layout, ShoppingCartDialog},
    props: {
        products: Object,
        categories: Object
    },
    data() {
        return {
            currency: new Intl.NumberFormat('nl-NL', {style: 'currency', currency: 'EUR'}),
        }
    },
}
</script>

<style scoped>

</style>
