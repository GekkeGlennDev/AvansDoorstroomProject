<template>
    <div class="group relative">
        <div class="w-full min-h-60 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
             <img :src="'http://avansdoorstroomproject.loc/storage/' + product.image_path" class="w-full h-full object-center object-cover lg:w-full lg:h-full"/>
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
            <p class="text-sm font-medium text-gray-900">{{ getCurrencyFormat(product.price) }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductCard",
    props: {
        product: Object,
    },
    methods: {
        getCurrencyFormat(price) {
            return this.getCurrency.format(price / 100);
        }
    },
    computed: {
        getCurrency() {
            return new Intl.NumberFormat('nl-NL', {style: 'currency', currency: 'EUR'});
        }
    }
}
</script>

<style scoped>

</style>
