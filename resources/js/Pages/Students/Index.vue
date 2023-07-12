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
                                        <div class="max-w-sm max-h-30 col-span-full">
                                            <label for="image" class="block text-lg font-medium leading-6 text-gray-900">Add
                                                Image</label>
                                            <input name="image" @input="student.image = $event.target.files[0]"
                                                v-models="student.image" id="image" type="file">
                                        </div>
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
                                        <table class="min-w-full pl-8 divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 pl-8 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
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
                                                <tr v-for="student in student_list" :key="student.id">
                                                    <th scope="row">{{ student.id }}</th>
                                                    <td class="py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">{{
                                                                    student.name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap" v-if="student.image">
                                                        <img :src="student.image" class="w-12 h-12 rounded" />
                                                    </td>
                                                    <td v-else>
                                                        No Image
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ student.age }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span v-if="student.status == 'active'"
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                            {{ student.status }}
                                                        </span>
                                                        <span v-else
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                            {{ student.status }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <div class="flex">
                                                            <button @click.prevent="updateStatus(student.id)"
                                                                class="px-5 py-1 mr-3 text-green-600 border border-green-600 rounded hover:text-green-700"
                                                                v-if="student.status == 'inactive'">
                                                                Activate
                                                            </button>
                                                            <button @click.prevent="updateStatus(student.id)"
                                                                class="px-3 py-1 mr-3 text-red-600 border border-red-600 rounded hover:text-red-700"
                                                                v-else>
                                                                Deactivate
                                                            </button>

                                                            <button @click.prevent="editStudent(student.id)"
                                                                data-bs-toggle="modal" data-bs-target="#updatemodal"
                                                                class="px-3 py-1 mr-3 text-indigo-600 border border-indigo-600 rounded hover:text-indigo-900">
                                                                Edit
                                                            </button>
                                                            <!-- <Link @click.prevent="editStudent(student.id)" type="button" data-bs-toggle="modal" data-bs-target="#updatemodal"><i class="fas fa-user-edit ms-3 icon" style="color: #0844aa;"></i></Link> -->
                                                            <button @click.prevent="deleteStudent(student.id)"
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

                    <!-- Edit Model -->
                    <div class="modal fade" id="updatemodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                        tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Studnt Details
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form @submit.prevent="studentUpdate">

                                        <div class="gap-3 row d-grid">
                                            <div class="form-floating">
                                                <input name="name" type="text" v-model="editStDetails.name"
                                                    class="form-control" id="floatingPassword" placeholder="Student Name">
                                                <label class="label" for="floatingPassword">Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <input name="age" type="text" v-model="editStDetails.age"
                                                    class="form-control" id="floatingPassword" placeholder="Age">
                                                <label class="label" for="floatingPassword">Age</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Edit Model -->
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router, Link } from '@inertiajs/vue3'

export default {

    components: {
        AuthenticatedLayout

    },

    props: {
        students: Array

    },

    data() {
        return {
            student: {
                name: '',
                age: '',
                image: '',
            },
            student_list: [],

            editStDetails: {
                name: '',
                age: '',
            }
        }
    },
    beforeMount() {
        this.getData();

    },
    methods: {
        async submit() {
            router.post(route('students.add'), this.student)
            window.location.reload();
            this.student.name = ''
            this.student.age = ''
            this.student.image = ''


        },
        async getData() {
            const response = (await axios.get(route('students.list'))).data;
            this.student_list = response;
        },

        async deleteStudent(id) {
            await axios.get(route('students.delete', id));
            this.getData();
        },
        async updateStatus(id) {
            await axios.get(route('students.updatestatus', id));
            this.getData();
        },
        async editStudent(id) {
            const student = (await axios.get(route('students.get', id))).data
            this.editStDetails = student;
            $('#updatemodal').modal('show')
        },
        async studentUpdate() {
            await axios.post(route('students.update', this.editStDetails.id), this.editStDetails);
            $('#updatemodal').modal('hide')
        }

    }


}
</script>
<style lang="css" scoped>
.bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(103, 58, 183, 1), rgba(233, 30, 99, 1), rgba(255, 0, 0, 1));
}

.dark\:bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(39, 39, 39, 1), rgba(17, 17, 17, 1), rgba(0, 0, 0, 1));
}
</style>
