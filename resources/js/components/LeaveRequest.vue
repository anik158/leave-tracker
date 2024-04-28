<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form :action="actionUrl" method="POST" @submit.prevent="handleSubmit">
                        <div class="mb-4">
                            <label for="leave_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Leave Type</label>
                            <select name="leave_type" id="leave_type" v-model="leave_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select a leave type</option>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Emergency Leave">Emergency Leave</option>
                            </select>
                            <p class="text-red-500 text-xs italic" v-if="errors.leave_type">{{ errors.leave_type }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" name="start_date" id="start_date" v-model="start_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <p class="text-red-500 text-xs italic" v-if="errors.start_date">{{ errors.start_date }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" name="end_date" id="end_date" v-model="end_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <p class="text-red-500 text-xs italic" v-if="errors.end_date">{{ errors.end_date }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason for Leave</label>
                            <textarea name="reason" id="reason" rows="4" v-model="reason" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            <p class="text-red-500 text-xs italic" v-if="errors.reason">{{ errors.reason }}</p>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                            <button type="button" @click="goBack" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Go Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        actionUrl: {
            type: String,
            required: true
        },
        successMessage: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            leave_type: '',
            start_date: '',
            end_date: '',
            reason: '',
            errors: {}
        };
    },
    methods: {
        handleSubmit() {
            this.errors = {};


            if (!this.leave_type) {
                this.errors.leave_type = 'The leave type  is required.';
                this.errors.start_date = 'The start date is required.';
                this.errors.end_date = 'The end date  is required.';
                this.errors.reaosn = 'The  reason is required.';
            }

            if (Object.keys(this.errors).length === 0) {
                axios.post(this.actionUrl, {
                    leave_type: this.leave_type,
                    start_date: this.start_date,
                    end_date: this.end_date,
                    reason: this.reason,
                })
                    .then(response => {
                        window.location.href = response.data.redirect;
                    })
                    .catch(error => {

                    });

            }
        },
        goBack() {
            window.location.href = '/dashboard';
        },
    },
}
</script>
