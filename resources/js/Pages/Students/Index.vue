<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

export default {

    components: {
        AuthenticatedLayout

    },

    props: {
        students: Array,

    },

    data() {
        return {
            student: {
                name: '',
                age: '',
                image: '',
            }
        }
    },

    methods:
    {
        submit() {
            router.post(route('students.add'), this.student);

            this.student.name = '';
            this.student.age = '';
            this.student.image = '';
        }

    }


}
</script>

<template>
    <Head title="Students" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Students</h2>
            <div class="container">
                <div class="row">

                    <!-- Add Student -->
                    <form @submit.prevent="submit">
                        <div class="space-y-12">
                            <div class="pb-12 border-b border-gray-900/10">
                                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block text-lg font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="name" autocomplete="name" required="true"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="Student's Name" v-model="student.name" />
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
                                                    placeholder="Student's Age" v-model="student.age" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="max-w-sm max-h-30 col-span-full">
                                        <label for="file-upload"
                                            class="block text-lg font-medium leading-6 text-gray-900">Add Image</label>
                                        <input name="image" @input="student.image= $event.target.files[0]" v-models="student.image" id="image" type="file">
                                        <!-- <input id="image" name="image" @input="student.image = $event.target.files[0]"
                                            v-models="student.image"
                                            class="sr-only" type="file" />
                                        <div
                                            class="flex justify-center px-6 py-10 mt-2 border border-dashed rounded-lg border-gray-900/25">
                                            <div class="text-center">
                                                <div class="flex mt-4 text-sm leading-6 text-gray-600">
                                                    <label for="image"
                                                        class="relative font-semibold text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Click Here to Upload an image</span>
                                                    </label>
                                                </div>
                                                <p class="mt-1 text-xs leading-5 text-gray-600">PNG,JPEG or JPG </p>
                                            </div>
                                        </div> -->
                                        <div class="mt-4 col-lg-6">
                                            <button type="submit"
                                                class="pt-2 pb-2 pl-3 pr-3 mt-3 font-bold text-white bg-green-600 border border-green-600 rounded">Add
                                                Student</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End of Add Student -->

                    <!-- Display All Students -->

                    <div class="py-4">
                        <h1 class="flex justify-center mb-8 text-xl font-extrabold">All Students </h1>
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        ID
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        Image
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        Age
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                        Actions for student acoounts
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr v-for="student in students">
                                                    <th scope="row">{{ student.id }}</th>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">{{
                                                                    student.name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><img :src="student.image" /></td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ student.age }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                            {{ student.status }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <div class="flex">
                                                            <button type="button"
                                                                class="px-3 py-1 mr-2 text-yellow-600 border border-yellow-600 rounded hover:text-yellow-700">
                                                                Change Status
                                                            </button>
                                                            <button type="button"
                                                                class="px-3 py-1 mr-2 text-indigo-600 border border-indigo-600 rounded hover:text-indigo-900">
                                                                Edit
                                                            </button>
                                                            <button type="button"
                                                                class="px-3 py-1 text-red-600 border border-red-600 rounded hover:text-red-900">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Display All Students -->

                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
<style>
.bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(103, 58, 183, 1), rgba(233, 30, 99, 1), rgba(255, 0, 0, 1));
}

.dark\:bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(39, 39, 39, 1), rgba(17, 17, 17, 1), rgba(0, 0, 0, 1));
}
</style>
