<template>
    <Head title="update" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Update Data</h2>
            <div class="container">
                <div class="row">
                    <div>
                        <form @submit.prevent="studentUpdate">
                            <div class="space-y-12">
                                <div class="pb-12 border-b border-gray-900/10">
                                    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label for="name"
                                                class="block text-lg font-medium leading-6 text-gray-900">Name</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="name" id="name" autocomplete="name"
                                                        required="true"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="Student's Name" v-model="editStDetails.name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="age"
                                                class="block text-lg font-medium leading-6 text-gray-900">Age</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="number" name="age" id="age" required="true"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="Student's Age" v-model="editStDetails.age" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="max-w-sm max-h-30 col-span-full">
                                            <div class="mt-4 col-lg-6">
                                                <Link @click="studentUpdate" href="/students"
                                                    class="pt-2 pb-2 pl-3 pr-3 mt-3 font-bold text-white bg-green-600 border border-green-600 rounded">
                                                Update
                                                Data</Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
export default {
    components: {
        AuthenticatedLayout,
        Link

    },
    data() {
        return {
            editStDetails: {
                name: '',
                age: ''

            },
            student_list: [],
        }
    },
    beforeMount() {
        this.getData();

    },
    methods: {
        async getData() {
            var datas = localStorage.getItem('student');
            datas = JSON.parse(datas);
            this.editStDetails = datas;

        },
        async studentUpdate() {
            await axios.post(route('students.update', this.editStDetails.id), this.editStDetails);
        }
    },
};
</script>
