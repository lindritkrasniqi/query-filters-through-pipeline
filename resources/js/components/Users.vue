<template>
    <table class="table-auto w-full mt-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th
                    class="p-2 whitespace-nowrap cursor-pointer hover:bg-blue-50 transition-color duration-300"
                    @click.prevent="orderBy('name')"
                >
                    <div class="flex justify-between">
                        <div class="font-semibold text-left w-auto">Name</div>
                        <sort-icon-vue v-if="sortedBy('name')" :asc="query.latest" class="ml-auto"></sort-icon-vue>
                    </div>
                </th>
                <th
                    class="p-2 whitespace-nowrap cursor-pointer hover:bg-blue-50 transition-color duration-300"
                    @click.prevent="orderBy('email')"
                >
                    <div class="flex justify-between">
                        <div class="font-semibold text-left">Email</div>
                        <sort-icon-vue v-if="sortedBy('email')" :asc="query.latest"></sort-icon-vue>
                    </div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Spent</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">Country</div>
                </th>
            </tr>
        </thead>
        <transition-group class="text-sm divide-y divide-gray-100" name="list" tag="tbody">
            <tr v-for="user in users" :key="user.id">
                <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                            <img
                                class="rounded-full"
                                :src="'https://i.pravatar.cc/150?u=' + user.id"
                                width="40"
                                height="40"
                                :alt="user.name"
                            />
                        </div>
                        <div class="font-medium text-gray-800">{{ user.name }}</div>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                    <div class="text-left">{{ user.email }}</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium text-green-500">$ 99.99</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                    <div class="text-lg text-center">🇺🇸</div>
                </td>
            </tr>
        </transition-group>
    </table>
</template>

<script setup>
import SortIconVue from './SortIcon';
const props = defineProps(['users', 'query']);

function orderBy(value) {
    if (props.query.latest && props.query.latest == value) {
        // raplace latest with oldest with the same value
        props.query.oldest = props.query.latest;
        delete props.query.latest;
    } else if (props.query.oldest && props.query.oldest == value) {
        // raplace oldest with latest with the same value
        props.query.latest = props.query.oldest;
        delete props.query.oldest;
    } else {
        // with new value sort allways by the oldest
        delete props.query.latest;
        props.query.oldest = value;
    }

    window.location.replace('/?' + JSON.stringify(props.query)
        .replace(/:/g, "=")
        .replace(/,/g, "&")
        .replace(/"/g, "")
        .replace(/}/g, "")
        .replace(/{/g, ""));
};

function sortedBy(field) {
    return field == props.query.oldest || field == props.query.latest;
}
</script>
